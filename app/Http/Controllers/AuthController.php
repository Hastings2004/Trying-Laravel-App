<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $field = $request->validate([
            'username'=> ['required','max:255'],
            'email'=> ['required','email','max:255','unique:users'],
            'password'=> ['required','confirmed','min:6'],
        ]);

        $user = User::create($field);
        
        Auth::login($user);

        return redirect() -> route('login');

    }
    public function login(Request $request){
        $field = $request->validate([
            'email'=> ['required'],
            'password'=> ['required'],
        ]);

        if(Auth::attempt($field, $request -> remember)){
            return redirect() -> intended('dashboard');
        }
        else{
            return back() -> withErrors(['invalid' => 'Invalid credentials']);
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/') ;


    }
}
