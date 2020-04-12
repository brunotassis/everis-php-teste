<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->profile_type == 0) {
            return view('dash/usuario', ['user' => $user]);
        }

        if ($user->profile_type == 1) {
            $users = User::all();
            $data  = ['users' => $users];

            return view('dash/admin', $data);
        }

        if ($user->profile_type == 2) {
            return redirect('/chamados');
        }

        if ($user->profile_type == 3) {
            return redirect('/chamados');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $data = $request->only('name', 'email', 'password');

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);

        try {
            $user->save();

            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return redirect('/');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);
            $data = ['user' => $user];

            return view('user/edit', $data);
        } catch (\Throwable $th) {
            return 'Desculpe houve um erro ao buscar o usuário.';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->profile_type = $request->input('profile_type');

        if ($request->input('password') != ""){
            $user->password = bcrypt($request->input('password'));
        }

        try {
            $user->save();

            $viewData = [
                'user' => $user,
                'success' => 'Dados atualizados com sucesso.'
            ];

            return view('user/edit', $viewData);
        } catch (\Throwable $th) {
            dd($th);

            $viewData = [
                'user' => $user,
                'erro' => 'Não foi possivel atualizar os dados.'
            ];

            return view('user/edit', $viewData);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleted_at = now();
        $user->save();
    }
}
