<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            background-image: url(../assets/img/DistantMountain.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        #login {
            margin-top: 90px;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 400px;
            margin: auto;
            height: 420px;
            border: 1px solid #9C9C9C;
            background-color: #515A5A;
            border-radius: 7px;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
    </style>
    <div id="login">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" action="{{ route('login') }}" class="form" method="post">
                            @csrf

                            <h3 class="text-center text-white">INICIAR SESION</h3>
                            <br>
                            <div class="form-group">
                                <label for="username" class="text-white">Ingrese Usuario :</label><br><br>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="password" class="text-white">Ingrese su Contraseña :</label><br><br>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="remember-me" class="text-white"> <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Recordar </span> <span>


                                    </span></label><br><br>
                                <input type="submit" name="submit" class="btn btn-info btn-danger w-100 text-center" value="INGRESAR">
                            </div>

                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>