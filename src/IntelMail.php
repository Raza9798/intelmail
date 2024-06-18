<?php

namespace Intelrx\Intelmail;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intelrx\Intelmail\Controller\MailServiceController;
use Intelrx\Intelmail\Mail\SmtpMailService;
use Intelrx\Rapidkit\Config\Config;

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
