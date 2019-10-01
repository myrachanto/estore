@extends('master')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')
<br /><br />
<div id="about" class="container-fluid carodiv">

    <div class="col-sm-3"><br />
       <img src="{{asset($product->image)}}" class="img-responsive img-thumbnail imgstyle" alt="{{ $product->name }}" /> 
    </div>
    <div class="col-sm-9">
    <div id="product-info">
        <h2 class="Name">Name: {{ $product->name }}</h2>
        <h3 class="Details">Description: {{ $product->details }}</h3>
        
        <h3 class="types">Types Available: </h3>
        <div class="types">
         <div class="col-xs-12 col-sm-6 col-md-2 boxi">
       <p><strong>{{ $product->type1 }}</strong></p>
        <img src="{{asset('img/cloth/'.$product->id.'/no1.jpg')}}" class="imgstyle" width="100" height="150" alt="{{ $product->type1 }}" />
       
      </div>
    <div class="col-xs-12 col-sm-6 col-md-2 boxi">
       <p><strong>{{ $product->type2 }}</strong></p>
        <img src="{{asset('img/cloth/'.$product->id.'/no2.jpg')}}" class="imgstyle" width="100" height="150" alt="{{ $product->type2 }}" />
       
      </div>
    <div class="col-xs-12 col-sm-6 col-md-2 boxi">
       <p><strong>{{ $product->type3 }}</strong></p>
        <img src="{{asset('img/cloth/'.$product->id.'/no3.jpg')}}" class="imgstyle" width="100" height="150" alt="{{ $product->type3 }}" />
       
    </div> <div class="col-xs-12 col-sm-6 col-md-2 boxi">
       <p><strong>{{ $product->type4 }}</strong></p>
        <img src="{{asset('img/cloth/'.$product->id.'/no4.jpg')}}" class="imgstyle" width="100" height="150" alt="{{ $product->type4 }}" />
       
    </div>
         </div>
    </div><!-- end product-info -->
<div class="col-sm-9">
        <form action="{{ url('/addtocart') }}/{{ $product->id }}" method="post">
           {!! csrf_field() !!}
            <div class="form-group">
                  <label for="Type">Type:</label>
                 <select class="form-control" id="type" name="type">
                      <option value="{{ $product->type1 }}">{{ $product->type1 }}</option>
                      <option value="{{ $product->type2 }}">{{ $product->type2 }}</option>
                      <option value="{{ $product->type3 }}">{{ $product->type3 }}</option>
                      <option value="{{ $product->type4 }}">{{ $product->type4 }}</option>
                    </select></div>
            <div class="form-group">
                  <label for="Quantity">Quantity:</label>
                  <select class="form-control" id="type" name="type">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="other">other</option>
                    </select></div>
            
             <table><tr><td>  <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->nprice }}">
                    <button type="submit"><span class="label label-success"><img src="{{asset('img/cloth/cart.png')}}" alt="add to cart" width="20" height="20" /></span> </button>
                </form></form> </td><td>
                    <button type="submit"><a href="{{ url('/product') }}/{{ $product->id }}"><span class="label label-primary"><img src="{{asset('img/cloth/eye.png')}}" alt="veiw product" width="20" height="20" /></span></a>
                   </button></td><td>
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                    <input type="hidden" name="price" value="{{ $product->nprice }}">
<button type="submit"><span class="label label-info"><img src="{{asset('img/cloth/heart.png')}}" alt="wish list" width="20" height="20" /></span></a>
                </button></form></td></tr></table>     
    </div></div>
  
</div>

<div  class="container-fluid text-center alterdiv2">
 
        <div class="row">
            <h3>You may also like...</h3>

            @foreach ($interested as $x)
               <div class="item1 " id="item">
            <div class="col-xs-12 col-sm-6 col-md-2 boxi">
<a href="{{ url('/product') }}{{$x->id}}"><img src="{{asset($x->image)}}" class="imgstyle" width="150" height="200" alt="{{$x->name}}" /></a> <p>{{$x->name}}</p>
       <h4>New Price <span class="price">${{$x->nprice}}/=</span><span class="label label-danger">{{$x->oprice-$x->nprice}}/= off</span></h4>
       <h5 class="strick">Old Price <span class="price">${{$x->oprice}}/=</span></h5>
         <div align="center">         <table><tr><td>
                    <a href="{{ url('/product') }}/{{ $x->id }}"><button type="button" class="btn btn-default"><span class="label label-primary"><img src="{{asset('img/cloth/eye.png')}}" alt="veiw product" width="20" height="20" /></span>
                   </button></a></td><td> <form action="{{ url('/addtocart') }}/{{ $x->id }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $x->id }}">
                    <input type="hidden" name="name" value="{{ $x->name }}">
                    <input type="hidden" name="price" value="{{ $x->nprice }}">
                    <button type="submit"><span class="label label-success"><img src="{{asset('img/cloth/cart.png')}}" alt="add to cart" width="20" height="20" /></span> </button>
                </form></td><td>
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $x->id }}">
                    <input type="hidden" name="name" value="{{ $x->name }}">
                    <input type="hidden" name="price" value="{{ $x->nprice }}">
<button type="submit"><span class="label label-info"><img src="{{asset('img/cloth/heart.png')}}" alt="wish list" width="20" height="20" /></span></a>
                </button></form></td></tr></table>
          </div>
          
            </div>
          </div>
            @endforeach

        </div> <!-- end row -->

    </div>
@endsection