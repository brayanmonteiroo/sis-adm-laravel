@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h2 class="mt-3">Aula</h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Painel</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.show', ['course' => $classe->course_id]) }}" class="text-decoration-none">Curso</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="text-decoration-none">Aulas</a>
                </li>
                <li class="breadcrumb-item active">Visualizar</li>
            </ol>
        </div>

        <div class="card mb-4">

            <div class="card-header hstack gap-2">
                <span>Visualizar</span>

                <span class="ms-auto d-sm-flex flex-row">

                    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Aulas</a>

                    <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-warning btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-pen-to-square"></i> Editar</a>

                    <form action="{{ route('classe.destroy', ['classe' => $classe->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este registro?')"><i class="fa-regular fa-trash-can"></i> Apagar</button>
                    </form>

                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <dl class="row">
                    <dt class="col-sm-3">ID: </dt>
                    <dd class="col-sm-9">{{ $classe->id }}</dd>

                    <dt class="col-sm-3">Nome: </dt>
                    <dd class="col-sm-9">{{ $classe->name }}</dd>

                    <dt class="col-sm-3">Descrição: </dt>
                    <dd class="col-sm-9">{{ $classe->description }}</dd>

                    <dt class="col-sm-3">Ordem: </dt>
                    <dd class="col-sm-9">{{ $classe->order_classe }}</dd>

                    <dt class="col-sm-3">Curso: </dt>
                    <dd class="col-sm-9">{{ $classe->course->name }}</dd>

                    <dt class="col-sm-3">Data da criação: </dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($classe->created_at)->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-3">Data da última edição: </dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($classe->updated_at)->format('d/m/Y H:i:s') }}</dd>

                </dl>

            </div>
        </div>

    </div>
@endsection