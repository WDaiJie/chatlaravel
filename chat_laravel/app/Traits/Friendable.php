<?php

namespace App\Traits;
use App\friendships;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

trait Friendable{
    public function addfriends($user_id){
        $friendship=friendships::create([ 
            'requester' => $this->id,
            'user_requested' =>$user_id,
        ]);
        if($friendship){
            return $friendship;
        }
        return 'failed';
     }
     public function checkfriendrequest($user_id){
        $check1 = DB::table('friendships')
        ->where('user_requested', '=', $user_id)
        ->where('requester', '=', Auth::user()->id)->get();

        if(empty($check1->toArray())){
            $check2 = DB::table('friendships')
            ->where('requester', '=', $user_id)
            ->where('user_requested', '=', Auth::user()->id)->get();
            if(empty($check2->toArray())){
                return  0;
            }
            else return 2;//Already be Sent
       }
       else{
           return 1;  ////Already Sent
       }
     }
}
