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

        $user = $request->user();
        $notification_read = NotificationRead::where('user_id', $user->id)
            ->where('notification_id', $notification->id)
            ->first();

        if(!is_null($notification_read)) {

            $notification_read->read = true;
            $notification_read->save();

        }

        return $notification;

    }

    public function list(Request $request) {

        $user = $request->user();
        return Notification::whereHas('reads', function($query) use($user){

            $query->where('user_id', $user->id)
                ->where('read', false);

        })
        ->orderBy('created_at', 'desc')
        ->orderBy('id', 'desc')
        ->paginate(7);

    }
}
