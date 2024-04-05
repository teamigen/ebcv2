<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productparameter;
use App\Models\Productcategory;
use App\Models\Productsubcategory;
use App\Models\Printer;
use App\Models\Producttype;
use App\Models\Customertype;
use App\Models\Addons;
use App\Models\Tax;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use DataTables;
use DB;

class SettingsController extends Controller
{
    public function index()
    {
        if(Auth::check()){

            return view('settings/settingshome');
        }
        else
        {
            return view('auth.login');
        }
        
    }

    public function productparameter(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Productparameter::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/productparameter',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

        
            

        
    }
    public function tax(Request $request)
    {
        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
                $data = Tax::select('*');
                return Datatables::of($data)
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
                }
            return view('settings/tax',compact('data'));
        }
        else
        {
            return view('auth.login');
        }
        
        
    }
    public function productcategory(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Productcategory::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/productcategory',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

        
    }
   
    
   
   
    

    public function saveparameter(Request $req): RedirectResponse
    
    {
        if($req->id=='')
        {
            $param = new Productparameter();
        
        $param->parameterName        =  $req->parameterName;
		$param->parameterValue      =  $req->parameterValue;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Productparameter::find($req->id);
 
        
        $param->parameterName        =  $req->parameterName;
		$param->parameterValue      =  $req->parameterValue;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/productparameter')->withNotify($notify);
    }

    public function editparameter($param)
    {
        $data = Productparameter::find($param);
        return view('settings/productparameter',compact('data'));

            
    }

    public function savetax(Request $req): RedirectResponse
    
    {
        if($req->id=='')
        {
            $param = new Tax();
        
        $param->taxName        =  $req->taxName;
		$param->taxValue      =  $req->taxValue;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Tax::find($req->id);
 
        
        $param->taxName        =  $req->taxName;
		$param->taxValue      =  $req->taxValue;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/tax')->withNotify($notify);
    }

    public function edittax($param)
    {
        $data = Tax::find($param);
        return view('settings/tax',compact('data'));

            
    }

    public function saveproductcategory(Request $req): RedirectResponse
    
    {
        if($req->id=='')
        {
            $param = new Productcategory();
        
        $param->categoryName        =  $req->categoryName;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Productcategory::find($req->id);
 
        
            $param->categoryName        =  $req->categoryName;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/productcategory')->withNotify($notify);
    }

    public function editproductcategory($param)
    {
        $data = Productcategory::find($param);
        return view('settings/productcategory',compact('data'));

            
    }



    public function productsubcategory(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            
            $data = Productsubcategory::join('productcategories', 'productcategories.id', '=', 'productsubcategories.catId')
                          ->get(['productcategories.categoryName', 'productsubcategories.subcategoryName','productsubcategories.id']);
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
    
    
            $productcategories = Productcategory::all();
    
            return view('settings/productsubcategory',compact('data','productcategories'));
        }
        else
        {
            return view('auth.login');
        }

        
    }

    public function saveproductsubcategory(Request $req):RedirectResponse
    {
        if($req->id=='')
        {
            $param = new Productsubcategory();
        
        $param->catId        =  $req->catId;
		$param->subcategoryName      =  $req->subcategoryName;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Productsubcategory::find($req->id);
 
        
        $param->catId        =  $req->catId;
		$param->subcategoryName      =  $req->subcategoryName;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/productsubcategory')->withNotify($notify);
    }

    public function editproductsubcategory($param)
    {
        $data = Productsubcategory::find($param);
        $productcategories = Productcategory::all();

        return view('settings/productsubcategory',compact('data','productcategories'));    
    }

    public function producttype(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Producttype::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/producttype',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

      
   

    }

    public function saveproducttype(Request $req) :RedirectResponse
    {
        if($req->id=='')
        {
            $param = new Producttype();
        
		    $param->typeName      =  $req->typeName;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Producttype::find($req->id);
 
        
		$param->typeName      =  $req->typeName;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/producttype')->withNotify($notify);
    }

    public function editproducttype($param)
    {
        $data = Producttype::find($param);

        return view('settings/producttype',compact('data'));    
    }


    public function printers(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Printer::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/printers',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

       
    }

    public function saveprinter(Request $req) :RedirectResponse
    {
        if($req->id=='')
        {
            $param = new Printer();
        
		    $param->printerName      =  $req->printerName;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Printer::find($req->id);
 
        
		$param->printerName      =  $req->printerName;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/printers')->withNotify($notify);
    }

    public function editprinter($param)
    {
        $data = Printer::find($param);

        return view('settings/printers',compact('data'));    
    }

    public function customertype(Request $request)
    {

        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Customertype::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/customertype',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

        
    }

    public function savecustomertype(Request $req): RedirectResponse
    
    {
        if($req->id=='')
        {
            $param = new Customertype();
        
        $param->typeName        =  $req->typeName;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Customertype::find($req->id);
 
        
        $param->typeName        =  $req->typeName;
          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/customertype')->withNotify($notify);
    }


    public function editcustomertype($param)
    {
        $data = Customertype::find($param);

        return view('settings/customertype',compact('data'));    
    }


    public function addons(Request $request)
    {
        if(Auth::check()){

            $data='';
            if ($request->ajax()) {
            $data = Addons::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/addons',compact('data'));
        }
        else
        {
            return view('auth.login');
        }

        
    }

    public function saveaddons(Request $req): RedirectResponse
    
    {
        if($req->id=='')
        {
            $param = new Addons();
        
        $param->name        =  $req->name;
        $param->rate        =  $req->rate;
        $param->minRate        =  $req->minRate;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Addons::find($req->id);
 
        
        $param->name        =  $req->name;
        $param->rate        =  $req->rate;
        $param->minRate        =  $req->minRate;

          
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('settings/addons')->withNotify($notify);
    }

    public function editaddons($param)
    {
        $data = Addons::find($param);
          
        return view('settings/addons',compact('data'));    
    }

    public function getsubcategory(Request $request)
    {

       $param = $request->catId;
      

        $result = DB::table('productsubcategories')
        ->where('catId', '=', $param)
        ->get();
        // print_r($users);
        echo'<option value="">Select</option>';
        foreach ($result as $key => $value) {
            $selected='';
            if($request->subcatId!='')
                {
                    if($request->subcatId==$value->id)
                    {
                        $selected='selected';
                    }
                }
            echo "<option value=".$value->id." ".$selected.">".$value->subcategoryName."</option>";
        }
        
    }


}

