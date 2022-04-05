<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];//
    //Postに対するリレーション
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    //Userに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
