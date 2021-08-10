<?php

namespace App\Http\Controllers;

use App\Notification;
use App\NotificationRead;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {

        return view('notification.index');

    }

    public function show(Request $request, Notification $notification) {

        return view('notification.show', compact('notification'));

    }

}
