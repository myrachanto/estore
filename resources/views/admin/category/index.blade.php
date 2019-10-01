@extends('master')

@section('content')

<div id="about" class="container-fluid carodiv">
                            <div class="row">
                           <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the product photo</div> 
        <div class="panel-body">
        <form action="#" method="get" entype="multipart/form-data">
        <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                     @foreach($catnav as $y)
                      <option value="{{$y -> name}}">{{$y -> name}}</option>
                      @endforeach
                    </select>
                  </div>
                   <div class="form-group">
                  <label for="foto">product photo:</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <input type="submit" value="Upload" name="submit">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
    </div></div></div>
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Category pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></div> 
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($category as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> description}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/category/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/category/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new product</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/category') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                  <label for="name">Category Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              <div class="form-group">
                     <div class="form-group">
                  <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
               
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->
 
 <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View Category</h4>
          </div>
          <div class="modal-body">
            <p><b>Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>Majorcat : </b><span id="view_majorcat" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
      </div>
    </div>
    <!-- view modal ends -->
 
    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/category/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <div class="form-group">
                  <label for="edit_name">Name:</label>
                  <input type="text" class="form-control" id="edit_name" name="edit_name">
                </div>   
                <div class="form-group">
                <label for="edit_description">Description:</label>
                <textarea class="form-control" rows="5" id="edit_description" name="edit_description"></textarea>
              </div>
                
               <input type="hidden" id="edit_id" name="edit_id">
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          
        
        
      </div>
    </div>
    <!-- Edit code ends -->
 
    </div>
	
    </div>
</div>
    </div></div></div>
    </div>
   
<script type="text/javascript">


function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#view_name").text(result.name);
          $("#view_majorcat").text(result.majorcat);
          $("#view_description").text(result.description);
        }
      });
    }
 
    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_name").val(result.name);
          $("#edit_description").val(result.description);
          $("#edit_id").val(result.id);
        }
      });
    }
 
    function fun_delete(id)
    {
      var conf = confirm("Are you sure want to delete???");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST",           
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }
</script>
@endsection
