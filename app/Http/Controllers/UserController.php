<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function index(){
        $usuarios = User::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }



    public function create (Request $request) {
        return view('usuarios.create');        
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuário registrado com sucesso!');
    }

    public function delete(User $usuario){
        $usuario->delete();

        return redirect(route('usuario.index'))->with('success', 'Usuário deletado com sucesso!');
    }
    
}
