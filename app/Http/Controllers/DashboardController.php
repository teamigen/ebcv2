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


class DashboardController extends Controller
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

    
    public function home()
    {
        if(Auth::check()){
        return view('home');
        }else{
            return view('auth.login');
        }
    }

    public function dashboard()
    {
        
          //$data['page_title'] = "Dashboard";
          if(Auth::check()){
		  return view('dashboard/index');
        }else{
            return view('auth.login');
        }
        
    }


    public function logout(Request $request)
    {
         $id        = base64_decode($request->id);
         $name = User::where("id", $id)->first();


         $Log = new Log();
         $Log->user_id        =  $id;
		 $Log->user_name      =  $name->name;
         $Log->controller     = 'AuthController';
         $Log->method         = 'logout';
         $Log->save();

         Cookie::queue(Cookie::forget('UID'));
		 Session::flush();
         Auth::logout();
  
         return Redirect('/');
    }



}
