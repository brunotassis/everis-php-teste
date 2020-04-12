<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css">

    <style>
        .container {
            margin: 100px 0px
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-2">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sucesso!</h4>
                        <p>
                            Muito bem, suas informações já estão em nossa base de dados.
                            Em breve um administrador irá atualizar seus status definindo seu tipo de perfil.
                        </p>
                        <hr>
                        <p class="mb-0">USUÁRIO: <strong>{{ Auth::user()->name }}</strong> {{ Auth::user()->email }}.</p>
                    </div>

                    <br>
                    <a class="btn btn-block btn-primary" href="/logout">SAIR</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>