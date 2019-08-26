<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendships extends Model
{
    //
    public $table = "friendships";
    protected $fillable=['requester','user_requested','status'];
}
