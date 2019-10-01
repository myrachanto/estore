<?php namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
	use App\Category;
	use App\Blog;
	use App\Product;
	use Illuminate\Support\Facades\View;
	use Intervention\Image\Facades\Image;
    use Illuminate\Validation\ValidationServiceProvider;
    class BlogsController extends Controller
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
            $blog = Blog::all();
            return view('admin.blogs.index')->with('blog',$blog);
	    }

   /*
		* Add student data
		*/
	public function add(Request $request)
	{
        $blog = new Blog;
        $blog->language = $request->language;
        $blog->blog_title = $request->blog_title;
        $blog->name = $request->name;
        $blog->category = $request->category;
        $blog->title = $request->title;
        $blog->meta = $request->meta;
        $blog->header1 = $request->header1;
        $blog->header2 = $request->header2;
        $blog->header3 = $request->header3;
        $blog->comment1 = $request->comment1;
        $blog->comment2 = $request->comment2;
        $blog->comment3 = $request->comment3;
        $blog->comment4 = $request->comment4;
        $blog->summary = $request->summary;
		$blog -> save();
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
			$info = Blog::find($id);
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
        $blog = Blog::find($id);
        $blog->language = $request->edit_language;
        $blog->blog_title = $request->edit_blog_title;
        $blog->name = $request->edit_name;
        $blog->category = $request->edit_category;
        $blog->title = $request->edit_title;
        $blog->meta = $request->edit_meta;
        $blog->header1 = $request->edit_header1;
        $blog->header2 = $request->edit_header2;
        $blog->header3 = $request->edit_header3;
        $blog->comment1 = $request->edit_comment1;
        $blog->comment2 = $request->edit_comment2;
        $blog->comment3 = $request->edit_comment3;
        $blog->comment4 = $request->edit_comment4;
        $blog->summary = $request->edit_summary;
        $blog->save();
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
		$blog = Blog::find($id);
		$response = $blog -> delete();
		if($response)
			echo "Record Deleted successfully.";
		else
			echo "There was a problem. Please try again later.";
	}
	

}
