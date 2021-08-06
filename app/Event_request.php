<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_request extends Model
{
    public function post()
    {
        return $this->belongTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
