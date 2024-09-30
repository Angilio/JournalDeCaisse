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
    public function login()
    {
        return view('login');
    }
    public function handleLogin(LoginRequest $request){
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email invalide',
            'password' => 'Mot de passe incorrect'
        ]);
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
