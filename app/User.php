<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'profile_type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function displayType()
    {
        switch ($this->profile_type) {
            case '0':
                return 'USUÁRIO';
                break;

            case '1':
                return 'ADMINISTRADOR';
                break;

            case '2':
                return 'CLIENTE';
                break;

            case '3':
                return 'FUNCIONARIO';
                break;
        }
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'client_id');
    }
}
