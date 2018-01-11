<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

	public function __construct()
	{

	}

    public function index()
    {
    	$list = User::all();

        return view('admin.user',[
            'lists' => $list,
        ]);
    }

    public function insert()
    {
        return view('admin.insert');   
    }

    public function add(StoreUserPost $request)
    {
        $users = User::create([   
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('user');
    }

    public function logins(Request $request)
    {
         $name = $request->input('email');
         var_dump($name);
    }

}
