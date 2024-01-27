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
        $data['meetings'] = Meeting::upcoming()->get();
        return view('home', $data);
    }
}
