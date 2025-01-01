<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginUserRequest $request)
    {
        $credentials = $request->only(['phone', 'password']);

        if(!Auth::attempt($credentials)) {
            return redirect()->back()->with('error', 'Credential Error!');
        }

        return redirect()->route('admin-users.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
