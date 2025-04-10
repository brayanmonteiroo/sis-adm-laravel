@extends('layouts.admin')

@section('content')
    <h1>Criar os cursos</h1>

    <a href="{{ route('courses.index') }}">Listar</a><br><br><br>

    @if (session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="" class="form-label">Nome: </label>
        <input class="form-control-sm" type="text" name="name" id="name" placeholder="Nome do curso"
            value="{{ old('name') }}" required>

        <button type="submit" class="btn btn-primary">Cadastrar</button>


    </form>
@endsection
