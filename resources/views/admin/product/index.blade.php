@extends('master')

@section('content')
<div id="about" class="container-fluid carodiv">
                            <div class="row">
                            <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the product photo</div> 
        <div class="panel-body">
        <div class="form-group">
                    <label for="category">Product:</label>
                    <select class="form-control" id="category" name="category">
                     @foreach($prods as $y)
                      <option value="{{$y -> name}}">{{$y -> id}}=>{{$y -> name}}</option>
                      @endforeach
                    </select>
                  </div>
                   <div class="form-group">
                  <label for="foto">product photo:</label>
                  <input type="file" class="form-control" id="name" name="name">
                </div>
    </div></div></div>
                             <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h4>Products pannel</h4>
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
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($product as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> nprice}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table> 
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/product/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/product/delete')}}">
    
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
            <form action="{{ url('/admin/product') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                  <label for="product_name">product Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              <div class="form-group">
                  <label for="nprice">New price:</label>
                <textarea class="form-control" rows="5" id="nprice" name="nprice"></textarea>
                </div>
              <div class="form-group">
                  <label for="oprice">old price:</label>
                <textarea class="form-control" rows="5" id="oprice" name="oprice"></textarea>
                </div>
              <div class="form-group">
                  <label for="details">Details:</label>
                <textarea class="form-control" rows="5" id="details" name="details"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                     @foreach($catnav as $z)
                      <option value="{{$y -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                    </div>
              <div class="form-group">
                  <label for="type1">Type one:</label>
                <textarea class="form-control" rows="5" id="type1" name="type1"></textarea>
                </div>
              <div class="form-group">
                  <label for="type2">Type 2:</label>
                <textarea class="form-control" rows="5" id="type2" name="type2"></textarea>
                </div>
              <div class="form-group">
                  <label for="type3">type 3:</label>
                <textarea class="form-control" rows="5" id="type3" name="type3"></textarea>
                </div>
              <div class="form-group">
                  <label for="type4">type 4:</label>
                <textarea class="form-control" rows="5" id="type4" name="type4"></textarea>
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
            <h4 class="modal-title">View majorcat</h4>
          </div>
          <div class="modal-body">
          <p><b>Product Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>New price : </b><span id="view_nprice" class="text-success"></span></p>
            <p><b>Old price : </b><span id="view_oprice" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_details" class="text-success"></span></p>
            <p><b>Category : </b><span id="view_category" class="text-success"></span></p>
            <p><b>Type one : </b><span id="view_type1" class="text-success"></span></p>
            <p><b>Type two : </b><span id="view_type2" class="text-success"></span></p>
            <p><b>Type three : </b><span id="view_type3" class="text-success"></span></p>
            <p><b>Typte four : </b><span id="view_type4" class="text-success"></span></p>
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
             <form action="{{ url('/admin/product/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                  <label for="edit_product_name">Name:</label>
                  <input type="text" class="form-control" id="edit_name" name="edit_name">
                </div>   
                <div class="form-group">
                <label for="edit_nprice">New Price:</label>
                  <input type="text" class="form-control" id="edit_nprice" name="edit_nprice">
              </div>
                 <div class="form-group">
                  <label for="edit_oprice">Old price:</label>
                  <input type="text" class="form-control" id="edit_oprice" name="edit_oprice">
                </div>   
                <div class="form-group">
                <label for="edit_details">Description:</label>
                <textarea class="form-control" rows="5" id="edit_details" name="edit_details"></textarea>
                
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                      @foreach($catnav as $z)
                      <option value="{{$y -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                    </div>
                <div class="form-group">
                <label for="edit_type1">type one:</label>
                  <input type="text" class="form-control" id="edit_type1" name="edit_type1">
              </div> <div class="form-group"> 
                  <label for="edit_type2">type two:</label>
                  <input type="text" class="form-control" id="edit_type2" name="edit_type2">
                </div>   
                <div class="form-group">
                <label for="edit_type3">Type three:</label>
                  <input type="text" class="form-control" id="edit_type3" name="edit_type3">
              </div>   
                <div class="form-group">
                <label for="edit_type4">Type four:</label>
                  <input type="text" class="form-control" id="edit_type4" name="edit_type4">
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
          $("#view_nprice").text(result.nprice);
          $("#view_oprice").text(result.oprice);
          $("#view_details").text(result.details);
          $("#view_category").text(result.category);
          $("#view_type1").text(result.type1);
          $("#view_type2").text(result.type2);
          $("#view_type3").text(result.type3);
          $("#view_type4").text(result.type4);
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
          $("#edit_nprice").val(result.nprice);
          $("#edit_oprice").val(result.oprice);
          $("#edit_details").val(result.details);
          $("#edit_majorcat").val(result.majorcat);
          $("#edit_category").val(result.category);
          $("#edit_subcategroy").val(result.subcategory);
          $("#edit_type1").val(result.type1);
          $("#edit_type2").val(result.type2);
          $("#edit_type3").val(result.type3);
          $("#edit_type4").val(result.type4);
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
