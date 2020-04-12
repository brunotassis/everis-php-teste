<style>
    .jumbotron {
        padding-top: 20px;
    }
</style>

<br>

<div class="card">
    <div class="card-header">
        <h5>{{ $comment->user->name }}</h5>
    </div>
    <div class="card-body">
        {{ $comment->comment }}
    </div>
    <div class="card-footer">
        <a class="btn btn-sm btn-primary" href="/comment/{{ $comment->id }}/edit">EDITAR</a>
        @if(Auth::user()->profile_type == 1 || Auth::user()->id == $comment->user->id)
        <a class="btn btn-sm btn-danger" href="#" onClick="deleteComment({{ $comment->id }})">APAGAR</a>
        @endif
    </div>
</div>