@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h2 class="mt-3">Aulas</h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Painel</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item active">Aulas</li>
            </ol>
        </div>

        <div class="card mb-4">
            <div class="card-header hstack gap-2">
                <span>Todas as Aulas</span>

                <span class="ms-auto">
                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-circle-left"></i> Curso</a>
                    <a href="{{ route('classe.create', ['course' => $course->id]) }}" class="btn btn-success btn-sm"><i class="fa-regular fa-square-plus"></i> Nova Aula</a>
                </span>
            </div>

            <div class="card-body">
                <x-alert />

                <div class="table-responsive-sm border-light-subtle">
                    <table class="table table-hover align-middle border-light-subtle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ordem</th>
                                <th>Curso</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($classes as $classe)
                                <tr>
                                    <th>{{ $classe->id }}</th>
                                    <td>{{ $classe->name }}</td>
                                    <td>{{ $classe->order_classe }}</td>
                                    <td>{{ $classe->course->name }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap justify-content-center gap-1">
                                            <a href="{{ route('classe.show', ['classe' => $classe->id]) }}"
                                                class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i> Ver</a>

                                            <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}"
                                                class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i> Editar</a>

                                            <form action="{{ route('classe.destroy', ['classe' => $classe->id]) }}" method="POST">
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
                                    <td colspan="6">
                                        <div class="alert alert-danger text-center mb-0">
                                            Nenhuma aula encontrada!
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
