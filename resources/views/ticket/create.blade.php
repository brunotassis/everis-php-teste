<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVO CHAMADO</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <style>
        .container {
            padding: 20px 0px
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="container">
            @include('layout/menu')
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="/chamados" method="POST">
                        @csrf
                        <h1>
                            <a class="" href="{{url('/chamados')}}">
                                <i class="fa fa-backward"></i>
                            </a>
                            NOVO CHAMADO
                        </h1>
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea id="description" name="description" class="form-control" rows="3">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Cliente</label>
                            <input name="client_id" type="hidden" value="{{ Auth::user()->id }}">
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <button type="submit" class="btn btn-block btn-primary">CRIAR CHAMADO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>