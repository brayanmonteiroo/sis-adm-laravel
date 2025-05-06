<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login
    public function index()
    {
        //Carregar a view
        return view('login.index');
    }

    // Login
    public function loginProcess(LoginRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Validar o usuário e a senha com as informações do banco de dados
        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(!$authenticated){

            // Redirecionar o usuário para a página anterior 'login', enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválidos');
        }

        // Redireciona o usuário
        return redirect()->route('dashboard.index');
    }

    public function destroyLogin()
    {
        // Deslogar o usuário
        Auth::logout();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Sessão encerrada com sucesso!');
    }
}
