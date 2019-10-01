<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Blog;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


abstract class Controller extends BaseController
{
  //  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//}
public function __construct(){
	$this->beforeFilter(function(){
		view::share('catnav', Category::all());
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
        //$interested = Product::get()->random(4);
	});
}

protected function setuplayout(){

	if ( ! is_null($this->layout)){
		$this->layout = view::make($this->layout);
	}
}
}