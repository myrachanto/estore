<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="responsive ecommerce web application templates" />
	<title>responsive ecommerce web application templates</title>
   	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/caro1.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/caro3.css')}}"/>
 	<link rel="stylesheet" type="text/css" href="{{asset('css/calender.css')}}"/>
 	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}"/>  
 	<script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/caro.js')}}"></script>
    <style>
body {
      background-image: url("img/cloth/cloth2.jpg");
      background-repeat: no-repeat;
      font: 400 15px Lato, "Palatino Linotype", "Book Antiqua", Palatino, serif;
      line-height: 1.8;
      background-attachment: fixed;
   /* background: rgba(46, 139, 87, 0.7) /* seaGreen background with 30% opacity */  
    }
  h2 {
      text-transform: uppercase;
      font-weight: 600; 
  }
  h4 {
      font-size: 19px;
      font-weight: 400;
  }  
.navbar {
    margin-top: 40px;
    margin-bottom: 100px;
    background: rgba(255, 160, 122, 0.5);
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 2px;
	border-radius: 2;
    float:left;
    
}
.logo {
      color: black;
      font-size: 500px;
      float: left;

  }
.navbar li a, .navbar .navbar-brand {
    color: black !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #F8F8FF !important;
    background-color: #1e90ff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #2E8B57 !important;
}
.btn {
    margin: 15px 0;
    background-color: #20B2AA;
    color: #2E8B57;
}
.btnab {
    background-color: #1e90ff;
    
}

.btn:hover {
    border: 1px solid #f4511e;
    background-color: #20B2AA !important;
    color: #F8F8FF;
}
.carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #30C;
  }
  .carousel-indicators li {
      border-color: #30C;
  }
  .carousel-indicators li.active {
      background-color: #30C;
  }
.specialh{
    font-family: 'Sofia';
}
.carodiv {
    background: rgba(255, 160, 122, 0.9);
   color:white;
}
.carodiv2 {
    background: rgba(248, 248, 255, 0.9);

}
.carodiv3 {
    background: rgba(220, 220, 220, 0.9)/*gainsboro*/

}
.alterdiv1 {
    background:rgba(255, 255, 240, 0.9);
}
.alterdiv2 {
    background:rgba(248, 248, 255, 0.9);
}
.imgstyle:hover {
    box-shadow: 5px 0px 40px rgba(65, 105, 225, 0.5);
}
input[type=text] {
    
    box-sizing: border-box;
    border: 2px solid #ccc;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 6px 10px 6px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
.nav-bottom {
  width: 100%;
  height: 40px;
  background: green;
  color: black;
  text-align: left;
  position: fixed;
  overflow: hidden;
}
.nav-top {
  width: 100%;
  height: 40px;
  background: #1e90ff;
  color: white;
  text-transform: uppercase;
  text-align: left;
  position: fixed;
  overflow: hidden;
}
.nav-top a { color: white; }
.nav-top a:hover { text-decoration: underline; }
.nav-top div.row { padding: 10px 0; }
.navbar-fixed-top { transition: all 3s ease; }
ul.share-buttons{
  list-style: none;
  padding: 0;
}

ul.share-buttons li{
  display: inline;
}

ul.share-buttons .sr-only {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

ul.share-buttons img{
  width: 32px;
}
.logo {
      color: white;
      float: left !important;

  }
.result{

    font-size: 15px !important;
    color:green;
}
  .strick{
    text-decoration: line-through;
  }
  .price{
    color: blue;
    
}
.syd{
      width: 100%;
  height: 40px;
  background: #1e90ff;
  color: white;
  text-align: left;
}
    </style>
</head>
<div class="nav-top  navbar-fixed-top">
  <div class="container-fluid">
   <div class="row">
     <div class="col-xs-6">
       <a href="#" ><img src="{{asset('img/logo.png')}}" alt="chantosweb" width="30" height="30">RESPONSIVE ECOMMERCE STORE|+254729308456|info@chantosweb.com</a>
     </div>

          <div class="col-xs-6" align="right"><a href="#" >currency</a>|<a href="#" >shipping</a>|<a href="#" >share</a>
    
   </div>
   </div>
 </div>
</div>
<nav class="navbar navbar-fixed-top">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle btnab" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                     
  
      </button></div>
      <a class="navbar-brand" href="#">Chantos store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><img src="{{asset('img/special/email.gif')}}" alt="messages" width="15" height="15">messages<span class="badge">5</span></a></li>
        <li><a href="#"><img src="{{asset('img/special/refresh.gif')}}" alt="norts" width="15" height="15">nortification<span class="badge">7</span></a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{asset('img/special/user.gif')}}" alt="user" width="15" height="15">User
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="#">Profile</a></li>
        <li><a href="#">logout</a></li>
        </ul></li>
        </ul>
        </div>
</nav><br /><br /><br /><br />
<table class="table">
      <tr>
       <td class="col-sm-2 sydmenu">
      <table class="table sydmenu">
      <tr>
      <td><a href="{{url('/admin/dashboard')}}"><div><img src="{{asset('img/comment.png')}}" alt="Dashboard" width="20" height="20">Dashboard</div></a></td></tr><tr>
      <td><a href="{{url('/admin/invent_dashboard')}}"><div><img src="{{asset('img/invent.jpg')}}" alt="inventory" width="20" height="20">Category</div></a></td></tr><tr>
      <td><a href="{{url('/admin/cust_dashboard')}}"><div><img src="{{asset('img/customers.jpg')}}" alt="customers" width="20" height="20">Products</div></a></td></tr><tr>
      <td><a href="{{url('/admin/sup_dashboard')}}"><div><img src="{{asset('img/index.jpg')}}" alt="supplier" width="20" height="20">Blogs</div></a></td></tr><tr>
      <td><a href="{{url('/admin/acc_dashboard')}}"><div><img src="{{asset('img/account.jpg')}}" alt="accounts" width="20" height="20">Accounts</div></a></td></tr><tr>
      <td><a href="{{url('/admin/admin_dashboard')}}"><div><img src="{{asset('img/repor.jpg')}}" alt="administration" width="20" height="20">Administration</div></a></td></tr><tr>
      <td><a href="{{url('/admin/report_dashboard')}}"><div><img src="{{asset('img/report.jpg')}}" alt="reports" width="20" height="20">Reports</div></a></td>
      </tr>
      </table></td>
      <td class="col-sm-10">
   @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif
</div>
	@yield('content')
    </td></tr></table>
<div class="nav-bottom  navbar-fixed-bottom"> 
            <div class="row">
              <div class="col-lg-12" align="left">
  <h5>@myrachanto|<a href="http://www.chantosweb.com">Chantosweb Developers</a>| Chantos Hotel E commerce System</h5>
           </div></div></div>
           
</body>
</html>