<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginUserRequest;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
}
