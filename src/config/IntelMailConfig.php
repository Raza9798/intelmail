<?php

namespace Rapidrx\Intelmail\Config;

class IntelMailConfig
{
    public static function INTELMAIL_AUTHORIZATION() : string
    {
        return env('INTELMAIL_AUTHORIZATION') ?? 'Bearer 55f9199b59e61eacffb7e45acf602f2c';
    }

    public static function CONTENT_TYPE() : string
    {
        return 'application/json';
    }

    public static function BASE_URL() : string
    {
        return env('INTEL_MAIL_BASE_URL') ?? 'https://sandbox.api.mailtrap.io/api/send/2967013';
    }

    public static function MAIL_FROM_ADDRESS() : string
    {
        return env('INTEL_MAIL_FROM_ADDRESS') ?? 'mailtrap@example.com';
    }

    public static function MAIL_FROM_NAME() : string
    {
        return env('INTEL_MAIL_FROM_NAME') ?? 'Mailtrap';
    }

    public static function MAIL_TO() : string
    {
        return env('INTEL_MAIL_TO') ?? 'jrazsdavistag@gmail.com';
    }

    public static function BUILD_CONFIG() 
    {
        return env('INTEL_MAIL_TO_NAME') ?? 'JRAZA';
    }
}