<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\User\LoginUserRequest;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->id() == 1) {
            $data['meetings'] = Meeting::upcoming()->get();
        } else {
            $data['meetings'] = Meeting::upcoming()
                ->where(function (Builder $query) {
                    $query->where('user_id', auth()->id())
                        ->orWhereHas('invitations.userable', function (Builder $query) {
                            $query->where('email', auth()->user()->email);
                        });
                })

                ->get();
        }
        return view('home', $data);
    }
}
