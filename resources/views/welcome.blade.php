<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css">

    <!-- Estilos Pessoais -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        h2 {
            margin: 12px 0px
        }

        div.container {
            padding: 20px 4px
        }

        .col-md-4 {
            display: flex;
            flex-direction: column;
            justify-content: center;

            border-left: 1px solid #C6C6C6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-10 offset-md-1">
                        <section style="text-align:justify">
                            <h2>Sistema de Chamados</h2>

                            <p>
                                Olá! Seja bem vindo ao sistema de chamados.
                                Ultilize o formulario de login caso você já seja um usuário, 
                                do contrario clique no botão abaixo para realizar um novo cadastro.
                            </p>

                            <p>
                                O sistema de chamados é uma aplicação desenvolvida com o objetivo de criar e gerenciar chamados dos nossos clientes.
                            </p>
                            <p>
                                Com uma plataforma simples e intuitiva nossos clientes e colaboradores podem 
                                abrir chamados para resolução das diversas situações.
                            </p>
                        </section>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-10 offset-md-1">
                        <a name="" id="" class="btn btn-block btn-primary" href='/users/create'>EFETUAR CADASTRO</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="/login" method="post">
                    @csrf
                    <h1 class="text-center">LOGIN</h1>
                    <div class="form-group">
                        <label for=""></label>
                        <input name="email" id="email" type="text" class="form-control" placeholder="Nome de Usuario">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input name="password" id="password" type="text" class="form-control" placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">EFETUAR LOGIN</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Scripts pessoais -->
    <!-- <script src="script.js"></script> -->
</body>

</html>