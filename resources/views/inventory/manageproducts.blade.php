@include('layout.head')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />  
<section class="ebc-orders">
  <div class="container">
    <div class="row col-md-12">
    <div class="col-md-6">
        <h3 style="font-size:14px">Create New subcategory</h3>
        <hr>
         <form id="form1" method="post" action="{{route('saveproducts')}}">
         @csrf
        
         <div class="col-md-12">
            <label for="field1">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" required value="@if(isset($data->productName)) {{$data->productName}} @endif">
        </div>

        <div class="col-md-12">
            <label for="field1">Product Rate</label>
            <input type="text" class="form-control" id="productRate" name="productRate" required value="@if(isset($data->productRate)) {{$data->productRate}} @endif">
        </div>


        <div class="col-md-12">
            <label for="field1">Product parameter</label>
            <select class="form-control" name="productParamaterId" id="productParamaterId" required >
                <option value="">Select</option>
                <?php foreach ($productparameters as $key => $value) {
                   echo "<option value=".$value->id.">".$value->parameterName."(".$value->parameterValue.")</option>";
                }
                ?>
               
        </select>
        </div>

        <div class="col-md-12">
            <label for="field1">Pieces</label>
            <input type="text" class="form-control" id="productPieces" name="productPieces" required value="@if(isset($data->productPieces)) {{$data->productPieces}} @endif">
        </div>

        <div class="col-md-12">
            <label for="field1">Equation for qty</label>
            <input type="text" class="form-control" id="equaionForqty" name="equaionForqty" required value="@if(isset($data->equaionForqty)) {{$data->equaionForqty}} @endif">
        </div>

        <div class="col-md-12">
            <label for="field1">Tax</label>
            <select class="form-control" name="taxId" id="taxId" required >
                <option value="">Select</option>
                <?php foreach ($taxes as $key => $value) {
                   echo "<option value=".$value->id.">".$value->taxName."(".$value->taxValue.")</option>";
                }
                ?>
               
        </select>
        </div>

        <div class="col-md-12">
            <label for="field1">Product category</label>
            <select class="form-control" name="categoryId" id="categoryId" required>
                <option value="">Select</option>
                <?php foreach ($productcategories as $key => $value) {
                   echo "<option value=".$value->id.">".$value->categoryName."</option>";
                }
                ?>
               
        </select>
        </div>

        <div class="col-md-12">
            <label for="field1">Product sub category</label>
            <select class="form-control" name="subCategoryId" id="subCategoryId" required>
                <option value="">Select</option>
                               
        </select>
        </div>

        <div class="col-md-12">
            <label for="field1">Product Type</label>
            <select class="form-control" name="producttypeId" id="producttypeId" required>
                <option value="">Select</option>
                <?php foreach ($producttypes as $key => $value) {
                   echo "<option value=".$value->id.">".$value->typeName."</option>";
                }
                ?>
               
        </select>
        </div>
       
        <div class="col-md-12">
            <label for="field1">Printer</label>
            <select class="form-control" name="printerId" id="printerId" required>
                <option value="">Select</option>
                <?php foreach ($printers as $key => $value) {
                   echo "<option value=".$value->id.">".$value->printerName."</option>";
                }
                ?>
               
        </select>
        </div>

        <div class="col-md-12">
            <label for="field1">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>


        <div class="col-md-12" style="margin-top:12px">
            <input type="hidden" name="id" value="@if(isset($data->id)) {{$data->id}} @endif">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        
        </form>
        </div>
    <div class="col-md-6" style="border-left:1px solid #ccc">
        <h3 style="font-size:14px">Manage subcategory</h3>
        <hr>
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>Product Name</th>               
                    <th>Rate</th>               
                    <!-- <th>Product Image</th>                -->
                    <th>Action</th>               
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
    </style>

<script type="text/javascript">
$(function () {
var table = $('#datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ route('manageproducts') }}",
columns: [
{data: 'productName', name: 'productName'},
{data: 'productRate', name: 'productRate'},
// {data: 'subcategoryName', name: 'subcategoryName'},
{
                data: null,
                render: function (data, type, row)
                    {
 
 
            return '<a href="editproducts/'+row.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;';
            // '<a style="cursor:pointer" onclick="deleteparameter('+row.id+')"><i class="fa fa-trash" aria-hidden="true"></i></a>';
 
                    }
                },]
});
}); 


$("#categoryId").change(function(){

    var catId = $("#categoryId").val();
$.ajax({

    url:"{{route('getsubcategory')}}",
                    type: 'POST',
                    data:{"catId":catId},
                    // dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {

                        $("#subCategoryId").html(data);
                       
                    },
                     
                });

});






</script> 
        