@extends('layouts.admin')

@section('content')
<h1>Visualizar o curso</h1>

<a href="{{ route('courses.index') }}">Listar</a><br>
<a href="{{ route('courses.edit') }}">Editar</a><br><br>

ID: {{ $course->id }}<br>
Nome: {{ $course->name }}<br>
Data da criação: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
Data de modificação: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
