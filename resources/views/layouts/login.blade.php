<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Laravel ADM - Login</title>
</head>

<body class="bg-dark">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container min-vh-100 d-flex align-items-center justify-content-center">
                    <div class="row justify-content-center w-100">

                        @yield('content')

                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>
