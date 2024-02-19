<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->id() == 1) {
            $data['meetings'] = Meeting::upcoming()->get();
        } else {
            $data['meetings'] = Meeting::upcoming()->guests()->get();
        }
        return view('home', $data);
    }
}
