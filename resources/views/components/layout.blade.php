<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('/css/app.css') }} ">
    <link rel="stylesheet" href=" {{ asset('/css/estilos.css') }}">
    <link rel="shortcut icon" href=" {{ asset('/img/V-logo.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>{{ $title }} - Controle Séries</title>
</head>

<body>
    <div class="d-flex w-100 cont">
        <aside class="p-4 d-flex flex-column justify-center" id="sideBar">
            <a href="#" onclick="navbar()" id="imgNav">
                {{-- <img src="https://fontmeme.com/permalink/230801/ea5a4bc126828c9d792681daf3f76ed3.png"alt="fonte-bebas-neue" border="0"> --}}
                <img src="{{ asset('/img/V-logo.ico') }}" alt="">
            </a>
            <a href="{{ route('series.index') }}" class="icon-edit">
                <i class="fa-solid fa-pencil" style="color: #ff0000; font-size: 20px"></i>
                <span>Editar</span>
            </a>
        </aside>
        <main class="p-4 d-flex flex-column align-items-center w-100">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>

            @endif
            <h2 class="text-light">{{ $title }}</h2>

            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('/js/navbar.js') }}"></script>
</body>

</html>
