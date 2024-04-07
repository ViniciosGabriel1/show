<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CadastroController extends Controller
{
    public function index()
    {
        return view("login/cadastro");
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password' // Adicionei a regra 'same:password' para garantir que a senha de confirmação seja igual à senha
        ], [
            'name.required' => 'Por favor, Insira seu nome!',
            'email.required' => 'Esse campo é Obrigatório!',
            'email.email' => 'Digite um email válido!',
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'Senha fraca, no mínimo :min caracteres!',
            'password_confirmation.required' => 'O campo de confirmação é obrigatório!',
            'password_confirmation.min' => 'Senha fraca, no mínimo :min caracteres!',
            'password_confirmation.same' => 'As senhas não coincidem!'
        ]);

        // Criar um novo usuário com os dados do formulário
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
