<?php

namespace App\Listeners;

use App\Models\Tenant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTenantForNewUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;

        $tenant = Tenant::create([
            'name' => $user->name . "'s Workspace"
        ]);

        $user->tenant()->associate($tenant);
        $user->save();
    }
}
