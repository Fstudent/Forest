<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user', 'replies')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //
    //Userに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //Replyに対するリレーション
    public function replies()   
    {
        return $this->hasMany('App\Reply');  
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
