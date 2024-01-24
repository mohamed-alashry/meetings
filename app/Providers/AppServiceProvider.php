<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // morph mapping
        Relation::enforceMorphMap([
            'invitee'            => 'App\Models\Invitee',
            'user'               => 'App\Models\User',
            'guest'              => 'App\Models\Guest',
            'room'               => 'App\Models\Room',
            'media'              => 'App\Models\RoomMedia',
            'meeting'            => 'App\Models\Meeting',
            'room_feature'       => 'App\Models\RoomFeature',
            'meeting_invitation' => 'App\Models\MeetingInvitation',
        ]);

    }
}
