# Testing Email Service Using Mailtrap API

This package allows you to test email functionalities in a development environment using the Mailtrap API. Follow the steps below to configure the package, set up your environment, and send test emails.

## INSTALLATION
```php
composer require --dev intelrx/intelmail
```


## CONFIGURATION

1. **Signup for Mailtrap**
    - Go to [Mailtrap](https://mailtrap.io/).
    - Sign up using Google Authentication or create an account manually.

2. **Configure Mailtrap SMTP Settings**
    - After logging in, navigate to the `Inbox` section.
    - Go to `Integration` and then `Credentials`.
    - Copy the SMTP credentials provided and add them to your `.env` file:
        ```env
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=your_username
        MAIL_PASSWORD=your_password
        ```

3. **Configure Mailtrap API Settings**
    - In your Mailtrap account, navigate to `Inbox` -> `Integration` -> `API`.
    - Copy the necessary API details and add them to your `.env` file:
        ```env
        INTEL_MAIL_BASE_URL=your_base_url
        INTELMAIL_AUTHORIZATION=your_authorization_token
        INTEL_MAIL_FROM_NAME=your_from_name
        INTEL_MAIL_TO=recipient_email_address
        ```

## How to Send a Test Email

To send a test email using the Laravel package, use the following code snippet. This example demonstrates sending an email with an HTML body and an attachment:

SENDING EMAIL
```php
IntelMail::post([
    'subject' => 'Test Email',
    'body_type' => 'html',
    'html_view' => 'welcome',
]);
```

SENDING EMAIL WITH ATTACHMENT
```php
IntelMail::post([
    'subject' => 'Test Email',
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