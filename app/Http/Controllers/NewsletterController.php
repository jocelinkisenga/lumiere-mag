<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribe (Request $request) {
    $request->validate(["email" => 'require|email|unique:subscribers']);
    Subscriber::create(["email" => $request->email]);

    return back()->with("success", "Vous venez de vous abonner a notre news letter");
    }

    public function sendNeslette(Request $request) {
        $request->validate(["subject" => 'require',
            "message" => 'require'
    ]);

    $subscribers = Subscriber::all();
    
            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)
                    ->send(new NewsletterMail($request->subject, $request->message));
            }
    
        return back()->with("success", "Vous venez d'envoyer la news letter");
    }
}