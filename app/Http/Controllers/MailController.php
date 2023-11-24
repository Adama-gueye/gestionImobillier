<?php

namespace App\Http\Controllers;

use App\Mail\Bienvenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index() {
        $mailData = [
            'title' => 'Mail from Webappfix',
            'body' => 'This is for testing email usign smtp',
        ];
        Mail::to('adamarahma99@gmail.com')->send(new Bienvenue($mailData));

        return 'Email send successfully.';
    }
}
