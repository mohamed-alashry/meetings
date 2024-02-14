<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginUserRequest;
use App\Models\Meeting;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->id() == 1) {
            $data['meetings'] = Meeting::upcoming()->get();
        } else {
            $data['meetings'] = Meeting::upcoming()->where('user_id', auth()->id())->get();
        }
        return view('home', $data);
    }
}
