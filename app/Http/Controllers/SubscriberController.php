<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return view("pages.admin.listSubscribers", ["subscribers" => Subscriber::latest()->get()]);
    }
}
