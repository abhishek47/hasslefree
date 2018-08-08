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
             $expo = \ExponentPhpSDK\Expo::normalSetup();

            foreach($tokens as $key => $token) {

                  $interestDetails = ['user-' . $token->user_id, $token->token];


                  $expo->subscribe($interestDetails[0], $interestDetails[1]);
                  $notification = ['body' => request('message')];
                  try {
                    $expo->notify($interestDetails[0], $notification);
                  } catch(Exception $e) {

                  }

            }

            flash('Notification was sent to all the users')->success();

            return back();

        }
}
