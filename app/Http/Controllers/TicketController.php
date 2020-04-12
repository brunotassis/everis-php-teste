<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile_type;

        // Painel de usuário.
        if($profile == 0){
            return view('dash/usuario');
        }

        // Painel de administrador.
        if($profile == 1){
            $tickets = Ticket::all();
            $viewData = ['tickets' => $tickets];
            return view('ticket/index', $viewData);
        }

        // Painel de cliente.
        if($profile == 2){
            $user = Auth::user();
            $tickets = User::find($user->id)->tickets;

            $viewData = [
                'user' => $user,
                'tickets' => $tickets
            ];
            return view('dash/cliente', $viewData);
        }

        // Painel de funcionario.
        if($profile == 3){
            $tickets = Ticket::all();
            $viewData = ['tickets' => $tickets];
            return view('ticket/index', $viewData);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;

        $ticket->status = 0;
        $ticket->client_id = $request->input('client_id');
        $ticket->description = $request->input('description');

        try {
            $ticket->save();
            return redirect('/chamados');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $comments = $ticket->comments;

        $viewData = [
            'ticket' => $ticket,
            'comments' => $comments,
        ];
        return view('ticket/edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->description = $request->input('description');

        if($request->has('status')){
            $ticket->status = $request->input('status');
        }

        $ticket->save();
        return redirect('/chamados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        try {
            $ticket->delete();
            return 'CHAMADO APAGADO COM SUCESSO!';
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
