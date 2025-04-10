@extends('layouts.admin')

@section('content')
    <h1>Listar os cursos</h1>

    <a href="{{ route('courses.create') }}">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </a><br><br>

    @if (session('success'))
        <p style="color: green">
            {{ session('success') }}
        </p>
    @endif


    @forelse ($courses as $course)
        {{ $course->id }}<br>
        {{ $course->name }}<br>
        {{ \Carbon\Carbon::parse($course->created_at)->format('d/m/Y H:i:s') }}<br>
        {{ \Carbon\Carbon::parse($course->updated_at)->format('d/m/Y H:i:s') }}<br><br>

        <a href="{{ route('courses.show', ['course' => $course->id]) }}">
            <button type="submit" class="btn btn-success">Visualizar</button>
        </a><br><br>
        <a href="{{ route('courses.edit', ['course' => $course->id]) }}">
            <button type="submit" class="btn btn-info">Editar</button>
        </a><br><br>
        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Você tem certeza que deseja apagar este curso?')">Apagar</button>
        </form>

        <hr>
    @empty
        <p style="color: red">Nenhum curso encontrado</p>
    @endforelse

    {{-- Imprimir Paginação --}}
    {{-- {{ $courses->links() }} --}}
@endsection
