<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Estilos Pessoais -->
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div id="root">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Tipo de Usuario</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->id }}</td>
                                        <td scope="row">{{ $user->name }}</td>
                                        <td scope="row">{{ $user->email }}</td>
                                        <td scope="row">
                                            <a class="btn btn-sm btn-primary" href="/users/{{ $user->id }}/edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger" href="">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>