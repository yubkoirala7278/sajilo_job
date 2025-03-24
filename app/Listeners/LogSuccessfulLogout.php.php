<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Cache;

class LogSuccessfulLogout
{
    public function handle(Logout $event)
    {
        $user = $event->user;

        if ($user) {
            Cache::forget('user-is-online-' . $user->id);
            $user->last_seen_at = now();
            $user->save();
        }
    }
}
