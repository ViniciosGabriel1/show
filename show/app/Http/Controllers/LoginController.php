<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(){
        return view('login/login');
    }

    public function store(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ],[
            'email.required' => 'Esse campo é Obrigatório!',
            'email.email' => 'Digite um email válido!',
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'Senha fraca, no mínimo :min caracteres!'
        ]);


        $dados = $request->only('email','password');

        // echo '<pre>';
        // var_dump($dados);
        // echo '</pre>';

        $autenticated = Auth::attempt($dados);

        if (!$autenticated) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha inválidos!']);
        }
        
        return redirect()->route('home.index')->with('success', 'Logado com sucesso');
        
    }
    public function destroy(){
        
        Auth::logout();
        return redirect()->route('login.index');
    }
}
