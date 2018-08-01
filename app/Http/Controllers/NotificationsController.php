<?php

namespace App\Http\Controllers;

use App\Models\PushToken;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
       public function index()
        {
            return view('notifications.index');
        }

        public function send()
        {
            $tokens = PushToken::all();
            foreach($tokens as $key => $token) {

                  $interestDetails = [$token->user_id, $token->token];
                  $expo = \ExponentPhpSDK\Expo::normalSetup();

                  $expo->subscribe($interestDetails[0], $interestDetails[1]);
                  $notification = ['body' => request('message')];
                  $expo->notify($interestDetails[0], $notification);

            }

            flash('Notification was sent to all the users')->success();

            return back();

        }
}
