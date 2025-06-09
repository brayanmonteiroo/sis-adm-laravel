@extends('layouts.login')

@section('content')
    <div class="col-12 col-sm-8 col-md-8 col-lg-5">
        <div class="card bg-light text-dark shadow-lg border-0 rounded-4 p-4">
            <div class="card-header bg-transparent border-0 text-center mb-3">
                <h3 class="fw-light"><i class="fa-brands fa-laravel"></i> Laravel ADM</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email"
                            placeholder="nome@exemplo.com" value="{{ old('email') }}" required />
                        <label for="email">Endereço de e-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Senha"
                            required />
                        <label for="password">Senha</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="lembrarSenha" type="checkbox" />
                        <label class="form-check-label" for="lembrarSenha">Lembrar senha</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small text-decoration-none" href="{{ route('forgot-password.show') }}">Esqueceu a senha?</a>
                        <button type="submit" class="btn btn-primary" href="#">Entrar</button>
                    </div>
                    {{-- <div class="small mt-3">
                        <p>
                            Usuário: brayanmonteirooo@gmail.com <br>
                            Senha: 123456a
                        </p>
                    </div> --}}
                </form>
            </div>
            <div class="card-footer bg-transparent border-0 text-center">
                <div class="small">Não tem uma conta? <a href="{{ route('login.create-user') }}"
                        class="text-decoration-none">Cadastre-se!</a></div>
            </div>
        </div>
    </div>
@endsection
