@extends('layouts.login')

@section('content')
    <div class="col-12 col-sm-8 col-md-8 col-lg-7">
        <div class="card bg-light text-dark shadow-lg border-0 rounded-4 p-4">
            <div class="card-header bg-transparent border-0 text-center mb-3">
                <h3 class="fw-light"><i class="fa-brands fa-laravel"></i> Inscrever-se</h3>
            </div>
            <div class="card-body">

                <x-alert />

                <form action="{{ route('login.store-user') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="name" name="name"
                            placeholder="Nome" value="{{ old('name') }}" />
                        <label for="email">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email"
                            placeholder="nome@exemplo.com" value="{{ old('email') }}" />
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Senha"
                             />
                        <label for="password">Senha</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a href="{{ route('login.index') }}" class="text-decoration-none">Fazer Login</a>
                        <button type="submit" class="btn btn-primary" href="#">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
