<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function show() {
        $notifications = Notification::with(['answer.user'])->where('user_id', Auth::user()->id)->get();
        return view('notification', compact('notifications'));
    }
}
