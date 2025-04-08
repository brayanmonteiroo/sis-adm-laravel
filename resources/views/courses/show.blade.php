@extends('layouts.admin')

@section('content')
<h1>Visualizar o curso</h1>

<a href="{{ route('courses.index') }}">Listar</a><br>
<a href="{{ route('courses.edit', ['course' => $course->id]) }}">Editar</a><br><br>

@if (session('success'))
<p style="color: green">
    {{ session('success') }}
</p>
    
@endif

ID: {{ $course->id }}<br>
Nome: {{ $course->name }}<br>
Data da criação: {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
Data de modificação: {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
