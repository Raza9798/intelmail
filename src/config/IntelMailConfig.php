<?php

namespace Intelrx\Intelmail\Config;

return [
    'authorization' => env('INTELMAIL_AUTHORIZATION') || 'Bearer 872f750da9a0d3a17c0f28b41b653835',
];
class IntelMailConfig
{
    // INTEL_MAIL_BASE_URL
    // INTELMAIL_AUTHORIZATION
    // INTEL_MAIL_FROM_ADDRESS
    // INTEL_MAIL_FROM_NAME

    public static function INTELMAIL_AUTHORIZATION() : string
    {
        return env('INTELMAIL_AUTHORIZATION') ?? 'Bearer 872f750da9a0d3a17c0f28b41b653835';
    }

    public static function CONTENT_TYPE() : string
    {
        return 'application/json';
    }

    public static function BASE_URL() : string
    {
        return env('INTEL_MAIL_BASE_URL') ?? 'https://send.api.mailtrap.io/api/send';
    }

    public static function MAIL_FROM_ADDRESS() : string
    {
        return env('INTEL_MAIL_FROM_ADDRESS') ?? 'mailtrap@demomailtrap.com';
    }

    public static function MAIL_FROM_NAME() : string
    {
        return env('INTEL_MAIL_FROM_NAME') ?? 'Mailtrap';
    }

    public static function MAIL_TO() : string
    {
        return env('INTEL_MAIL_TO') ?? 'jrazavistag@gmail.com';
    }
}