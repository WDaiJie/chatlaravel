<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Messages;
use App\Http\Requests;
date_default_timezone_set('Asia/Taipei');
class MessagesController extends Controller
{
    public function  getMessages(){
        $loggedid=Auth::user()->id;
        $alluers1=DB::table('users')
        ->Join('conversation','users.id','conversation.user_one')
        ->where('conversation.user_two',$loggedid)
        ->get();
        $alluers2=DB::table('users')
        ->Join('conversation','users.id','conversation.user_two')
        ->where('conversation.user_one',$loggedid)
        ->get();
        return  array_merge($alluers1->toArray(),$alluers2->toArray());
    }
    public function showsendMessages($cov_id){ 
        $loggedid=Auth::user()->id;
        // $checkCon=DB::table('conversation')
        // ->where('user_one',$loggedid)
        // ->where('user_two',$id)
        // ->get();
         
        // if(count($checkCon)!=0){
        //     //fetch msgs
        //     $userMsg=DB::table('messages')->where('messages.conversation_id',$checkCon[0]->id)->orderBy('messages.created_at','ASC') ->get();
        //     return $userMsg;

        // }else{
        //     echo "no msg";
        // } 
        $update_status = DB::table('conversation')->where('id',$cov_id)
        ->update([
            'status' => 1 // now read by user
        ]);
        $userMsg=DB::table('messages')
        ->join('users','users.id','messages.user_from')  //from userid
        ->where('messages.conversation_id',$cov_id)          //covsar_id
        ->get();
        return $userMsg;
    }
    public function sendPrivMessages(Request $request){
        $loggedid=Auth::user()->id;
        $converId =$request->converID;
        $msg=$request->msg;
        $fetchTomsg=DB::table('messages')
        ->where('conversation_id',$converId)
        ->where('user_to','!=',$loggedid)
        ->get();
        $userTo=$fetchTomsg[0]->user_to;
        $sendMsg=DB::table('messages')
        ->insert([
            'user_to'=>$userTo,
            'user_from'=>$loggedid,
            'msgs'=>$msg,
            'status'=>1,
            'conversation_id'=>$converId,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
            ]);
        if($sendMsg){
            $userMsg=DB::table('messages')
            ->join('users','users.id','messages.user_from')  
            ->where('messages.conversation_id',$converId)          
            ->get();
            return $userMsg;
        }
    }
    public function newMessage(){
        $uid = Auth::user()->id;
        $friends1 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.user_requested') // who is not loggedin but send request to
                ->where('status', 1)
                ->where('requester', $uid) // who is loggedin
                ->get();
        $friends2 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.requester')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();
        return  array_merge($friends1->toArray(), $friends2->toArray());
    }
    public function sendNewMessage(Request $request){
        $msg=$request->msg;
        $friend_id=$request->friend_id;
        $loggedid=Auth::user()->id;     
        $checkCon1=DB::table('conversation')    // check if conversation already  started or not
        ->where('user_one',$loggedid)        //if loggedin user started conversation
        ->where('user_two',$friend_id)
        ->get();

        $checkCon2=DB::table('conversation')
        ->where('user_one',$friend_id)     //if loggedin received messagefirst
        ->where('user_two',$loggedid)
        ->get();
        $allCons=array_merge($checkCon1->toArray(),$checkCon2->toArray());
     
        if(count($allCons)!=0){     //old conversation
            $conId_old=$allCons[0]->id;
            $MsgSent=DB::table('messages')  // insert data into messages iterable
            ->insert([
                'user_from'=>$loggedid,
                'user_to'=>$friend_id,
                'msgs'=>$msg,
                'conversation_id'=>$conId_old,
                'status'=>0,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
        }else{//new conversation
            $conId_new=DB::table('conversation')->insertGetID([
                'user_one'=>$loggedid,'user_two'=>$friend_id,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")
            ]);
            $MsgSent=DB::table('messages')
            ->insert([
                'user_from'=>$loggedid,
                'user_to'=>$friend_id,
                'msgs'=>$msg,
                'conversation_id'=>$conId_new,
                'status'=>0,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]);
        }
    }
    public static function  messagesCount(){
        $loggedid=Auth::user()->id;
        $msgCount1=DB::table('conversation')
        ->where('status',0)
        ->where('user_one',$loggedid)
        ->count();
        $msgCount2=DB::table('conversation')
        ->where('status',0)
        ->where('user_two',$loggedid)
        ->count();
        return $msgCount1+$msgCount2;
    }
}
