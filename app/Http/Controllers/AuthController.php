<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('bookstore.auth.login');
    }
    public function loginConfirmed(Request $request){
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            if(Auth::user()->type == 'ADMIN')
                return redirect(route('books.index'));
            return redirect('/');
        }
    }
    public function register(){
        return view('bookstore.auth.register');
    }
    public function registerConfirmed(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->type = $request->type;
        $user->save();
        return redirect('login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
