<?php

namespace Intelrx\Intelmail\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MailServiceController extends Controller
{
    public function postService(Request $request)
    {
        $filePath = storage_path('app/public/file.txt'); 
        $fileContent = base64_encode(file_get_contents($filePath));

        $headers = [
            'Authorization' => 'Bearer 872f750da9a0d3a17c0f28b41b653835',
            'Content-Type' => 'application/json',
        ];
        $payload = [
            'from' => [
                'email' => 'mailtrap@demomailtrap.com',
                'name' => 'Mailtrap Test'
            ],
            'to' => [
                ['email' => 'jrazavistag@gmail.com']
            ],
            'subject' => 'TEST',
            // 'text' => 'CHECK',
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
        $response = Http::withHeaders($headers)
            ->post('https://send.api.mailtrap.io/api/send', $payload);

        if ($response->successful()) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email: " . $response->body();
        }
    }
}
