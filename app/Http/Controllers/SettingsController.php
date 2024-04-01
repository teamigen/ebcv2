<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productparameter;
use App\Models\Productcategory;
use App\Models\Tax;
use Illuminate\Http\RedirectResponse;
use DataTables;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings/settingshome');
    }

    public function productparameter(Request $request)
    {

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
    public function tax(Request $request)
    {
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
    public function productcategory(Request $request)
    {
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
    public function productsubcategory()
    {
        return view('settings/productsubcategory');
    }
    public function producttype()
    {
        return view('settings/producttype');
    }
    public function printers()
    {
        return view('settings/printers');
    }
    public function customertype()
    {
        return view('settings/customertype');
    }
    public function addons()
    {
        return view('settings/addons');
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

    public function editproductcateogy($param)
    {
        $data = Tax::find($param);
        return view('settings/productcategory',compact('data'));

            
    }
}

