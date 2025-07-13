@extends('layouts.login')

@section('content')
    <div class="col-lg-5 d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card shadow-lg border-0 rounded-lg w-100">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4"><i class="fa-brands fa-laravel"></i> Laravel ADM - Login</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Digite o e-mail de usuário" value="{{ old('email') }}">
                        <label for="email">E-mail</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Digite a senha">
                        <label for="password">Senha</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="{{ route('forgot-password.show') }}" class="small text-decoration-none">Esqueceu a
                            senha?</a>
                        <button type="submit" class="btn btn-primary btn-sm">Acessar</button>
                    </div>

                </form>
            </div>

            <div class="card-footer text-center py-3">
                <div class="small">
                    Precisa de uma conta? <a href="{{ route('login.create-user') }}"
                        class="text-decoration-none">Inscrever-se!</a>
                </div>

                <div class="small">
                    Usuário: super-admin@gmail.com<br>
                    Senha: 123456a
                </div>
            </div>

        </div>
    </div>
@endsection
