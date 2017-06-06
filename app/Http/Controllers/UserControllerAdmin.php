<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserControllerAdmin extends Controller
{
	public function getUser(Request $request)
	{
		$user = User::orderBy('created_at', 'asc')->get();
		return view('admin.admin-users', [
	        'user' => $user
	    ]);
	}
}