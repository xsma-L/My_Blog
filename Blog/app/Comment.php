<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'post_id', 'user_id', 'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function billet()
    {
        return $this->belongsTo('App\billet', 'post_id');
    }
}
