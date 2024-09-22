<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\rgisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }
    public function handleRegistration(User $user, rgisterRequest $Request)
    {
        $user::create([
            'name'=> $Request->name,
            'firstName'=> $Request->firstName,
            'Pseudo' => $Request->Pseudo,
            'email'=> $Request->email,
            'password' => Hash::make($Request->password)
        ]);
        return redirect('/login')->with('success', 'Votre compte a été crée avec succes ! Connectez-Vous');
          
    }
    /*public function login()
    {
        return view('login');
    }*/
    public function handleLogin(Request $request){
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->with('error','Le mail ou le mot de passe n\'est pas correct ! Réessayez');
        }
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }
}
