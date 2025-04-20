@extends('layouts.admin')

@section('content')
    <h1>Criar os cursos</h1>

    <a href="{{ route('courses.index') }}">
        <button type="submit" class="btn btn-success">Listar</button>    
    </a><br><br>

    <x-alert />

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        @method('POST')

        <label for="" class="form-label">Nome: </label>
        <input class="form-control-sm" type="text" name="name" id="name" placeholder="Nome do curso"
            value="{{ old('name') }}"><br><br>

        <label for="" class="form-label">Preço: </label>
        <input class="form-control-sm" type="text" name="price" id="price" placeholder="Preço do curso: 2.47"
            value="{{ old('price') }}"><br><br>

        <button type="submit" class="btn btn-primary">Cadastrar</button>


    </form>
@endsection
