@extends('master')

@section('content')

<div id="about" class="container-fluid carodiv">
                            <div class="row">   <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the product photo</div> 
        <div class="panel-body">
        <div class="form-group">
                    <label for="category">Blog:</label>
                    <select class="form-control" id="category" name="category">
                     @foreach($blognav as $y)
                      <option value="{{$y -> name}}">{{$y -> title}}</option>
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
     <div class="panel-heading">
					  <h4>Products pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></div> 
        <div class="panel-body">			 
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($blog as $x)
        <tr>
          <td>{{$x -> name}}</td>
          <td>{{$x -> title}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
			  <button class="btn btn-default" onclick="#">edit fotos (soon)</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/blog/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/blog/delete')}}">
    
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
            <form action="{{ url('/blog') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                      <div class="form-group">
                    <label for="language">language:</label>
                    <select class="form-control" id="language" name="language">
                      <option value="english">English</option>
                      <option value="espanol">Espanol</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="blog_title">Blog title:</label>
                  <input type="text" class="form-control" id="blog_title" name="blog_title">
                </div>
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              <div class="form-group">
                    <label for="category">category:</label>
                    <select class="form-control" id="category" name="category">
                      <option value="inspirational">inspirational</option>
                      <option value="web development">web development</option>
                    </select>
                  </div>

                <div class="form-group">
                <label for="title">Tilte:</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
                <div class="form-group">
                <label for="meta">Meta:</label>
                <input type="text" class="form-control" id="meta" name="meta">
              </div>
              
                 <div class="form-group">
                <label for="header1">header one:</label>
                <textarea class="form-control" rows="5" id="header1" name="header1"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="header2">header two:</label>
                <textarea class="form-control" rows="5" id="header2" name="header2"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="header1">header three:</label>
                <textarea class="form-control" rows="5" id="header3" name="header3"></textarea>
                </div>
              
                 <div class="form-group">
                <label for="comment1">Comment one:</label>
                <textarea class="form-control" rows="5" id="comment1" name="comment1"></textarea>
                </div>
                   <div class="form-group">
                <label for="comment2">Comment two:</label>
                <textarea class="form-control" rows="5" id="comment2" name="comment2"></textarea>
                </div> 
                <div class="form-group">
                <label for="comment3">Comment three:</label>
                <textarea class="form-control" rows="5" id="comment3" name="comment3"></textarea>
                </div>          
                 <div class="form-group">
                <label for="comment4">Comment four:</label>
                <textarea class="form-control" rows="5" id="comment4" name="comment4"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="summary">summary:</label>
                <textarea class="form-control" rows="5" id="summary" name="summary"></textarea>
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
            <h4 class="modal-title">View Blog</h4>
          </div>
          <div class="modal-body">
            <p><b>language : </b><span id="view_language" class="text-success"></span></p>
            <p><b> Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>category : </b><span id="view_category" class="text-success"></span></p>
            <p><b>title : </b><span id="view_title" class="text-success"></span></p>
            <p><b>meta : </b><span id="view_meta" class="text-success"></span></p>
            <p><b>header1 : </b><span id="view_header1" class="text-success"></span></p>
            <p><b>header2 : </b><span id="view_header2" class="text-success"></span></p>
            <p><b>header3 : </b><span id="view_header3" class="text-success"></span></p>
            <p><b>comment1 : </b><span id="view_comment1" class="text-success"></span></p>
            <p><b>comment2 : </b><span id="view_comment2" class="text-success"></span></p>
            <p><b>comment3 : </b><span id="view_comment3" class="text-success"></span></p>
            <p><b>comment4 : </b><span id="view_comment4" class="text-success"></span></p>
            <p><b>summary : </b><span id="view_summary" class="text-success"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"></button>
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
            <form action="{{ url('/blog/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <div class="form-group">
                <div class="form-group">
                    <label for="edit_language">language:</label>
                    <select class="form-control" id="edit_language" name="edit_language">
                      <option value="english">English</option>
                      <option value="espanol">Espanol</option>
                    </select>
                  </div>
                  
                <div class="form-group">
                  <label for="edit_blog_title">Blog Title:</label>
                  <input type="text" class="form-control" id="edit_blog_title" name="edit_blog_title">
                </div> 
                <div class="form-group">
                  <label for="edit_name">Name:</label>
                  <input type="text" class="form-control" id="edit_name" name="edit_name">
                </div>      

              <div class="form-group">
                    <label for="edit_category">category:</label>
                    <select class="form-control" id="edit_category" name="edit_category">
                      <option value="inspirational">inspirational</option>
                      <option value="web development">web development</option>
                    </select>
                  </div>
                <div class="form-group">
                <label for="edit_title">Tilte:</label>
                <input type="text" class="form-control" id="edit_title" name="edit_title">
              </div>
                <div class="form-group">
                <label for="edit_meta">Meta:</label>
                <input type="text" class="form-control" id="edit_meta" name="edit_meta">
              </div>

                 <div class="form-group">
                <label for="edit_header1">header one:</label>
                <textarea class="form-control" rows="5" id="edit_header1" name="edit_header1"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="edit_header2">header two:</label>
                <textarea class="form-control" rows="5" id="edit_header2" name="edit_header2"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="header1">header three:</label>
                <textarea class="form-control" rows="5" id="edit_header3" name="edit_header3"></textarea>
                </div>
              
                 <div class="form-group">
                <label for="edit_comment1">Comment one:</label>
                <textarea class="form-control" rows="5" id="edit_comment1" name="edit_comment1"></textarea>
                </div>
                   <div class="form-group">
                <label for="edit_comment2">Comment two:</label>
                <textarea class="form-control" rows="5" id="edit_comment2" name="edit_comment2"></textarea>
                </div> 
                <div class="form-group">
                <label for="edit_comment3">Comment three:</label>
                <textarea class="form-control" rows="5" id="edit_comment3" name="edit_comment3"></textarea>
                </div>          
                 <div class="form-group">
                <label for="edit_comment4">Comment four:</label>
                <textarea class="form-control" rows="5" id="edit_comment4" name="edit_comment4"></textarea>
                </div>
                
                 <div class="form-group">
                <label for="edit_summary">summary:</label>
                <textarea class="form-control" rows="5" id="edit_summary" name="edit_summary"></textarea>
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
	
</div></div>
    </div></div></div></div>
		
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
          $("#view_language").text(result.language);
          $("#view_blog_title").text(result.blog_title);
          $("#view_name").text(result.name);
          $("#view_category").text(result.category);
          $("#view_title").text(result.title);
          $("#view_meta").text(result.meta);
          $("#view_header1").text(result.header1);
          $("#view_header2").text(result.header2);
          $("#view_header3").text(result.header3);
          $("#view_comment1").text(result.comment1);
          $("#view_comment2").text(result.comment2);
          $("#view_comment3").text(result.comment3);
          $("#view_comment4").text(result.comment4);
          $("#view_summary").text(result.summary);
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
          $("#edit_language").val(result.language);
          $("#edit_blog_title").val(result.blog_title);
          $("#edit_name").val(result.name);
          $("#edit_category").val(result.category);
          $("#edit_title").val(result.title);
          $("#edit_meta").val(result.meta);
          $("#edit_header1").val(result.header1);
          $("#edit_header2").val(result.header2);
          $("#edit_header3").val(result.header3);
          $("#edit_comment1").val(result.comment1);
          $("#edit_comment2").val(result.comment2);
          $("#edit_comment3").val(result.comment3);
          $("#edit_comment4").val(result.comment4);
          $("#edit_summary").val(result.summary);
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
