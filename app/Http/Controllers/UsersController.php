<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    
	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		view::share('catnav', Category::all());
		view::share('blognav', Blog::take(10)->orderBy('created_at', 'DESC')->get());
	} 

	public function getNewaccount() {
		return View::make('users.newaccount');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->fname = Input::get('firstname');
			$user->lname = Input::get('lastname');
			$user->username = Input::get('username');
			$user->country = Input::get('country');
			$user->phone = Input::get('phone');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('/signin')
				->with('message', 'Thank you for creating a new account. Please sign in.');
		}

		return Redirect::to('/signin')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}

	

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('/cart')->with('message', 'Thanks for signing in');
		}

		return Redirect::to('/signin')->with('message', 'Your email/password combo was incorrect');
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('/signin')->with('message', 'You have been signed out');
	}
}