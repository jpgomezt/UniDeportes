<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendWelcomeMail(){
        Mail::to(Auth::user()->email)->send(new WelcomeMail());
        return redirect('agregar-deportes');
    }
}
