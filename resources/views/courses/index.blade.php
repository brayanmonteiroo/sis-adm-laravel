@extends('layouts.admin')

@section('content')
    <h1>Listar os cursos</h1>

    <a href="{{ route('courses.show') }}">Visualizar</a><br>
    <a href="{{ route('courses.create') }}">Cadstrar</a><br>
@endsection
