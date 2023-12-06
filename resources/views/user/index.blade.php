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
        <div class="login_field">

            <img src="{{ asset('/img/V-Logo.ico') }}" alt="Logo controle de series" class="img_icon">

            <div class = 'toggle-switch'>
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

                <form action="{{ route('series.index') }}" method="post" id="form_login" class="login_user">
                    @csrf
                    <h1 style="color: rgb(50, 50, 50); align-self: center" class="mb-4">Login</h1>

                    <div class="form_camp_name">
                        <input type="text" name="name" id="nome">
                        <label for="nome" class="login_label">Usuario</label>
                    </div>

                    <div class="form_camp_pass">
                        <input type="text" name="password" id="senha">
                        <label for="senha" class="pass_label">Senha</label>
                    </div>


                    <input type="submit" form="form_login" class="align-self-center login_btn" value="Entrar">
                </form>

                <form action="{{ route('user.store') }}" method="post" id="form_register" class="register_user">
                    @csrf
                    @method('INSERT')
                    <h1 style="color: rgb(50, 50, 50); align-self: center" class="mb-4">Cadastro</h1>

                    <div class="form_camp_name">
                        <input type="text" name="reg_name" id="reg_name">
                        <label for="reg_name" class="login_label">Usuario</label>
                    </div>

                    <div class="form_camp_pass">
                        <input type="text" name="reg_password" id="reg_password">
                        <label for="reg_password" class="pass_label">Senha</label>
                    </div>


                    <input type="submit" form="form_register" class="align-self-center login_btn" value="Cadastrar">
                </form>
            </div>

        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('.form_camp_name > input').on('input', () => {
            $('.form_camp_name > input').each(function(index, value)  {
                let labels = $('.form_camp_name > label');
                if (value.value !== '') {
                    labels[index].classList.add('move_label');
                    labels[index].style.color = 'rgba(50, 50, 50, 1)';
                } else {
                    labels[index].classList.remove('move_label');
                    labels[index].style.color = 'rgba(50, 50, 50, 0.5)';

                }
            });

        });

        $('.form_camp_pass > input').on('input', () => {
            $('.form_camp_pass > input').each(function(index, value)  {
                let labels = $('.form_camp_pass > label');
                if (value.value !== '') {
                    labels[index].classList.add('move_label');
                    labels[index].style.color = 'rgba(50, 50, 50, 1)';

                } else {
                    labels[index].classList.remove('move_label');
                    labels[index].style.color = 'rgba(50, 50, 50, 0.5)';

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
