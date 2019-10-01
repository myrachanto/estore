<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Blog;
use App\Product;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
      public function __construct(){
            $this->beforeFilter('csrf', array('on'=>'post'));
		view::share('catnav', Category::all());
		view::share('prods', Product::all());
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $product = Product::all();
            return view('/admin/product/index')->with('product',$product);
	    }

   /*
		** Add student data
		*/
	public function add(Request $request)
	{
        $product = new Product;
        $product->name = $request->name;
        $product->nprice = $request->nprice;
        $product->oprice = $request->oprice;
        $product->details = $request->details;
        $product->category = $request->category;
        $product->type1 = $request->type1;
        $product->type2 = $request->type2;
        $product->type3 = $request->type3;
        $product->type4 = $request->type4;
		$product -> save();
		return back()
				->with('success','Record Added successfully.');
	    }
		/*
		* View data
		*/
	public function view(Request $request)
	{
		if($request->ajax()){
			$id = $request->id;
			$info = Product::find($id);
			//echo json_decode($info);
			return response()->json($info);
		}
	}
	/*
	*   Update data
	*/
	public function update(Request $request)
	{
		$id = $request -> edit_id;
        $product = Product::find($id);
        $product->name = $request->edit_name;
        $product->nprice = $request->edit_nprice;
        $product->oprice = $request->edit_oprice;
        $product->details = $request->edit_details;
        $product->category = $request->edit_category;
        $product->type1 = $request->edit_type1;
        $product->type2 = $request->edit_type2;
        $product->type3 = $request->edit_type3;
        $product->type4 = $request->edit_type4;
        $product->save();
		return back()
				->with('success','Record Updated successfully.');
	}

	/**
	 * Remove/Delete the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(Request $request)
	{
		$id = $request -> id;
		$product = Product::find($id);
		$response = $product -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	/* Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    

	
}
