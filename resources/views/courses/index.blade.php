@extends('layouts.admin')

@section('content')
    <h1>Listar os cursos</h1>

    <a href="{{ route('courses.show') }}">Visualizar</a><br><br>
    <a href="{{ route('courses.create') }}">Cadstrar</a><br><br>

    @forelse ($courses as $course)
        {{ $course->id }}<br>
        {{ $course->name }}<br>
        {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
        {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br>
        <hr>
    @empty
        <p style="color: red">Nenhum curso encontrado</p>
    @endforelse

    {{-- Imprimir Paginação --}}
    {{-- {{ $courses->links() }} --}}
@endsection
