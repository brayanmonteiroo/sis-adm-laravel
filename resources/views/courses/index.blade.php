@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h2 class="mt-3">Cursos</h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">Painel</a>
                </li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Todos os Cursos</span>

                <span class="ms-auto">
                    <a href="{{ route('course.create') }}" class="btn btn-success btn-sm"><i class="fa-regular fa-square-plus"></i> Novo Curso</a>
                </span>
            </div>

            <div class="card-body">
                <x-alert />

                <div class="table-responsive border-light-subtle">
                    <table class="table table-hover align-middle border-light-subtle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <th>{{ $course->id }}</th>
                                    <td class="text-break">{{ $course->name }}</td>
                                    <td>{{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap justify-content-center gap-1">
                                            <a href="{{ route('classe.index', ['course' => $course->id]) }}"
                                                class="btn btn-info btn-sm"><i class="fa-solid fa-list"></i> Aulas</a>

                                            <a href="{{ route('course.show', ['course' => $course->id]) }}"
                                                class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i> Ver</a>

                                            <a href="{{ route('course.edit', ['course' => $course->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i> Editar</a>

                                            <form action="{{ route('course.destroy', ['course' => $course->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja apagar este registro?')"><i class="fa-regular fa-trash-can"></i> Apagar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-danger text-center mb-0">
                                            Nenhum curso encontrado!
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> {{-- Fim div table --}}

                {{-- Imprimir Paginação --}}
                {{ $courses->links() }}

            </div>
        </div>
    </div>
@endsection
