<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productparameter;
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
        //     ->addColumn('action', function($row){
       
        //         $btn = '<a href="editparameter/'.$row->id.'" class="edit btn btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
        //         </a>';
        //         $btn = $btn.'<a href="javascript:void(0)" class="edit btn  btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
        //         </a>';

        //          return $btn;
        //  })
            ->rawColumns(['action'])
            ->make(true);
            }
            return view('settings/productparameter',compact('data'));
            

        
    }
    public function tax()
    {
        return view('settings/tax');
    }
    public function productcategory()
    {
        return view('settings/productcategory');
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
        // print_r($_POST);
        
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
        //    print_r($_POST);
            
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
}

