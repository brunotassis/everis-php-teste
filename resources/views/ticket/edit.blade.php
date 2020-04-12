<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAMADO #{{ $ticket->id }}</title>

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
                <div class="col-md-7">
                    <form action="/chamados/{{ $ticket->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h1>
                            <a class="" href="{{url('/chamados')}}">
                                <i class="fa fa-backward"></i>
                            </a>
                            CHAMADO #{{ $ticket->id }}
                        </h1>
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea id="description" name="description" class="form-control" rows="3">
                            {{ $ticket->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Cliente</label>
                            <input name="client_id" type="hidden" value="{{ $ticket->client_id }}">
                            <input type="text" name="name" class="form-control" value="{{ $ticket->user->name }}" disabled>
                        </div>

                        @if(Auth::user()->profile_type == 1 || Auth::user()->profile_type == 3)
                        <div class="form-group">
                            <label for="">Situação</label>
                            <select name="status" class="form-control" value={{ $ticket->status }}>
                                <option value="0">ABERTO</option>
                                <option value="1">FECHADO</option>
                            </select>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        @if(Auth::user()->profile_type == 1 || Auth::user()->profile_type == 3)
                        <button id="btnDeleteTicket" type="submit" class="btn btn-danger">Apagar</button>
                        @endif
                    </form>
                </div>

                <div class="col-md-5">
                    <h1>Inserir Comentario</h1>
                    <form action="/comentarios" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea name="comment" class="form-control" rows="2"></textarea>
                            <input name="ticket_id" type="hidden" value="{{$ticket->id}}">
                            <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">ENVIAR COMENTARIO</button>
                        </div>
                    </form>
                </div>
            </div>

            @isset($comments)
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>Comentarios</h2>
                    @foreach($comments as $comment)
                    @include('ticket/comments/show')
                    @endforeach
                </div>
            </div>
            @endisset
        </div>
    </div>

    <!-- jQuery, Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Delete Ticket Script -->
    @if(Auth::user()->profile_type == 1 || Auth::user()->profile_type == 3)
    <script>
        const ticket = @json($ticket);
        const token = document.querySelectorAll('[name=_token]')[0].value;

        const btnDeleteTicket = document.getElementById('btnDeleteTicket');
        btnDeleteTicket.addEventListener('click', (e) => {
            e.preventDefault();

            if (confirm('Quer realmente apagar este chamado?')) {
                $.ajax({
                    url: `/chamados/${ticket.id}`,
                    type: `DELETE`,
                    data: {
                        "_token": token,
                        "id": ticket.id
                    },
                    success: function() {
                        window.location.href = '/chamados';
                    }
                });
            }
        });
    </script>
    @endif

    <script>
        function deleteComment(id) {
            if (confirm('Quer realmente apagar este chamado?')) {
                $.ajax({
                    url: `/comentarios/${id}`,
                    type: `DELETE`,
                    data: {
                        "_token": token,
                        "id": id
                    },
                    success: function() {
                        window.location.href = `/chamados/${ticket.id}/edit`;
                    }
                });
            }
        }
    </script>
</body>

</html>