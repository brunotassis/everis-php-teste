<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER | Edit</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <!-- Estilos Pessoais -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        .container {
            padding: 20px 0px
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="container">
            @isset($success)
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="alert alert-success">{{$success}}</div>
                </div>
            </div>
            @endisset

            @isset($erro)
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="alert alert-danger">{{$erro}}</div>
                </div>
            </div>
            @endisset
            <div class="row">
                <div class="col-6 offset-3">
                    <h3>
                        <a class="" href="{{url('/users')}}">
                            <i class="fa fa-backward"></i>
                        </a>
                        Edição do Usuario
                    </h3>
                    <form action="/users/{{$user->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="">
                        </div>
                        @if(Auth::user()->profile_type == 1)
                            <div class="form-group">
                                <label>Perfil</label>
                                <select class="form-control" name="profile_type" id="profile_type">
                                    <option value="0">Usuário</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Cliente</option>
                                    <option value="3">Funcionario</option>
                                </select>
                            </div>
                        @endif
                        <hr>
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="">
                        </div>


                        <button type="submit" name="submit" class="btn btn-block btn-primary" btn-lg btn-block">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

    @isset($user)
    <script>
        const user = @json($user);
        document.querySelector('[name=name]').value = user.name;
        document.querySelector('[name=email]').value = user.email;
        document.querySelector('[name=profile_type]').value = user.profile_type;

        document.querySelector('form').action = `/users/${user.id}`;
        document.querySelector('[name=submit]').innerText = `Atualizar`;
    </script>
    @endisset
</body>

</html>