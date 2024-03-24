<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  
use Illuminate\Http\RedirectResponse;

use App\Models\productparameter;

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

    // public function saveparameter()
    public function saveparameter(Request $request)
    {
        print_r($_POST);
        $productparameter = new productparameter;
        $productparameter->parameterName=$request->parameterName;
        $productparameter->parameterValue=$request->parameterValue;
        $productparameter->save();

    }
}

