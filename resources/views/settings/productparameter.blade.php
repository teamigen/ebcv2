@include('layout.head')
@include('layout.notify')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />  
<section class="ebc-orders">
  <div class="container">
    <div class="row col-md-12">
    <div class="col-md-6">
        <h3 style="font-size:14px">Create New Parameter</h3>
        <hr>
         <form id="form1" method="post" action="{{route('saveparameter')}}">
         @csrf
        <div class="col-md-12">
            <label for="field1">Parameter Name</label>
            <input type="text" class="form-control" id="parameterName" name="parameterName" required>
        </div>
        <div class="col-md-12">
            <label for="field2">Values</label>
            <input type="number" class="form-control" id="paramValues" name="paramValues" required>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary"  type="submit">Submit</button>
        </div>
        
        </form>
        </div>
    <div class="col-md-6" style="border-left:1px solid #ccc">
        <h3 style="font-size:14px">Manage Parameter</h3>
        <hr>
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Values</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>length</td>
                    <td>l</td>
                    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <i class="fa fa-trash-o" aria-hidden="true"></i>

                    </td>
                </tr>
                <tr>
                    <td>length</td>
                    <td>l</td>
                    <td><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <i class="fa fa-trash-o" aria-hidden="true"></i>

                    </td>
                </tr>
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
$(document).ready(function ()  
{  
    $('#datatable').dataTable(  
    {});  
});  
        </script> 