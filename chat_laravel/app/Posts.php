<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $table = "posts";     
    //create relation users and posts 
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function likes(){
        return $this->hasMany(likes::class,'post_id');
    }
    public function comments(){
        return $this->hasMany(comments::class,'post_id');
    }

}
