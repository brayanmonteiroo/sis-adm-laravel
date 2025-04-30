<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- CSS SB Admin --}}
    <link rel="stylesheet" href="{{ asset('css/styles_sbadmin.css') }}">
    {{-- CSS Font Awesome 6 --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><i class="fa-brands fa-laravel"></i> Laravel ADM</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Painel
                        </a>

                        <a class="nav-link" href="{{ route('course.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            Cursos
                        </a>

                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                            Sair
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logado com:</div>
                    Brayan
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="https://brayan.dev" class="text-decoration-none">Brayan Monteiro</a> {{ date('Y') }}</div>
                        <div>
                            <a href="#" class="text-decoration-none">Política de Privacidade</a>
                            &middot;
                            <a href="#" class="text-decoration-none">Termos de Uso</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>




    {{-- JS Bootstrap --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- Js SB Admin --}}
    <script src="{{ asset('js/scripts_sbadmin.js') }}"></script>
    {{-- Icons Font Awesome 6--}}
    <script src="{{ asset('js/all.min.js') }}"></script>

</body>

</html>
