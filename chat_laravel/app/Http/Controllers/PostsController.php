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
            $posts_data_new=posts::with('user','likes','comments')
            ->orderBy('posts.created_at','desc')
            ->get();
            return $posts_data_new;   //return all posts same as before
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
    public function addComment(Request $request){
        $loggedid=Auth::user()->id;
        $post_id=$request->id;
        $comments = $request->comment;
        $commentInsert=DB::table('comments')
        ->insert([
            'comment'=>$comments,
            'user_id'=>$loggedid,
            'post_id'=>$post_id,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ]);
        if($commentInsert){
            return posts::with('user','likes','comments')->orderBy('created_at','desc')->get(); 
        }
    }
    public function saveImage(Request $request){
        $image=$request->get('image');
        $explodedImg=explode(",",$image);  // ',' cutting
        //extention
        if(str_contains($explodedImg[0],'gif')){  //if explodedImg has gif?
            $ext='gif';
        }else if(str_contains($explodedImg[0],'png')){
            $ext='png';
        }else{
            $ext='jpg';
        }
        //decode    Img64
        $decode=base64_decode($explodedImg[1]);
        $filename=str_random(10).".".$ext;
        //path of your local folder
        $Imgpath=public_path()."/img/".$filename;  //public path to the directory
        //upload image to your path
        if(file_put_contents($Imgpath,$decode)){ // writes a string to a file.
            echo "file scusses ".$filename;

        }  
    }
}
