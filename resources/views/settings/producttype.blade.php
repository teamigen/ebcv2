@include('layout.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />  
<section class="ebc-orders">
  <div class="container">
    <div class="row col-md-12">
    <div class="col-md-6">
        <h3 style="font-size:14px">Create New Type</h3>
        <hr>
        <form id="form1" method="post" action="{{route('saveproducttype')}}">
        @csrf
        <div class="col-md-12">
            <label for="field1">Type Name</label>
            <input type="text" class="form-control" value="@if(isset($data->typeName)) {{$data->typeName}} @endif" id="typeName" name="typeName" required> 
        </div>
       
        <div class="col-md-12" style="margin-top:12px">
        <input type="hidden" name="id" value="@if(isset($data->id)) {{$data->id}} @endif">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        
        </form>
        </div>
    <div class="col-md-6" style="border-left:1px solid #ccc">
        <h3 style="font-size:14px">Manage Type</h3>
        <hr>
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
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
ajax: "{{ route('producttype') }}",
columns: [
// {data: 'id', name: 'id'},
{data: 'typeName', name: 'typeName'},
{
                data: null,
                render: function (data, type, row)
                    {
 
                        return '<a href="{{URL::to("settings/editproducttype")}}/'+row.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;';
 
                    }
                },]
});
}); 
        </script> 
        