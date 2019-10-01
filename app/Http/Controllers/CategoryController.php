<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Blog;
use App\Product;
use \Input as Input;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
      public function __construct(){
            $this->beforeFilter('csrf', array('on'=>'post'));
		view::share('catnav', Category::all());
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
        }
        /*
         * Display all data
         */
	    public function index()
	    {
            $category = Category::all();
            return view('/admin/category/index')->with('category',$category);
	    }
	/*	public function upload(){

       		$category = new Category;
			$category->name = Input::get('name');
			$category->file = Input::get('file');
			if($category->file){
				$category ->move('img/categoryfotos', $category->file);
				echo '<img src="img/categoryfotos/.$category->file" class="img-responsive" alt="$category->file"';
				}
			}
			/*
		** Add student data
		*/
	public function add(Request $request)
	{
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        //$category->majorcat = $request->majorcat;
		$category -> save();
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
			$info = Category::find($id);
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
        $category = Category::find($id);
        $category->name = $request->edit_name;
        $category->description = $request->edit_description;
        $category->majorcat = $request->edit_majorcat;
        $category->save();
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
		$category = Category::find($id);
		$response = $category -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	
}
