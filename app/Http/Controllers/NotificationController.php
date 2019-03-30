<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function updateNotifications(Request $request)
    {
        $notifications = $request->notification;
        $url = $request->current_url;
        if(isset($notifications))
        {
            foreach ($notifications as $key => $notify)
            {
                if(isset($notifications[$key]))
                {
                    $objModel = Notification::find($key);
                    $objModel->status = 'read';
                    $objModel->save();
                }
            }
        }
        return redirect($url);
    }
}
