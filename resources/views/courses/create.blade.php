@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb-1">
            <h2 class="mt-3">Cursos</h2>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="#" class="breadcrumb-item text-decoration-none">Painel</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('course.index') }}" class="breadcrumb-item text-decoration-none">Cursos</a>
                </li>
                <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
        </div>

        <div class="card mb-4">

            <div class="card-header hstack gap-2">
                <span>Cadastrar Curso</span>

                <span class="ms-auto d-sm-flex flex-row">

                    <a href="{{ route('course.index') }}" class="btn btn-info btn-sm me-1 mb-1 mb-sm-0">Cursos</a>

                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <form class="row g-3" action="{{ route('course.store') }}" method="POST">

                    @csrf
                    @method('POST')

                    <div class="col-12">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Curso"
                            value="{{ old('name') }}" >
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">Preço</label>
                        <input type="text" class="form-control" name="price" id="price"
                            placeholder="Preço do curso: 2.47" value="{{ old('price') }}" >
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection
