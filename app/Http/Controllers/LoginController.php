<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

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

            //Salvar log
            Log::warning('E-mail ou senha inválidos', ['email' => $request->email]);

            // Redirecionar o usuário para a página anterior 'login', enviar a mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválidos');
        }

        // Obter o usuário autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        // Verifica se a permissão é Super Admin, tem acesso a todas as páginas
        if($user->hasRole('Super Admin')){

            // O usuário tem todas as permissões
            $permissions = Permission::pluck('name')->toArray();

        }else{
            
            // Recuperar no banco de dados as permissões que o papel possui
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();

        }

        // Atribuir as permissões ao usuário
        $user->syncPermissions($permissions);

        // Redireciona o usuário
        return redirect()->route('dashboard.index');

        
    }

    //Carregar o fomulário cadastrar novo usuário
    public function create()
    {
        // Carregar uma view
        return view('login.create');
    }

    public function store(LoginUserRequest $request)
    {
        // Validar o formulário
        $request ->validated();

        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Cadastrar no banco de dados na tabela usuários
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Salvar log
            Log::info('Usuário cadastrado.', ['id' => $user->id]);

            // Operação é concluída com êxito
            DB::commit();

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('login.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            // Salvar log
            Log::warning('Usuário não cadastrado.', ['error' => $e->getMessage()]);

            // Operação não é concluída com êxito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    public function destroyLogin()
    {
        // Deslogar o usuário
        Auth::logout();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Sessão encerrada com sucesso!');
    }
}
