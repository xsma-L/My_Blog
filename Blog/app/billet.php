<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\billet as Authenticatable;
use Illuminate\Notifications\Notifiable;

class billet extends Model
{
    protected $fillable = [
        'title', 'tags', 'content'
    ];

    public function comments(){
        
        return $this->hasMany('App\Comment', 'post_id');

    }
    
    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
