<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MailTest;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail($customermail){
        Mail::to($customermail)->send(new MailTest());
    }
}
