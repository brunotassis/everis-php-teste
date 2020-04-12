<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::prefix('/')->group(function(){
    // Pagina inicial do sistema.
    Route::get('', function () {
        if(Auth::check()){
            return redirect('/chamados');
        }else{
            return view('welcome');
        }
    });

    // Rota de autenticação.
    Route::get('login', 'AuthController@index');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
});

Route::resource('users', 'UserController');

Route::resource('chamados', 'TicketController')
    ->except(['show']);
Route::resource('comentarios', 'CommentsController')
    ->only(['create', 'store', 'destroy']);
