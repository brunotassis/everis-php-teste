<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->input('comment');
        $comment->ticket_id = $request->input('ticket_id');
        $comment->user_id = $request->input('user_id');

        try {
            $comment->save();
            return redirect('/chamados/' . $comment->ticket_id . '/edit');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        try {
            $comment->delete();
            return 'COMENTARIO APAGADO COM SUCESSO!';
        } catch (\Throwable $th) {
            return json_encode($th);
        }
    }
}
