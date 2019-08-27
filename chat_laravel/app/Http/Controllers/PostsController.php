<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Posts;
use App\likes;
use App\Http\Requests;
date_default_timezone_set('Asia/Taipei');
class PostsController extends Controller
{
    public function index(){
        // $posts_data= DB::table('posts')
        // ->leftJoin('profile','profile.user_id','posts.user_id')
        // ->leftJoin('users','users.id','posts.user_id')
        // ->get();
        $posts_data=posts::with('user','likes','comments')->orderBy('created_at','desc')->get();
        return view('welcome',compact('posts_data'));
    }
    public function addnewPost(Request $request){
        $uid=Auth::user()->id;
         $content = $request->content;
         $creatPost=DB::table('posts')
         ->insert(['content'=>$content,'user_id'=>$uid,'status'=>0,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
         if($creatPost){
            // $posts_data_new= DB::table('posts')
            // ->leftJoin('profile','profile.user_id','posts.user_id')
            // ->leftJoin('users','users.id','posts.user_id')
            // ->orderBy('posts.created_at','desc')->take(4)
            // ->select('posts.*','users.name','users.gender','users.slug','users.image','profile.city','profile.country','profile.about')
            // ->get();
            $posts_data_new=posts::with('user','likes')
            ->orderBy('posts.created_at','desc')
            ->get();

            return $posts_data_new;
         }
    }
    public function show(){
        // $posts_data= DB::table('posts')
        // ->leftJoin('profile','profile.user_id','posts.user_id')
        // ->leftJoin('users','users.id','posts.user_id')
        // ->orderBy('posts.created_at','desc')->take(4)
        // ->select('posts.*','users.name','users.gender','users.slug','users.image','profile.city','profile.country','profile.about')
        // ->get();
        // return  $posts_data;
        $posts_data= posts::with('user','likes','comments')
        ->orderBy('posts.created_at','desc')
        ->get();
        return  $posts_data;
    }
    public function deletePost($id){
        $deletePost = DB::table('posts')->where('id',$id)->delete();
        if($deletePost){
            $posts_data=posts::with('user','likes','comments')
            ->orderBy('posts.created_at','desc')
            ->get();
            return  $posts_data;
        }
    }
    public function likePost($id){
        $loggedid=Auth::user()->id;
        $likePost=DB::table('likes')->insert([
            'post_id'=>$id,
            'user_id'=>$loggedid,
            'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Carbon\Carbon::now()->toDateTimeString()
        ]);
        // if like successfully then display like
        if($likePost){
           return posts::with('user','likes','comments')->orderBy('posts.created_at','desc')->get();
        }
    }
    public function likesShow(){
        $likes=likes::all();
        return $likes;
    }
}
