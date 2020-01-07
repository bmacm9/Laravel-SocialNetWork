<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/loginTuenti.css">
    <link href="{{ asset('css/loginTuenti.css') }}" rel="stylesheet">
</head>
<body>
    <section class="canvas login">
        <header>
            <img src="87414.png" style="height: 65px;">
            <h2 style="display: inline; color: white; font-size: 50pt; margin-left:10px">Veinti</h2>
        </header>
        <main id="login" class="body">
            <form id="form_login">
                <fieldset>
                    <ul>
                        <li>
                            <label for="email">E-mail</label>
                            <span class="input">
                                <input type="text" name="email" class="email">
                            </span>
                        </li>
                        <li>
                            <label for="pass">Contraseña</label>
                            <span class="input">
                                <input type="password" name="pass" id="input_password" class="password">
                            </span>
                        </li>
                        <li class="indent">
                            <label class="rememberMe" for="remember">
                                {{ __('Recordarme en este equipo') }}
                            </label>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        </li>
                        <li class="buttons">
                            <input type="submit" name="submit_button" id="submit_button" value="Entrar">
                        </li>
                    </ul>
                </fieldset>






            </form>
        </main>
        <footer>
            <a href="#">¿Has olvidado tu contraseña?</a>
        </footer>
    </section>
    <footer>
        <ul>
            <li>Legal</li>
            <li>Ayuda</li>
            <li>Desarrolladores</li>
            <li>Blog</li>
            <li>Prensa</li>
            <li>Anunciate</li>
            <li>Empleo</li>
            <li>Acerca de</li>
            <li>&copy; Veinti 2019</li>
        </ul>
    </footer>
</body>
</html>
