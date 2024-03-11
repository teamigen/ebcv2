<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Log;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Session;
use Cookie;
  
use DB;

class AuthController extends Controller
{
    

    public function index()
    {
		if(Auth::check()){
			$notify[] = ['success', 'You are logged in.'];
			return redirect("/dashboard")->withNotify($notify);
		}else{
			return view('auth.login');
		}
    }  


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        // print_r($_POST);exit();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
		
		
        if (Auth::attempt($credentials)) {
            
			$id        = Auth::user()->id;
            $Log = new Log();
            $Log->user_id        =  $id;
			$Log->user_name      =  Auth::user()->name;
            $Log->controller     = 'AuthController';
            $Log->method         = 'Login';
            $Log->save();
            
			//Cookie expiration time is 1 year
		    Cookie::queue('UID', $id, 525600);
			
			

            
            $notify[] = ['success', 'You have Successfully loggedin.'];
            return redirect()->intended('home')->withNotify($notify);
        }
			$notify[] = ['error', 'Oppes! You have entered invalid credentials'];
			return redirect("/")->withNotify($notify);
    }
      

}