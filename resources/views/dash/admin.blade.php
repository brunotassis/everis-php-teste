<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>

    <!-- Bootstrap 4, Fontawesome Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <style>
        .container {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .row {
            padding-bottom: 4px;
        }
    </style>
</head>

<body>
    <div id="root">
        <div class="container">
            @include('layout/menu')
            <div class="row">
                <div class="col">
                    <h2>Usuários</h2>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->email }}</td>
                                @switch($user->profile_type)
                                @case(0)
                                <td scope="row">
                                    <span class="badge badge-dark">{{ $user->displayType() }}</span>
                                </td>
                                @break

                                @case(1)
                                <td scope="row">
                                    <span class="badge badge-danger">{{ $user->displayType() }}</span>
                                </td>
                                @break

                                @case(2)
                                <td scope="row">
                                    <span class="badge badge-success">{{ $user->displayType() }}</span>
                                </td>
                                @break

                                @case(3)
                                <td scope="row">
                                    <span class="badge badge-warning">{{ $user->displayType() }}</span>
                                </td>
                                @break
                                @endswitch
                                <td scope="row">
                                    <a class="btn btn-sm btn-primary" href="/users/{{ $user->id }}/edit">
                                        <i class="far fa-edit"></i> Editar
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