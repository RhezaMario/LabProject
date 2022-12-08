<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $profile = Auth::user();

        return view('ViewProfile', ['profile' => $profile]);
    }
    public function updateprofiles(){
        $profile = Auth::user();
        return view('UpdateProfile', ['profile' =>$profile]);
    }
    public function updateprofile(Request $request){
         $request->validate([
            'name' => 'required|between:5,20|unique:users',
            'email' => 'required|email:dns|unique:users',
            'phone' => 'required|between:10,13',
            'address' => 'required|min:3'
        ]);
        $user = User::find(Auth::id());
        $user->update([
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address'=>$request->address
        ]);
        return back()->with('message', 'Successfully updated');
    }
    public function updatepasswords(){
        $profile = Auth::user();
        return view('UpdatePassword', ['profile' =>$profile]);
    }
    public function updatepassword(Request $request){
        $request->validate([
            'old_password' => 'required|between:5,20',
            'new_password' => 'required|between:5,20'
        ]);

        if(Hash::check($request->old_password, auth()->user()->password)){
           User::findOrFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->new_password)
           ]);
            return redirect()->back()->with('message', 'Password Changed Successfully');
        }
        else{
            return redirect()->back()->with('message', 'Failed');
        }
    }
}
