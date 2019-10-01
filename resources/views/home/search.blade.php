@extends('master')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')
<br /><br />
	<hr>
    
<div class="container-fluid text-center alterdiv2">    
  
        <h3>Search Results for <strong><i>"{{ $keyword }}"</i></strong></h3><br>
  @foreach($product as $x)
  <div class="item1 " id="item">
            <div class="col-xs-12 col-sm-6 col-md-2 boxi">
<a href="{{ url('/product') }}{{$x->id}}"><img src="{{asset($x->image)}}" class="imgstyle" width="150" height="200" alt="{{$x->name}}" /></a>                     <p>{{$x->name}}</p>
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
           
</div>
<br />
<div  class="container-fluid text-center alterdiv2">
  <h1  class="specialh">Blogs</h1><br>
  </div>
<div class="container-fluid text-center carodiv2">
     <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/wedding.jpg')}}" class="imgstyle" width="150" height="200" alt="chantosweb developers websites" />
        <p><strong>Wedding dresses</strong></p>
        <p>As far as e commerce is concerned seo, efficiency, effectiveness are the keys to successful online business venture. Thus our <a href="#">Read more</a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/plus.jpg')}}" class="imgstyle" width="150" height="200" alt="chantosweb developers blogs" />
        <p><strong>"The Plus"</strong></p>
        <p>Our websites are built to bring control to our clients even with little or no programming skills. One, with the use <a href="#">Read more</a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/no4.jpg')}}" class="imgstyle" width="150" height="200" alt="chantosweb developers web applications" />
        <p><strong>The beauty</strong></p>
        <p>Our e commerce sites examples include catering websites, online shopping website with a cart, <a href="#">Read more</a></p>
      </div>
    </div>
    </div>
@endsection