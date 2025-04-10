@extends('layouts.admin')

@section('content')
    <h1>Editar os cursos</h1>

    <a href="{{ route('courses.index') }}">
        <button type="submit" class="btn btn-success">Listar</button>
    </a><br>
    <a href="{{ route('courses.show', ['course' => $course->id]) }}">
        <button type="submit" class="btn btn-info">Visualizar</button>
    </a><br><br>
    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label class="form-label">Nome: </label>
        <input class="form-control-sm" type="text" name="name" id="name" placeholder="Nome do curso"
            value="{{ old('name', $course->name) }}" required>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
