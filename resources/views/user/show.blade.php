<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER | Edit</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css">

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
            @isset($error)
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="alert alert-danger">{{$error}}</div>
                </div>
            </div>
            @endisset
            <div class="row">
                <div class="col-6 offset-3">
                    <h3>Edição do Usuario</h3>
                    <form action="/users">
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Confirmar Senha</label>
                            <input type="text" class="form-control" name="confPassword" id="confPassword" placeholder="">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary" btn-lg btn-block">Atualizar</button>
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

            document.querySelector('form').action = `/users/${user.id}`;
            document.querySelector('[name=submit]').innerText = `Atualizar`;
        </script>
    @endisset
</body>

</html>