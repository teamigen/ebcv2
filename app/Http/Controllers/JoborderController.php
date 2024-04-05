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

use App\Models\Customertype;
use App\Models\Source;
use App\Models\Tax;
use App\Models\Customerdetail;

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

            $customertype = Customertype::all();
            $source = Source::all();
            $tax = Tax::all();

        return view('joborder/create',compact('customertype','source','tax'));
        }else{
            return view('auth.login');
        }
    }

    public function savecustomerform(Request $req)
    {   
        // echo"<pre>";print_r($_POST);

        if($req->primeId=='')
        {
            $param = new Customerdetail();
        
            $param->customerPhone         =  $req->customerPhone;
            $param->customerName          =  $req->customerName;
            $param->email                 =  $req->customerEmail;
            $param->address               =  $req->address;
            $param->customerTypeId        =  $req->customerTypeId;
            $param->sourceId              =  $req->sourceId;
            $param->taxId                 =  $req->taxId;
            $param->enquiryData           =  "";
            $param->joborderStatus        = 0;

            $param->save();
            echo $param->id;
            // echo "added";
            // $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Customerdetail::find($req->primeId);
         
            $param->customerPhone         =  $req->customerPhone;
            $param->customerName          =  $req->customerName;
            $param->email                 =  $req->email;
            $param->address               =  $req->address;
            $param->customerTypeId        =  $req->customerTypeId;
            $param->sourceId              =  $req->sourceId;
            $param->taxId                 =  $req->taxId;
            $param->joborderStatus        = 0;
          
            $param->save();  
            echo "updated";          
            // $notify[] = ['success', 'updated successfully.'];
        }

    }

   



}
