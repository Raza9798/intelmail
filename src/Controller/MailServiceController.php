<?php

namespace Intelrx\Intelmail\Controller;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class MailServiceController extends Controller
{
    public function postService(Request $request){
        dd($request->all());
    }
}
