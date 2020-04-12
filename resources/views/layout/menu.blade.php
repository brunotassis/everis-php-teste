<style>
    .nav {
        border-radius: 4px;
        border-color: #E7E7E7;
        background-color: #343a40;
    }
</style>

<div class="row">
    <div class="col">
        <ul class="nav">
            @if(Auth::user()->profile_type == 1)
            <li class="nav-item">
                <a class="nav-link" href="/users">Usuários</a>
            </li>
            @endif
            @if(Auth::user()->profile_type == 1 || Auth::user()->profile_type == 3)
            <li class="nav-item">
                <a class="nav-link" href="/chamados">Todos Chamados</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/chamados/create">Novo Chamado</a>
            </li>
            @endif

            @if(Auth::user()->profile_type == 2)
            <li class="nav-item">
                <a class="nav-link" href="/chamados">Meus Chamados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/chamados/create">Novo Chamado</a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="/logout">Sair</a>
            </li>
        </ul>
    </div>
</div>

<hr>