<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerification;

class MailController extends Controller
{
    public function sendMail(string $email) {
        
        try {
            Mail::to($email)->send(new UserVerification());

        } catch (Exception $ex) {
            echo $ex;
            // return response()->json(['Check your email']);
        }
    }
}
