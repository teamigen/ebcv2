@include('layout.head')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link href="https://ritzeben.com/ebc/assets/multiselect/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/multiselect/css/multiselect.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/multiselect/css/components.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{ asset('assets/multiselect/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/multiselect/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/multiselect/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/multiselect/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/multiselect/js/pages/form_multiselect.js')}}"></script>
<link href="{{ asset('assets/multiselect/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row" id="appenddisplay">
       
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<section class="ebc-orders">
  <div class="container">
    <div class="row col-md-12">
    <div class="col-md-12">
        <h3 style="font-size:14px">Create New subcategory</h3>
        <hr>
         <form id="form1" class="row" method="post" action="{{route('saveproducts')}}" enctype="multipart/form-data">
         @csrf
        
         <div class="col-md-4">
            <label for="field1">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName"   value="@if(isset($data->productName)) {{$data->productName}} @endif">
        </div>

        <div class="col-md-4">
            <label for="field1">Product Rate</label>
            <input type="text" class="form-control" id="productRate" name="productRate"   value="@if(isset($data->productRate)) {{$data->productRate}} @endif">
        </div>


        <div class="col-md-4">
            <label for="field1">Product parameter</label>
            <div class="multi-select-full">
                <select  class="multiselect " id="productParamaterId" name="productParamaterId[]" multiple="multiple">
                @foreach($productparameters as $pp)
                @php
                    $selected = "";
                @endphp
                @if(isset($data->productParamaterId))
                    @if($data->productParamaterId==$pp->id)
                    @php
                    $selected = "selected";
                @endphp
                    @endif
                    @endif
                   <option value='{{$pp->id}}' {{$selected}}>{{$pp->parameterName}}({{$pp->parameterValue}})</option>
                @endforeach  
                </select>                                      
            </div>
            
        </div>

        <div class="col-md-4">
            <label for="field1">Pieces</label>
            <input type="text" class="form-control" id="productPieces" name="productPieces"  value="@if(isset($data->productPieces)) {{$data->productPieces}} @endif">
        </div>

        <div class="col-md-4">
            <label for="field1">Equation for qty</label>
            <input type="text" class="form-control" id="equaionForqty" name="equaionForqty"  value="@if(isset($data->equaionForqty)) {{$data->equaionForqty}} @endif">
        </div>

        <div class="col-md-4">
            <label for="field1">Tax</label>
            <select class="form-control" name="taxId" id="taxId">
                <option value=''>Select</option>
                @foreach ($taxes as $tx)
                @php
                    $selected = "";
                @endphp
                @if(isset($data->taxId))
                    @if($data->taxId==$tx->id)
                    @php
                    $selected = "selected";
                @endphp
                    @endif
                    @endif
                <option value='{{$tx->id}}' {{$selected}}>{{$tx->taxName}}({{$tx->taxValue}})</option>
                @endforeach
               
        </select>
        </div>

        <div class="col-md-4">
            <label for="field1">Product category</label>
            <select class="form-control" name="categoryId" id="categoryId" onchange="getsubcategory(this.value)">
                <option value="">Select</option>
                @foreach($productcategories as $pc)

                @php
                    $selected = "";
                @endphp
                @if(isset($data->categoryId))
                    @if($data->categoryId==$pc->id)
                    @php
                    $selected = "selected";
                @endphp
                    @endif
                    @endif

                 <option value='{{$pc->id}}' {{$selected}}>{{$pc->categoryName}}</option>
                @endforeach
               
        </select>
        </div>

        <div class="col-md-4">
            <label for="field1">Product sub category</label>
            <select class="form-control" name="subCategoryId" id="subCategoryId" >
                <option value="">Select</option>
                               
        </select>
        </div>

        <div class="col-md-4">
            <label for="field1">Product Type</label>
            <select class="form-control" name="producttypeId" id="producttypeId" >
                <option value="">Select</option>
                @foreach($producttypes as $pt)

                @php
                    $selected = "";
                @endphp
                @if(isset($data->producttypeId))
                    @if($data->producttypeId==$pt->id)
                    @php
                    $selected = "selected";
                @endphp
                    @endif
                    @endif

                <option value='{{$pt->id}}' {{$selected}}>{{$pt->typeName}}</option>
                @endforeach               
        </select>
        </div>
       
        <div class="col-md-4">
            <label for="field1">Printer</label>

            <div class="multi-select-full">
                <select  class="multiselect" id="printerId" name="printerId[]" multiple="multiple">
                @foreach($printers as $pn)

                @php
                    $selected = "";
                @endphp
                @if(isset($data->printerId))
                    @if($data->printerId==$pn->id)
                    @php
                    $selected = "selected";
                @endphp
                    @endif
                    @endif

                <option value='{{$pn->id}}' {{$selected}}>{{$pn->printerName}}</option>
                @endforeach 
                </select>                                      
            </div>

        </div>

        <div class="col-md-4">
            <label for="field1">Main Image</label><br>
            @if(isset($data->image))
            <img src=" {{ asset('images/uploads/'.$data->image)}}" style="width:100px"><br><br>
            @endif
           
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="col-md-4">
            <label for="field1">Additional Image</label><br>
            @if(isset($data->additionalImages))
            @php $images = explode("~",$data->additionalImages);@endphp
            @foreach($images as $img)
            <img src=" {{ asset('images/uploads/additional/'.$img)}}" style="width:100px">
            @endforeach
            <br><br>
            @endif
           
            <input type="file" multiple="" class="form-control" id="productaddImage" name="productaddImage[]" accept="image/*">
        </div>
        <hr style="margin-top: 10px; height: 2px;">

        <div class="col-md-12 row" style="margin-top:12px;padding:0px;"> 
            <h6>Discount Slab <span style="float:right"><a class="btn btn-success" data-toggle="modal" data-target="#exampleModal" onclick="getcustomerdiscounts({{$data->id}})"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h6>
            
            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Customer Type</label>
                                     <select  id="customerTypeId1" name="customerTypeId[] " class="select form-control" >
                                        <option value="">Select Customer Type</option>
                                           @foreach($customertype as $ct)
                                           <option value="{{$ct->id}}">{{$ct->typeName}}</option>
                                           @endforeach
                                    </select>
                                    </div>
                                </div>  
                                
                                <div class="col-lg-5">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Max Discount</label>
                                    <input  type="text" class="form-control" id="discountMax1" name="discountMax[]">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" style="margin-top:35px;" onclick="appendcustomertypediscounts()">+</button>
                            </div></div>


                            <div  id="appendcustomertypediscounts"></div>

                            <hr style="margin-top: 10px; height: 2px;">
                            <h6>Components<span style="float:right"><a class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h6>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Raw Material</label>
                                     <select  id="rawproductId1" name="rawproductId[] " class="select form-control">
                                        <option value="">Select </option>
                                        @foreach($rawmaterials as $rm)
                                        <option value="{{$rm->id}}">{{$rm->productName}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>  
                            <div class="col-lg-3">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">No.of Quantity</label>
                                    <input  type="text" class="form-control"
                                         id="rawquantynum1" name="rawquantynum[]">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Rate</label>
                                    <input  type="text" class="form-control"
                                         id="rawrate1" name="rawrate[]">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="appendrawmaterial()">+</button>
                            </div></div>

                            <div  id="appendrawmaterial"></div>

                            <hr style="margin-top: 10px; height: 2px;">
                            <h6>Addons<span style="float:right"><a class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h6>
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Add ons</label>
                                
                                        <select onchange="getaddonsdata(this.value,1)" class="select form-control"  id="addOns1" name="addOns[]" >
                                            <option value="">Select Addons</option>
                                            @foreach($addons as $add)
                                        <option value="{{$add->id}}">{{$add->name}}</option>
                                        @endforeach
                                       
                                        </select>
                                    
                                    
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Rate</label>
                                    <input  readonly type="text" class="form-control"
                                         id="addonRate1" name="addonRate[]">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Min Rate</label>
                                    <input  readonly type="text" class="form-control"
                                         id="addonminRate1" name="addonminRate[]">
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="appendaddondata()">+</button>
                            </div></div>

                            <div  id="appendaddondata"></div>

                            <hr style="margin-top: 10px; height: 2px;">
                            <div class="col-lg-4">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Initial Stock</label>
                                    <input  type="text" class="form-control"   id="initialStock" name="initialStock" value="@if(isset($data->initialStock)) {{$data->initialStock}} @endif">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                <label for="progress-basicpill-lastname-input">Initial Stock Rate</label>
                                    <input  type="text" class="form-control"
                                         id="initialStockRate" name="initialStockRate" value="@if(isset($data->initialStockRate)) {{$data->initialStockRate}} @endif">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Related Products</label>
                                    <div class="multi-select-full">
                                        <select  class="multiselect" id="relatedProducts" name="relatedProducts[]" multiple="multiple">
                                        @foreach($rawmaterials as $rm)
                                        <option value="{{$rm->id}}">{{$rm->productName}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                     
                                    </div>
                                </div> 

                            
                            
        </div>


        <div class="col-md-12" style="margin-top:12px">
            <input type="hidden" name="id" value="@if(isset($data->id)) {{$data->id}} @endif">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        </form>
        </div>
  </div>
</section>


</body>
</html>

<style>
    #datatable_wrapper
    {
        font-size:14px;
    }
    .multiselect .caret
    {
        display:none;
    }
   
    </style>

<script type="text/javascript">



function getsubcategory(id,subcatId="")
{
    $.ajax({

url:"{{route('getsubcategory')}}",
                type: 'POST',
                data:{"catId":id,"subcatId":subcatId},
                // dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    $("#subCategoryId").html(data);
                   
                },
                 
            });



}


var i=2;
function appendcustomertypediscounts()
{
    $("#appendcustomertypediscounts").append('<div class="row appendrow'+i+'" style="padding:0px;"><div class="col-lg-5"><div class="form-group">'+
    '<label>Customer Type</label><select  id="customerTypeId'+i+'" name="customerTypeId[] " class="select form-control">'+
    '<option value="">Select Customer Type</option>  @foreach($customertype as $ct) <option value="{{$ct->id}}">{{$ct->typeName}}</option>'+
    '@endforeach</select>'+
    '</div> </div> <div class="col-lg-5"><div class="form-group"> <label for="progress-basicpill-lastname-input">Max Discount</label>'+
    '<input  type="text" class="form-control"  id="discountMax'+i+'" name="discountMax[]"></div> </div>'+
    '<div class="col-lg-2"><div class="form-group"> <button type="button" style="margin-top:40px" class="btn btn-danger" onclick="removecustomertyperow('+i+')">-</button>'+
    '</div></div></div>');
    i++;

}

function removecustomertyperow(id)
{
    $(".appendrow"+id).remove();
}


var j=2;
function appendrawmaterial()
{
    $("#appendrawmaterial").append('<div class="row appendrawmaterialdiv'+j+'" style="padding:0"><div class="col-lg-4">'+
    '<div class="form-group"> <label>Raw Material</label>'+
    '<select  id="rawproductId1" name="rawproductId[] " class="select form-control">'+
    '<option value="">Select </option>  @foreach($rawmaterials as $rm)<option value="{{$rm->id}}">{{$rm->productName}}</option>'+
    '@endforeach</select>'+
    '</div>  </div>  <div class="col-lg-3"><div class="form-group">'+
   '<label for="progress-basicpill-lastname-input">No.of Quantity</label> <input  type="text" class="form-control"   id="rawquantynum'+j+'" name="rawquantynum[]">'+
    '</div></div>  <div class="col-lg-3"><div class="form-group"> <label for="progress-basicpill-lastname-input">Rate</label>'+
    '<input  type="text" class="form-control"  id="rawrate1" name="rawrate[]"> </div>'+
    '</div> <div class="col-lg-2"> <div class="form-group"> <button style="margin-top:40px" type="button" class="btn btn-danger" onclick="removerawmaterial('+j+')">-</button>'+
    '</div></div>'+
    '</div>');
    j++;
}

function removerawmaterial(id)
{
    $(".appendrawmaterialdiv"+id).remove();
}


var m=2;
function appendaddondata()
{
    $("#appendaddondata").append('<div class="row appendaddondatadiv'+m+'" style="padding:0"><div class="col-lg-4">'+
    '<div class="form-group"><label for="progress-basicpill-lastname-input">Add ons</label>'+
    ' <select onchange="getaddonsdata(this.value,'+m+')" class="select form-control"  id="addOns'+m+'" name="addOns[]" >'+
    '<option value="">Select Addons</option> @foreach($addons as $add)<option value="{{$add->id}}">{{$add->name}}</option>'+
    '@endforeach  </select>'+
    '</div> </div>'+
    '<div class="col-lg-3"> <div class="form-group"> <label for="progress-basicpill-lastname-input">Rate</label>'+
   '<input  readonly type="text" class="form-control"   id="addonRate'+m+'" name="addonRate[]"></div></div>'+
    '<div class="col-lg-3"><div class="form-group">'+
    '<label for="progress-basicpill-lastname-input">Min Rate</label>'+
    '<input  readonly type="text" class="form-control"  id="addonminRate'+m+'" name="addonminRate[]"></div> </div>'+
    '<div class="col-lg-2"> <div class="form-group">'+
    '<button style="margin-top:40px" type="button" class="btn btn-danger" onclick="removeaddondata('+m+')">-</button>'+
    '</div></div></div>');
    m++;
}

function removeaddondata(id)
{
    $(".appendaddondatadiv"+id).remove();
}


function getaddonsdata(addonsId,id)
{
   

    $.ajax({
    url : '{{route('getaddonsdata')}}',
    type: "POST",
    data: {'addonsId': addonsId},
    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

    success: function(datas) 
    {
        // alert(datas);
        var getdata = datas.split("/");
      $("#addonRate"+id).val(getdata[0]);
      $("#addonminRate"+id).val(getdata[1]);
    }
});
}


function getcustomerdiscounts(id)
{
    // alert(id);
    $.ajax({
    url : '{{route("getcustomerdiscounts")}}',
    type: "POST",
    data: {'productId': id},
    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

        success: function(datas) 
        {
            $("#exampleModal").modal("show");
            $("#exampleModalLabel").html("Customertype Discount");
           $("#appenddisplay").html(datas);
           
        }
    });
}

</script> 
        