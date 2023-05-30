<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showSignup(Request $request)
    {
        return Inertia::render('Auth/Signup', []);
    }

    public function showLogin(Request $request)
    {
        return Inertia::render('Auth/Login', []);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->admin == 1) {
                return redirect('/cms/panel');
            } else {
                return redirect('/');
            }
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function signup(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password-confirmation' => 'required:min:6',
        ]);

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->admin = 0;
        $user->save();
        Auth::attempt($request->only('email', 'password'));

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }

    public function authStatus(Request $request)
    {
        return response()->json(Auth::check());
    }
}
