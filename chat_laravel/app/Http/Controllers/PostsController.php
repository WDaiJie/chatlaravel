<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\post;
use App\Http\Requests;
date_default_timezone_set('Asia/Taipei');
class PostsController extends Controller
{
    public function index(){
        $posts_data= DB::table('posts')
        ->leftJoin('profile','profile.user_id','posts.user_id')
        ->leftJoin('users','users.id','posts.user_id')
        ->get();
        return view('welcome',compact('posts_data'));
    }
    public function addnewPost(Request $request){
        $uid=Auth::user()->id;
         $content = $request->content;
         $creatPost=DB::table('posts')
         ->insert(['content'=>$content,'user_id'=>$uid,'status'=>0,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
         if($creatPost){
            $posts_data_new= DB::table('posts')
            ->leftJoin('profile','profile.user_id','posts.user_id')
            ->leftJoin('users','users.id','posts.user_id')
            ->orderBy('posts.created_at','desc')->take(2)
            ->get();
            return $posts_data_new;
         }
    }
    public function show(){
        $posts_data= DB::table('posts')
        ->leftJoin('profile','profile.user_id','posts.user_id')
        ->leftJoin('users','users.id','posts.user_id')
        ->orderBy('posts.created_at','desc')->take(4)
        ->get();
        return  $posts_data;
    }
}
