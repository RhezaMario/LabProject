<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index(){
        return view('signIn', [
        'title' => 'Sign In',
        'active' => 'Sign In']);
    }
    public function authenticate(Request $request){
        $this->validate($request,[
            'email' => 'required|email:dns',
            'password' => 'required|between:5,20'
        ]);

        if (!auth()->attempt($request->only(['email', 'password']), $request->check)){
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',

            ])->onlyInput('email');
        }
        if(Auth::viaRemember()){
            $request->session()->regenerate();

            return redirect()->intended('/CustomerHome');
        }
        if(auth()->attempt($request->only(['email', 'password']))){
                 $request->session()->regenerate();
                 return redirect()->intended('/CustomerHome');
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
