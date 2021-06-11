<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function index()
    {
        $dest = $_GET['dest'];
        $title = $_GET['title'];
        $body = $_GET['body'];

        $details = [
            'title' => $title,
            'body' => $body
        ];

        \Mail::to($dest)->send(new \App\Mail\MyTestMail($details));

        dd("Email sudah terkirim.");
    }
}
