<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_request extends Model
{

    protected $fillable = [
        'is_approved'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
