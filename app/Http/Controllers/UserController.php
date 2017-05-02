<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $loginPath = 'admin/login'; // <--- note this

    //
    public function create()
    {
        if (Auth::check()) {
            return redirect()->intended(route('community_index'));
        }

        return view('user.admin_login');
    }

    public function store(AdminLoginPost $request)
    {
        $credential_email = array(
            'email'    => $request->email,
            'password' => $request->password,
        );
        $credential_name = array(
            'name'    => $request->email,
            'password' => $request->password,
        );

        if ($this->checkAuth($credential_email, $credential_name, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
//            return redirect()->intended(route('community_index'));
        } else {
            session()->flash('danger', '很抱歉，您的账号和密码不匹配');
            return redirect()->back();
        }
    }

    protected function checkAuth($credential_email, $credential_name, $hasRemember)
    {
        return Auth::attempt($credential_email, $hasRemember) || Auth::attempt($credential_name, $hasRemember);
    }
}
