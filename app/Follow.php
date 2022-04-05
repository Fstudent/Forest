<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'follow_id';//
}
