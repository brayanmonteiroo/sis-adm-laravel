@extends('layouts.admin')

@section('content')
<h1>Visualizar o curso</h1>

<a href="{{ route('courses.index') }}">Listar</a><br>
<a href="{{ route('courses.edit') }}">Editar</a><br>
@endsection
