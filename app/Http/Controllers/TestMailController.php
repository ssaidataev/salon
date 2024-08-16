<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class MailController extends Controller
{

    public function sendTestMail()
    {
        $details = [
            'title' => 'Test Mail from Laravel',
            'body' => 'This is a test email sent from Laravel application.'
        ];

        Mail::to('saidataev67@gmail.com')->send(new TestMail($details));

        return 'Test email sent successfully!';
    }
}
