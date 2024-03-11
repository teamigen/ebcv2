<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Log;

use DB;


class JoborderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	function __construct()
	{
		// $this->middleware('auth');
		// $this->middleware('permission:create,view,update,delete');

	}

    
    public function managejoborder()
    {
        if(Auth::check()){
        return view('joborder/manage');
        }else{
            return view('auth.login');
        }
    }

    public function createjoborder()
    {
        if(Auth::check()){
        return view('joborder/create');
        }else{
            return view('auth.login');
        }
    }

   



}
