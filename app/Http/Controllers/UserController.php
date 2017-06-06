<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function signupView(){
		return view('signup');	
	}
	
	public function signup(Request $request)
	{
		
	    $this->validate($request, [
	    	'user_name' => 'required|max:255|unique:users',
	        'email' => 'required|unique:users',
	        'password' => 'required|min:4',
	    ]);

		$user = new User();
		$user->user_name = $request['user_name'];
		$user->email = $request['email'];
		$user->password = bcrypt($request['password']);

		$user->save();
		Auth::login($user);
		// return redirect()->route('dashboard');
		return redirect()->back();
	}

	public function get_user()
	{
		$user = User::orderBy('created_at', 'asc')->get();
		return view('admin.admin-users', [
	        'user' => $user
	    ]);
	}

	public function delete_user($id)
	{
		User::findOrFail($id)->delete();
	    return redirect()->back();
	}

	public function index(){
		return view('login');
	}

	public function login(Request $request){
		$this->validate($request, [
	        'email' => 'required',
	        'password' => 'required',
	    ]);

		if (Auth::attempt([
				'email' => $request['email'],
				'password' => $request['password']
			]))
		{
			return view('admin.dashboard');
		}
	}
}