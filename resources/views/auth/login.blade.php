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
            padding: 20px 0px
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
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

                        <button type="submit" class="btn btn-primary">EFETUAR LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        document.querySelector('[name=email]').value = 'brunotassis@gmail.com';
        document.querySelector('[name=password]').value = '1q2w3e4r';
    </script>
</body>

</html>