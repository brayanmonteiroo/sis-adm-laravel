@extends('layouts.admin')

@section('content')
    <h1>Visualizar o curso</h1>

    <a href="{{ route('courses.index') }}">
        <button type="submit" class="btn btn-success">Listar</button>
    </a><br><br>
    <a href="{{ route('courses.edit', ['course' => $course->id]) }}">
        <button type="submit" class="btn btn-info">Editar</button>
    </a><br><br>

    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Você tem certeza que deseja apagar este curso?')">Apagar</button>
    </form><br>

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
