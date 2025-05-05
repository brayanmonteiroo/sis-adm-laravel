@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h2 class="mt-3">Cursos</h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none">Painel</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>

        <div class="card mb-4">

            <div class="card-header hstack gap-2">
                <span>Editar Curso</span>

                <span class="ms-auto d-sm-flex flex-row">

                    <a href="{{ route('course.index') }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0"><i class="fa-solid fa-list"></i> Cursos</a>

                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-primary btn-sm me-1 mb-1 mb-sm-0"><i class="fa-regular fa-eye"></i> Ver
                    </a>

                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <form class="row g-3" action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Curso"
                            value="{{ old('name', $course->name) }}" >
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">Preço</label>
                        <input type="text" class="form-control" name="price" id="price"
                            placeholder="Preço do curso: 2.47" value="{{ old('price', $course->price) }}" >
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
