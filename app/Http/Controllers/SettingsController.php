<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productparameter;
use App\Models\Productcategory;
use App\Models\Productsubcategory;
use App\Models\Printer;
use App\Models\Producttype;
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

    public function editproductcategory($param)
    {
        $data = Productcategory::find($param);
        return view('settings/productcategory',compact('data'));

            
    }



    public function productsubcategory(Request $request)
    {
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

}

