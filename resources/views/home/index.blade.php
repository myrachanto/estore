@extends('master')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')
  <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" 
  data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="{{asset('img/cloth/cloth1.jpg')}}" alt="doctors appointment reservation website with an E.R.P" class="slide-image">
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">Make your dream a reality</h1>
                                <p data-animation="animated fadeInLeft">Unleash your beauty for the world to drool over.</p>
                                <a href="#"  class="btn btn-default" data-animation="animated fadeInLeft">why us</a>
                                <a href="#"  class="btn btn-primary" data-animation="animated fadeInRight">contact us</a>
                                <h4 data-animation="animated zoomInRight">to navigate the admin area use the following</h4>
                                <p data-animation="animated fadeInLeft">Email: info@chantosweb.com.</p>
                                <p data-animation="animated fadeInLeft">Password : 12345.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{asset('img/cloth/cloth2.jpg')}}" alt="catering"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">Make you wedding a wedding to dream over</h1>
                        <p data-animation="animated lightSpeedIn">besides one can only marry once for he/she to be luckiiest in love.</p>
                        <a href="#" class="btn btn-default" data-animation="animated fadeInUp">get your dream dress</a>
                        <a href="#" class="btn btn-primary" data-animation="animated fadeInDown">shop now</a>
                                <h4 data-animation="animated zoomInRight">to navigate the admin area use the following</h4>
                                <p data-animation="animated fadeInLeft">Email: info@chantosweb.com.</p>
                                <p data-animation="animated fadeInLeft">Password : 12345.</p>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{asset('img/cloth/cloth3.jpg')}}" alt="make solid memories"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInLeft">Ware in style</h1>
                        <p data-animation="animated fadeInRight">Leave a mark in fashion you ware </p>
                        <a href="#" class="btn btn-default" data-animation="animated fadeInLeft">Leave a mark</a>
                        <a href="#" class="btn btn-primary" data-animation="animated fadeInRight">Shop Now</a>
                                <h4 data-animation="animated zoomInRight">to navigate the admin area use the following</h4>
                                <p data-animation="animated fadeInLeft">Email: info@chantosweb.com.</p>
                                <p data-animation="animated fadeInLeft">Password : 12345.</p>

                    </div>
                </div>
                <!-- End of Slide -->

                <!-- End of Slide -->

            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->

<div id="about" class="container-fluid carodiv">
    <div class="col-sm-8">
      <h1 class="specialh">Why us</h1><br>
      <h3>We provide the best responsive e commerce website solutions to our clients.</h3><br>
      <p>
Chantosweb developers is a firm that offers solution to web development needs that has arose from the alarming growth rate of e commerce websites. Our websites range from simple sites to sophisticated web application such as E.R.Ps. Our e commerce sites examples are hosted in our sub domains to provide testing grounds to evaluate their proficiency.<br /> We have embraced the latest technology to bring forth responsive, efficient, effective, best e commerce websites on the globe. Our work can be best described as an art in the world of artisans.</p>

    </div>
    <div class="col-sm-4 "><br />
      <img src="{{asset('img/no3.jpg')}}" class="img-responsive img-circle imgstyle" alt="chantosweb developers" />
    </div>
  
</div>

<div class="container-fluid text-center alterdiv2">    
  <h3  class="specialh">What we offer</h3><br>
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
</div>
<div  class="container-fluid text-center alterdiv2">
  <h1  class="specialh">Blogs</h1><br>
  </div>
<div class="container-fluid text-center carodiv2">
     <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/wedding.jpg')}}" class="img-responsive img-thumbnail imgstyle" alt="chantosweb developers websites" />
        <p><strong>Wedding dresses</strong></p>
        <p>As far as e commerce is concerned seo, efficiency, effectiveness are the keys to successful online business venture. Thus our <a href="#">Read more</a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/plus.jpg')}}" class="img-responsive img-thumbnail imgstyle" alt="chantosweb developers blogs" />
        <p><strong>"The Plus"</strong></p>
        <p>Our websites are built to bring control to our clients even with little or no programming skills. One, with the use <a href="#">Read more</a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="{{asset('img/no4.jpg')}}" class="img-responsive img-thumbnail imgstyle" alt="chantosweb developers web applications" />
        <p><strong>The beauty</strong></p>
        <p>Our e commerce sites examples include catering websites, online shopping website with a cart, <a href="#">Read more</a></p>
      </div>
    </div>
    </div>
@endsection