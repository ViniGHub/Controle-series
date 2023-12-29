<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('/css/app.css') }} ">
    <link rel="stylesheet" href=" {{ asset('/css/login.css') }}">
    <link rel="shortcut icon" href=" {{ asset('/img/V-logo.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <title>Login - Controle Séries</title>
</head>

<body>
    <main class="login_page">

        @if ($errors->any())
            <div class="alert alert-danger position-absolute align-self-start mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login_field">

            {{-- <img src="{{ asset('/img/viniflixr.png') }}" alt="Logo controle de series" class="img_icon"> --}}
            <h1>VINIFLIX</h1>


            <div style="" class = 'toggle-switch'>
                <label>
                    <input type = 'checkbox'>
                    <span class = 'slider'></span>
                    <i style="position: absolute; font-size: 18px; font-weight: 700; color: red; top: 6px; left: 6px;"
                        class="fa-regular fa-user"></i>
                    <i style="position: absolute; font-size: 20px; font-weight: 700; color: red; top: 6px; left: 36px;"
                        class="fa-solid fa-plus"></i>
                </label>
            </div>



            <div class="forms">

                <form action="{{ route('user.store') }}" method="post" id="form_login" class="login_user">
                    <div class="d-flex flex-column align-items-center justify-content-center align-self-center">
                        <b class="gap-0 m-0 p-0">Conta teste</b>
                        <p class="gap-0 m-0 p-0">Nome: vinipoh</p>
                        <p class="gap-0 m-0 p-0">senha: qwe</p>
                    </div>

                    @csrf
                    <h1 style="color: rgb(50, 50, 50); align-self: center" class="mb-4">Login</h1>

                    <div class="form_camp_name">
                        <input inputform type="text" name="name" id="nome">
                        <label for="nome" class="login_label">Nome</label>
                    </div>

                    <div class="form_camp_pass">
                        <input inputform type="password" name="password" id="senha">
                        <label for="senha" class="pass_label">Senha</label>
                    </div>


                    <input type="submit" form="form_login" class="align-self-center login_btn" value="Entrar">
                </form>

                <form action="{{ route('user.store') }}" method="post" id="form_register" class="register_user">
                    @csrf

                    <h1 style="color: rgb(50, 50, 50); align-self: center" class="mb-4">Cadastro</h1>

                    <div class="form_camp_name">
                        <input inputform type="text" name="name" id="reg_name">
                        <label for="reg_name" class="login_label">Nome</label>
                    </div>

                    <div class="form_camp_email">
                        <input inputform type="text" name="email" id="reg_email">
                        <label for="reg_email" class="login_label">Email</label>
                    </div>

                    <div class="form_camp_pass">
                        <input inputform type="password" name="password" id="reg_password">
                        <label for="reg_password" class="login_label">Senha</label>
                    </div>

                    <input type="submit" form="form_register" class="align-self-center login_btn" value="Cadastrar">
                </form>

            </div> 

        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('form input[inputform]').on('input', () => {
            $('form input[inputform]').each(function(index, input) {
                let labels = $('form label');

                if (input.value !== '') {
                    labels[index].classList.add('move_label');

                } else {
                    labels[index].classList.remove('move_label');

                }
            });

        });


        $('input[type="checkbox"]').on('change', () => {
            if ($('input[type="checkbox"]').is(':checked')) {
                $('.login_user').css('marginLeft', '-640px');

            } else {
                $('.login_user').css('marginLeft', '640px');

            }
        });
    </script>
</body>

</html>
