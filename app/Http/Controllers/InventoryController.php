<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productparameter;
use App\Models\Tax;
use App\Models\Productcategory;
use App\Models\Producttype;
use App\Models\Printer;
use Illuminate\Http\RedirectResponse;
use DataTables;

class InventoryController extends Controller
{
    public function manageproducts(Request $request)
    {
        $data='';
        if ($request->ajax()) {
        $data = Product::select('*');
        return Datatables::of($data)
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
        }


        $productparameters = Productparameter::all();
        $taxes = Tax::all();
        $productcategories = Productcategory::all();
        $producttypes = Producttype::all();
        $printers = Printer::all();


        return view('inventory/manageproducts',compact('data','productparameters','taxes','productcategories','producttypes','printers'));

    }

    public function saveproducts(Request $req)
    {
        if($req->id=='')
        {
            $param = new Product();
        
        $param->productName             =  $req->productName;
		$param->productRate             =  $req->productRate;
		$param->productParamaterId      =  $req->productParamaterId;
		$param->productPieces           =  $req->productPieces;
		$param->equaionForqty           =  $req->equaionForqty;
		$param->taxId                   =  $req->taxId;
		$param->categoryId              =  $req->categoryId;
		$param->subCategoryId           =  $req->subCategoryId;
		$param->producttypeId           =  $req->producttypeId;
		$param->printerId               =  $req->printerId;
		$param->image                   =  $req->image;
            $param->save();
            $notify[] = ['success', 'created successfully.'];
        }
        else
        {

            $param = Product::find($req->id);
 
        
            $param->productName             =  $req->productName;
            $param->productRate             =  $req->productRate;
            $param->productParamaterId      =  $req->productParamaterId;
            $param->productPieces           =  $req->productPieces;
            $param->equaionForqty           =  $req->equaionForqty;
            $param->taxId                   =  $req->taxId;
            $param->categoryId              =  $req->categoryId;
            $param->subCategoryId           =  $req->subCategoryId;
            $param->producttypeId           =  $req->producttypeId;
            $param->printerId               =  $req->printerId;
            $param->image                   =  $req->image;

              
            $param->save();

            
            $notify[] = ['success', 'updated successfully.'];
        }
        
        return redirect()->intended('inventory/manageproducts')->withNotify($notify);
    }
}
