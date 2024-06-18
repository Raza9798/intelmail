<?php

namespace Intelrx\Intelmail;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Intelrx\Intelmail\Controller\MailServiceController;

class IntelMail extends Controller
{
    public static function post($data) : void
    {
        (new MailServiceController())->postService(new Request($data));
    }
}
