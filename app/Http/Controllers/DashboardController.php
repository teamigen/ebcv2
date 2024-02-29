<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function home()
    {
        return view('home');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
