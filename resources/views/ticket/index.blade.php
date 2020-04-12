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
            @include('layout/menu')
            <div class="row">
                <div class="col">
                    <h2>Chamados</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Solicitante</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td scope="row">{{ $ticket->id }}</td>
                                <td scope="row">{{ $ticket->user->name }}</td>
                                <td scope="row">{{ substr($ticket->description, 0, 80) . '...' }}</td>
                                @if($ticket->status == 0)
                                <td scope="row">
                                    <span class="badge badge-warning">{{ $ticket->displayStatus() }}</span>
                                </td>
                                @else
                                <td scope="row">
                                    <span class="badge badge-dark">{{ $ticket->displayStatus() }}</span>
                                </td>
                                @endif
                                <td scope="row"><a class="btn btn-sm btn-block btn-primary" href="/chamados/{{ $ticket->id }}/edit">Editar</a></td>
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