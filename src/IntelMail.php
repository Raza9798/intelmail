<?php

namespace Rapidrx\Intelmail;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Rapidrx\Intelmail\Controller\MailServiceController;
use Rapidrx\Intelmail\Mail\SmtpMailService;
use Rapidrx\Rapidkit\Config\Config;

class IntelMail extends Controller
{
    public static function post($data) : void
    {
        (new MailServiceController())->postService(new Request($data));
    }

    public static function smtp() : void
    {
        $mailConfigUserName = env("MAIL_USERNAME");
        if ($mailConfigUserName != null) {
            Mail::to('jrazavistag@gmail.com') ->send(new SmtpMailService());
        }
    }
}
