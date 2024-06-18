### HOW TO CONFIGURE
```
* signup via google authentication https://mailtrap.io/
* create a account name
* navigate to inbox -> integration -> credentials
* copy the credentials to .env

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxx
MAIL_PASSWORD=xxx

* navigate to inbox -> integration -> API

INTEL_MAIL_BASE_URL = 
INTEL_MAIL_FROM_ADDRESS=
INTELMAIL_AUTHORIZATION=
INTEL_MAIL_FROM_NAME=
INTEL_MAIL_TO=

```

### REQUIRED CONFIGURATION IN .env
```
INTEL_MAIL_BASE_URL =
INTELMAIL_AUTHORIZATION =
INTEL_MAIL_FROM_ADDRESS =
INTEL_MAIL_FROM_NAME =
```

### HOW TO SEND A MAIL
```
IntelMail::post([
    'subject' => 'html body',
    'body_type' => 'html',
    'html_view' => 'welcome',
    'attachment' => [
        [
            'content' => base64_encode(file_get_contents(storage_path('app/public/file.txt'))),
            'filename' => 'file.txt',
            'type' => mime_content_type(storage_path('app/public/file.txt')),
        ]
    ]
]);
```