<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productparameter;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings/settingshome');
    }

    public function productparameter()
    {
        return view('settings/productparameter');
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
        $param = new Productparameter();
        $param->parameterName        =  $req->parameterName;
		$param->parameterValue      =  $req->paramValues;
        $param->save();
        $notify[] = ['success', 'created successfully.'];
        return redirect()->intended('settings/productparameter')->withNotify($notify);
    }
}

