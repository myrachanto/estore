<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'WelcomeController@index');
Route::get('/majorcategory/{name}', 'WelcomeController@getMajorcat');
Route::get('/category/{name}', 'WelcomeController@getCategory');
Route::get('/subcategory/{name}', 'WelcomeController@getSubcategory');
Route::get('/search', 'WelcomeController@getSearch');
Route::get('/remove{identifier}', 'WelcomeController@getRemoveitem');
Route::get('/contact', 'WelcomeController@getContact');
Route::get('/aboutus', 'WelcomeController@getaboutus');
Route::get('/product/{id}', 'WelcomeController@getView');
Route::get('/product/{category}', 'ProductsController@shows');
Route::get('/blog/Why-your-catering-business-requires-a-website', 'WelcomeController@blog');
Route::get('/blog/{name}', 'WelcomeController@blogshow');
//cart controller//////////////////////////////////////////
Route::get('/cart', 'CartController@showcart'); 
Route::post('/addtocart/{id}', 'CartController@store');
Route::post('/update/{id}', 'CartController@update');
Route::post('/remove/{id}', 'CartController@remove');
Route::post('/emptyCart', 'CartController@emptyCart');
Route::post('/switchToWishlist/{id}', 'CartController@switchToWishlist');
//wishlist controller//////////////////////////////////////////
Route::get('/wishlist', 'WishlistController@index');
Route::post('/addtowishlist/{id}', 'WishlistController@store');
Route::post('/update', 'WishlistController@update');
Route::get('/Remove/{id}', 'WishlistController@Remove');
Route::get('/emptyWishlist', 'WishlistController@emptyWishlist');
Route::get('/switchToCart/{id}', 'WishlistController@switchToCart');


////////////Category///////////////////////////////////////
Route::get('/admin/category','CategoryController@index');
Route::post('/admin/category', 'CategoryController@add');
Route::get('/admin/category/view', 'CategoryController@view');
Route::post('/admin/category/update', 'CategoryController@update');
Route::post('/admin/category/delete', 'CategoryController@delete');
Route::get('/admin/category/upload','CategoryController@upload');
////////////product///////////////////////////////////////
Route::get('/admin/product','ProductsController@index');
Route::post('/admin/product', 'ProductsController@add');
Route::get('/admin/product/view', 'ProductsController@view');
Route::post('/admin/product/update', 'ProductsController@update');
Route::post('/admin/product/delete', 'ProductsController@delete');
////////////Blog///////////////////////////////////////
Route::get('/admin/blog','BlogsController@index');
Route::post('/admin/blog', 'BlogsController@add');
Route::get('/admin/blog/view', 'BlogsController@view');
Route::post('/admin/blog/update', 'BlogsController@update');
Route::post('/admin/blog/delete', 'BlogsController@delete');
////////////User controllers///////////////////////////////////////
Route::get('/signin','UsersController@getNewaccount');
Route::post('/create','UsersController@postCreate');
Route::post('/signin','UsersController@postSignin');
Route::get('/signout','UsersController@getSignout');
/*
Route::get('/blogs', [
    'middleware' => 'auth',
    'uses' => 'BlogsController@index']);
Route::post('/blogs', [
    'middleware' => 'auth',
    'uses' => 'BlogsController@add']);
Route::get('/blogs/view', [
    'middleware' => 'auth',
    'uses' => 'BlogsController@view']);
Route::post('/blogs/update', [
    'middleware' => 'auth',
    'uses' => 'BlogsController@update']);
Route::post('/blogs/delete', [
    'middleware' => 'auth',
    'uses' => 'BlogsController@delete']);