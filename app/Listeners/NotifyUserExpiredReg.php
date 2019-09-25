<?php

namespace App\Listeners;

use App\Events\UserRegExpired;
use App\Notifications\NotifyUserExpiredReg as NotificationUserExpiredReg;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyUserExpiredReg implements ShouldQueue
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserRegExpired  $event
     * @return void
     */
    public function handle(UserRegExpired $event)
    {
        Log::debug('NotifyUserExpiredReg-handle called!');
        $user = $event->user;
        $user->notify(new NotificationUserExpiredReg($user));
    }
}
