@extends('layouts.login')

@section('content')
    <div class="col-12 col-sm-8 col-md-8 col-lg-5">
        <div class="card bg-light text-dark shadow-lg border-0 rounded-4 p-4">
            <div class="card-header bg-transparent border-0 text-center mb-3">
                <h3 class="fw-light"><i class="fa-brands fa-laravel"></i> Nova Senha</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('reset-password.submit') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email"
                            placeholder="Seu e-mail cadastrado" value="{{ old('email') }}" required />
                        <label for="email">Endereço de e-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha"
                            required />
                        <label for="password">Nova Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Nova Senha"
                            required />
                        <label for="password_confirmation">Confirmar a Nova Senha</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-primary" onclick="this.innerText = 'Atualizando...'">Atualizar</button>
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
                <div class="small">Lembrou sua senha? <a href="{{ route('login.index') }}"
                        class="text-decoration-none">Voltar para o login</a></div>
            </div>
        </div>
    </div>
@endsection
