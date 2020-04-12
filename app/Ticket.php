<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'status', 'description', 'client_id'
    ];

    public function displayStatus(){
        switch ($this->status) {
            case '0':
                return 'ABERTO';
            break;

            case '1':
                return 'FECHADO';
            break;
        }
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'ticket_id')
            ->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'client_id');
    }
}
