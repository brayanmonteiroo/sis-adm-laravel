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
                    <a href="{{ route('course.show', ['course' => $classe->course_id]) }}" class="text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="text-decoration-none">Aulas</a>
                </li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>

        <div class="card mb-4">

            <div class="card-header hstack gap-2">
                <span>Editar</span>

                <span class="ms-auto d-sm-flex flex-row">

                    <a href="{{ route('classe.index', ['course' => $classe->course_id]) }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Aulas</a>
                    <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-eye"></i> Ver</a>

                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <form class="row g-3" action="{{ route('classe.update', ['classe' => $classe->id ]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                      <label for="name_course" class="form-label">Nome</label>
                      <input type="text" name="name_course" class="form-control" id="name_course" placeholder="Nome do curso" value="{{ $classe->course->name }}" disabled required>
                    </div>

                    <div class="col-12">
                      <label for="name" class="form-label">Nome</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Nome da aula" value="{{ old('name', $classe->name) }}" required>
                    </div>

                    <div class="col-12">
                      <label for="name" class="form-label">Descrição</label>
                      <textarea name="description" rows="4" cols="30" id="description" class="form-control" required>{{ old('description', $classe->description) }}</textarea>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
