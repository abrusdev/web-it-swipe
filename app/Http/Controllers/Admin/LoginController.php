<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return response()->view('admin.screens.login', [
            'sidebar' => false,
            'navbar' => false
        ]);
    }

    public function store(Request $request): RedirectResponse
    {

        if (Auth::attempt($request->only(['username', 'password']))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors('These credentials do not match our records.');
        }

    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return response()->redirectTo("/");
    }
}
