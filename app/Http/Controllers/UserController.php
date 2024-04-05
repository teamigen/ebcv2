<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

use DataTables;


class UserController extends Controller
{
    public function manageuser(Request $request)
    {
        $data='';

        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
    

            
        return view('user/manageuser',compact('data'));
    }

    public function saveuser(Request $req): RedirectResponse
    {

        if($req->id=='')
        {
            $param = new User();
        
            $param->name         =  $req->name;
            $param->email        =  $req->email;
            $param->userPosition =  $req->userPosition;
            $param->uniquePin =  $req->uniquePin;
            $param->password     =  Hash::make($req->password);

            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = User::find($req->id);
         
            $param->name         =  $req->name;
            $param->email        =  $req->email;
            $param->userPosition =  $req->userPosition;
            $param->uniquePin =  $req->uniquePin;
          
            $param->save();            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('user/manageuser')->withNotify($notify);
    }

    public function checkexist(Request $req)
    {
       //echo $req->uniquepin;
       $user = User::where($req->inputname, '=', $req->check)->first();
       if (User::where($req->inputname, '=',$req->check)->count() > 0) {
        echo "1";
       }    
       else
       {
        echo "0";
       }
    }

    public function edituser($param)
    {
        $data = User::find($param);
          
        return view('user/manageuser',compact('data'));    
    }
}
