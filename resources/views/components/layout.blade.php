<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('/css/app.css') }} ">
    <link rel="stylesheet" href=" {{ asset('/css/estilos.css') }}">
    <link rel="shortcut icon" href=" {{ asset('/img/V-logo.png') }}" type="image/x-icon">

    <title>{{ $title }} - Controle Séries</title>
</head>

<body>
    <div class="d-flex w-100 cont">
        <aside class="p-4 d-flex flex-column justify-center" id="sideBar">
            <a href="#" onclick="navbar()" id="imgNav">
                {{-- <img src="https://fontmeme.com/permalink/230801/ea5a4bc126828c9d792681daf3f76ed3.png"alt="fonte-bebas-neue" border="0"> --}}
                <img src="{{ asset('/img/V-logo.png') }}" alt="">
            </a>
            <a href="#" class="icon-edit">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25"
                    viewBox="0,0,256,256" style="fill:#000000;">
                    <g fill="#ff0000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(5.12,5.12)">
                            <path
                                d="M43.125,2c-1.24609,0 -2.48828,0.48828 -3.4375,1.4375l-0.8125,0.8125l6.875,6.875c-0.00391,0.00391 0.8125,-0.8125 0.8125,-0.8125c1.90234,-1.90234 1.89844,-4.97656 0,-6.875c-0.95312,-0.94922 -2.19141,-1.4375 -3.4375,-1.4375zM37.34375,6.03125c-0.22656,0.03125 -0.4375,0.14453 -0.59375,0.3125l-32.4375,32.46875c-0.12891,0.11719 -0.22656,0.26953 -0.28125,0.4375l-2,7.5c-0.08984,0.34375 0.01172,0.70703 0.26172,0.95703c0.25,0.25 0.61328,0.35156 0.95703,0.26172l7.5,-2c0.16797,-0.05469 0.32031,-0.15234 0.4375,-0.28125l32.46875,-32.4375c0.39844,-0.38672 0.40234,-1.02344 0.01563,-1.42187c-0.38672,-0.39844 -1.02344,-0.40234 -1.42187,-0.01562l-32.28125,32.28125l-4.0625,-4.0625l32.28125,-32.28125c0.30078,-0.28906 0.39063,-0.73828 0.22266,-1.12109c-0.16797,-0.38281 -0.55469,-0.62109 -0.97266,-0.59766c-0.03125,0 -0.0625,0 -0.09375,0z">
                            </path>
                        </g>
                    </g>
                </svg>
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
            <h2 class="text-light title">{{ $title }}</h2>

            {{ $slot }}
        </main>
    </div>

    <script src="{{ asset('/js/navbar.js') }}"></script>
</body>

</html>
