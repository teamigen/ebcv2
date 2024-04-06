<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productparameter;
use App\Models\Tax;
use App\Models\Productcategory;
use App\Models\Customertype;
use App\Models\Producttype;
use App\Models\Printer;
use App\Models\Addons;
use Illuminate\Http\RedirectResponse;
use DataTables;
use DB;
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


        return view('inventory/manageproducts',compact('data'));

    }

    public function saveproducts(Request $req): RedirectResponse
    {
        // exit();
        if($req->id=='')
        {
            $param = new Product();
            
        
            $param->productName             =  $req->productName;
            $param->productRate             =  $req->productRate;
            $param->productParamaterId      =  implode("~",$req->productParamaterId);
            $param->productPieces           =  $req->productPieces;
            $param->equaionForqty           =  $req->equaionForqty;
            $param->taxId                   =  $req->taxId;
            $param->categoryId              =  $req->categoryId;
            $param->subCategoryId           =  $req->subCategoryId;
            $param->producttypeId           =  $req->producttypeId;
            $param->printerId               =  implode("~",$req->printerId);
            $param->relatedProducts         =  implode("~",$req->relatedProducts);
            $param->initialStock            =  $req->initialStock;
            $param->initialStockRate        =  $req->initialStockRate;
		// $param->image                   =  $req->image;


        $req->validate([
            'image'=>'required|mimes:jpg,jpeg,png,bmp',
        ]);

        $imageName = '';
        if ($image = $req->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads', $imageName);
        }
        $param->image                   =  $imageName;

        
      

        //additionaimages

        
    
            $input=$req->all();
    $images=array();
    if($files=$req->file('productaddImage')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('images/uploads/additional/', $name);
            $images[]=$name;
        }
    }

    $param->additionalImages         =  implode("~",$images);
    

          $param->save();

        $insertId = $param->id;

    //raw components

    for($i=0;$i<count($req->rawproductId);$i++)
    {
       
        $values = array('productId' => $insertId,'rawProductId' => $req->rawproductId[$i],'rawQuantyNum' => $req->rawquantynum[$i],'rawRate' => $req->rawrate[$i]);
        DB::table('productcomponents')->insert($values);


    }

    //addons
    for($j=0;$j<count($req->addOns);$j++)
    { 
        $values = array('productId' => $insertId,'addOnId' => $req->addOns[$j],'rate' => $req->addonRate[$j],'minRate' => $req->addonminRate[$j]);
        DB::table('productaddons')->insert($values);
    }

    //customertypediscountslab

    for($k=0;$k<count($req->customerTypeId);$k++)
    {
        $values = array('productId' => $insertId,'customerTypeId' => $req->customerTypeId[$k],'discountMax' => $req->discountMax[$k]);
        DB::table('product_customertypediscount')->insert($values);
}

// exit();
            

            $notify[] = ['success', 'created successfully.'];
        }
        // else
        // {

        //     $param = Product::find($req->id);
 
        
        //     $param->productName             =  $req->productName;
        //     $param->productRate             =  $req->productRate;
        //     $param->productParamaterId      =  $req->productParamaterId;
        //     $param->productPieces           =  $req->productPieces;
        //     $param->equaionForqty           =  $req->equaionForqty;
        //     $param->taxId                   =  $req->taxId;
        //     $param->categoryId              =  $req->categoryId;
        //     $param->subCategoryId           =  $req->subCategoryId;
        //     $param->producttypeId           =  $req->producttypeId;
        //     $param->printerId               =  implode("~",$req->printerId);
        //     $param->relatedProducts               =  implode("~",$req->relatedProducts);
        //     $param->initialStock            =  $req->initialStock;
        //     $param->initialStockRate        =  $req->initialStockRate;
        //     $req->validate([    
        //         'image'=>'required|mimes:jpg,jpeg,png,bmp',
        //     ]);
    
        //     $imageName = '';
        //     if ($image = $req->file('image')){
        //         $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
        //         $image->move('images/uploads', $imageName);
        //     }
        //     $param->image                   =  $imageName;

              
        //     $param->save();

            
        //     $notify[] = ['success', 'updated successfully.'];
        // }
        
        return redirect()->intended('inventory/manageproducts')->withNotify($notify);
    }

    public function editproducts($param)
    {
        $data = Product::find($param);

       
        $productparameters = Productparameter::all();
        $taxes = Tax::all();
        $productcategories = Productcategory::all();
        $producttypes = Producttype::all();
        $printers = Printer::all();
        $customertype = Customertype::all();
        $rawmaterials = Product::all();
        $addons = Addons::all();

        return view('inventory/createproducts',compact('data','productparameters','taxes','productcategories','producttypes','printers','customertype','rawmaterials','addons'));
            
    }

    public function createproducts()
    {
        $data='';
        $productparameters = Productparameter::all();
        $taxes = Tax::all();
        $productcategories = Productcategory::all();
        $producttypes = Producttype::all();
        $printers = Printer::all();
        $customertype = Customertype::all();
        $rawmaterials = Product::all();
        $addons = Addons::all();


        return view('inventory/createproducts',compact('data','productparameters','taxes','productcategories','producttypes','printers','customertype','rawmaterials','addons'));
    }
}
