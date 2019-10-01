<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Blog;
use Gloudemans\Shoppingcart\ShoppingcartServiceProvider;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Collective\Html\HtmlFacade;
use Collective\Html\FormFacade;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        return view('home.index')
		->with('product', Product::take(10)->orderBy('created_at', 'DESC')->get());
    }

   public function getView($id) 
   {
		$product = Product::find($id);
        $interested = Product::get()->random(5);
		return View('home.product')
        ->with('product', $product)
		->with('interested', $interested);
		
	}
  
    public function getCategory($name) {
		return View::make('home.category')
			->with('product', Product::where('category', '=', $name)->paginate(10))
			->with('name',$name);
	}

public function getsearch(){
		$keyword =Input::get('keyword');

		return view::make('home.search')
		->with('product', Product::where('name', 'LIKE', '%'.$keyword.'%')->get())
		->with('keyword', $keyword);

	}

	public function postAddtocart($id) {
		$product = Product::find(Input::get('id'));
		$quantity = Input::get('quantity');

		Cart::insert(array(
			'id'=>$product->id,
			'name'=>$product->title,
			'price'=>$product->price,
			'quantity'=>$quantity,
			'image'=>$product->image
		));

		return Redirect::to('/cart');
	}

	public function getCart() {
		return View::make('home.cart')->with('products', Cart::contents());
	}

	public function getRemoveitem($identifier) {
		$item = Cart::item($identifier);
		$item->remove();
		return Redirect::to('home/cart');
	}

	public function getContact() {
		return View::make('home.contact');
	}

	public function getaboutus() {
		return View::make('home.aboutus');
	}
public function blog()
	{
		return view('home.blog')
		 ->with('blog', Blog::find(3));
	}
	public function blogshow($name)
	{
	    
        $blog = Blog::whereName($name)->firstOrFail();

        return view('home.blog')->withBlog($blog);
	}
	
}