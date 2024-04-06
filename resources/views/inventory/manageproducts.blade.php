@include('layout.head')
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />  

       
<section class="ebc-orders">
  <div class="container">
    <div class="row col-md-12">
    <h3 style="font-size:14px">Manage subcategory
    <a href="{{route('createproducts')}}"><button class="btn btn-success" type="button" style="float:right">+</button></a>
</h3>

    <div class="col-md-12">

       
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
 
 
            return '<a href="{{URL::to("inventory/editproducts")}}/'+row.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;';
 
                    }
                },]
});
}); 


</script>

