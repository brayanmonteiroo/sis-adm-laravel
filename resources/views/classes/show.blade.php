@extends('layouts.admin')

@section('content')
    <h2>Detalhes da Aula</h2>

    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}">
        <button type="button">Todos as Aulas</button>
    </a><br><br>

    <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}">
        <button type="button">Editar</button>
    </a><br><br>

    <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
    </form><br>

    <x-alert />

    ID do curso: {{ $classe->id }}<br>
    Nome: {{ $classe->name }}<br>
    Descrição: {{ $classe->description }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}<br>
@endsection
