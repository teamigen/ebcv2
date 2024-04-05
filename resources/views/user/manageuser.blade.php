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
        <h3 style="font-size:14px">Create New User</h3>
        <hr>
         <form id="form1" method="post" action="{{route('saveuser')}}" enctype="multipart/form-data">
         @csrf
        
         <div class="col-md-12">
            <label for="field1">Name of User</label>
            <input type="text" class="form-control" id="name" name="name" required  value="@if(isset($data->name)) {{$data->name}} @endif">
        </div>

        <div class="col-md-12">
            <label for="field1">Email</label>
            <input type="email" class="form-control" id="email" name="email"  onkeyup="checkexist(this.value,'email')" required value="@if(isset($data->email)) {{$data->email}} @endif">
            <span id="erroremail" style="color:red"></span>

        </div>
        @if(!isset($data->name))
        <div class="col-md-12">
            <label for="field1">Password</label>
            <input type="text" class="form-control" id="password" name="password"  required value="@if(isset($data->password)) {{$data->password}} @endif">
        </div>
        @endif
        <div class="col-md-12">
            <label for="field1">Pin for order confirm</label>
            <input type="text" class="form-control" id="uniquePin" onkeyup="checkexist(this.value,'uniquePin')" name="uniquePin"  required value="@if(isset($data->uniquePin)) {{$data->uniquePin}} @endif">
            <span id="erroruniquePin" style="color:red"></span>
        </div>

        <div class="col-md-12">
            <label for="field1">Role</label>
            <select class="form-control" name="userPosition" id="userPosition" >
                <option value="">Select</option>
              
                    


                <option value="Admin" 
                   @if(isset($data->userPosition))
                    @if($data->userPosition=='Admin') @php echo 'selected'; @endphp @endif
                    @endif>Admin</option>
                <option value="Accountant"  @if(isset($data->userPosition))
                    @if($data->userPosition=='Accountant') @php echo 'selected'; @endphp @endif
                    @endif>Accountant</option>
                <option value="User" @if(isset($data->userPosition))
                    @if($data->userPosition=='User') @php echo 'selected'; @endphp @endif
                    @endif>User</option>
                          
        </select>
        </div>



        <div class="col-md-12" style="margin-top:12px">
            <input type="hidden" name="id" value="@if(isset($data->id)) {{$data->id}} @endif">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        </form>
        </div>
    <div class="col-md-6" style="border-left:1px solid #ccc">
        <h3 style="font-size:14px">Manage User</h3>
        <hr>
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>Name</th>               
                    <th>Email</th>               
                    <th>User Position</th>               
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
ajax: "{{ route('manageuser') }}",
columns: [
{data: 'name', name: 'name'},
{data: 'email', name: 'email'},
{data: 'userPosition', name: 'userPosition'},
// {data: 'subcategoryName', name: 'subcategoryName'},
{
                data: null,
                render: function (data, type, row)
                    {
 
 
            return '<a href="{{URL::to("user/edituser")}}/'+row.id+'"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;';
 
                    }
                },]
});
}); 

function checkexist(val,inputname)
{
    // alert(val);
    $.ajax({

url:"{{route('checkexist')}}",
                type: 'POST',
                data:{"check":val,"inputname":inputname},
                // dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data==1)
                    {
                        $("#error"+inputname).html("Already exist!Try another one");
                        $("#"+inputname).val("");
                    }
                    else
                    {
                        $("#error"+inputname).html("");
                    }
                    
                   
                },
                 
            });

}
</script>