<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $loginPath = 'admin/login'; // <--- note this

    //
    public function create()
    {
        return view('user.admin_login');
    }
}
