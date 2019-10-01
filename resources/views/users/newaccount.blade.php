	@extends('master')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')
 <div>
                            <div class="row">
                            <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h3>I have an account</h3></div> 
        <div class="panel-body">
        <section id="signin-form">
         <form action="{{ url('/signin') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
               
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </section><!-- end signin-form -->
    
    </div></div></div>
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">	<h3>Create New Account</h3>

		@if($errors->has())
		<div id="form-errors">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif</div> 
        <div class="panel-body"> <form action="{{ url('/create') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                </div>   <div class="form-group">
                  <label for="lastname">Last name:</label>
                  <input type="text" class="form-control" id="lastname" name="lastname">
                </div>     <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>     <div class="form-group">
                  <label for="country">Country:</label>
                  <input type="text" class="form-control" id="country" name="country">
                </div>      <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>   
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                 <div class="form-group">
                  <label for="password_confirmation">Confirm Password:</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div></div></div>
    </div>

@endsection