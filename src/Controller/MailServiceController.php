<?php

namespace Intelrx\Intelmail\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Intelrx\Intelmail\Config\IntelMailConfig;

class MailServiceController extends Controller
{
    public function postService(Request $request)
    {
        $filePath = storage_path('app/public/file.txt'); 
        $fileContent = base64_encode(file_get_contents($filePath));

        $headers = [
            'Authorization' => IntelMailConfig::INTELMAIL_AUTHORIZATION(),
            'Content-Type' =>  IntelMailConfig::CONTENT_TYPE(),
        ];
        $payload = [
            'from' => [ 'email' => IntelMailConfig::MAIL_FROM_ADDRESS(), 'name' => IntelMailConfig::MAIL_FROM_NAME() ],
            'to' => [['email' => IntelMailConfig::MAIL_TO()]],
            'subject' => 'TEST',
            'text' => 'T1',
            // 'html' => view('welcome')->render(), 
            'category' => 'TTTT',
            'attachments' => [
                [
                    'content' => $fileContent,
                    'filename' => 'filfffe.txt',
                    'type' => mime_content_type($filePath),
                ]
            ]
        ];
        $response = Http::withHeaders($headers)->post(IntelMailConfig::BASE_URL(), $payload);

        if ($response->successful()) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email: " . $response->body();
        }
    }
}
