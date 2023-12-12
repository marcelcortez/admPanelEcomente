<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class AuthController extends Controller {

    public function index(){
        return view('login.index');
    }

    public function login(Request $request) {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->intended(route('home.index'))->with('success', 'Login Realizado com sucesso!');
        }

        // Autenticação falhou
        return redirect()->route('login.index')->with('error', 'Email ou senha incorretos!');
    }

    public function logout() {

        Auth::logout();
        
        return redirect()->route('login.index');
    }
}
