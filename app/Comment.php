<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment', 'ticket_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function ticket()
    {
        return $this->belongsTo('App\Ticket', 'ticket_id');
    }
}
