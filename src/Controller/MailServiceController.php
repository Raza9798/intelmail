<?php

namespace Rapidrx\Intelmail\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Rapidrx\Intelmail\Config\IntelMailConfig;
use Illuminate\Support\Facades\Validator;

class MailServiceController extends Controller
{

    public function postService(Request $request) : string
    {
        $validator = Validator::make($request->all(), [
            'subject' => ['required'],
            'attachment' => ['bail'],
            'to' => ['required'],
            'body_type' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if (!in_array($value, ['text', 'html'])) {
                        $fail("The $attribute must be one of: 'text' or 'html'.");
                    }
                    if ($value === 'text') {
                        if (!$request->has('body_text')) {
                            $fail("The 'body_text' field is required when 'body_type' is 'text'.");
                        }
                    } elseif ($value === 'html') {
                        if (!$request->has('html_view')) {
                            $fail("A 'html_view' must be provided when 'body_type' is 'html'.");
                        }
                    }
                }
            ],
            'body_text' => 'required_if:body_type,text',
            'html_view' => 'required_if:body_type,html',
        ]);

        if ($validator->fails()) {
            dd($validator->errors()->toArray());
            return 'Validation failed!';
        }

        $headers = [
            'Authorization' => IntelMailConfig::INTELMAIL_AUTHORIZATION(),
            'Content-Type' =>  IntelMailConfig::CONTENT_TYPE(),
        ];
        $payload = [
            'from' => ['email' => IntelMailConfig::MAIL_FROM_ADDRESS(), 'name' => IntelMailConfig::MAIL_FROM_NAME()],
            'to' => [['email' => $request->get('to')]],
            'subject' => $request->get('subject'),
            'category' => 'TTTT',
            'attachments' => $request->get('attachment', [])
        ];
        if ($request->input('body_type') === 'text') {
            $payload['text'] = $request->input('body_text');
        } elseif ($request->input('body_type') === 'html') {
            $htmlContent = view($request->input('html_view'))->render();
            $payload['html'] = $htmlContent;
        }
        $response = Http::withHeaders($headers)->post(IntelMailConfig::BASE_URL(), $payload);

        if ($response->successful()) {
            echo $response->body();
            return "Email sent successfully!";
        } else {
            echo $response->body();
            return "Failed to send email: " . $response->body();
        }
    }
}
