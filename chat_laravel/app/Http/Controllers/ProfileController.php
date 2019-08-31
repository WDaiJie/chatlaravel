<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;   
use App\Http\Requests;
use App\Profile;
use App\friendships;
use App\User;
use App\notifcations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
/**
 * @SWG\Swagger(
 *     @OA\Info(title="My Swagger", version="0.1")
 * )
 */
class ProfileController extends Controller
{
    
    public function index($slug){   
        $user_id=Auth::user()->id; 
        $data['data']=DB::table('users')->leftJoin('profile','users.id','=','profile.user_id')->where('users.id',$user_id)->get();
        $userData =DB::table('users')
        ->leftJoin('profile','users.id','=','profile.user_id')  
        ->where('slug',$slug)
        ->get();
    	return view('profile.index',compact('userData'))->with($data);
    }
    public function uploadPhoto(Request $request){
        // dd($request->all());
        $file=$request->file('pic');
        $filename=$file->getClientOriginalName();
        $path='public/img';
        $file->move($path,$filename);
        $user_id=Auth::user()->id; 
        DB::table('users')->where('id',$user_id)->update(['image' => $filename]);
            // return view('profile.index');
        // return redirect('/profile');
        return back();
    }
    public function edit()
    {
        $user_id=Auth::user()->id; 
        $data['data']=DB::table('users')->leftJoin('profile','users.id','=','profile.user_id')->where('users.id',$user_id)->get();
        // dd($data);
        return view('profile.editProfile')->with($data);
    }
    public function  updateProfile(Request $request){
        
        $user_id=Auth::user()->id;
        DB::table('profile')->where('user_id',$user_id)->update($request->except('_token'));
        return back();        

    }
    public function frindfriends(){
        $userid=Auth::user()->id;
        $allusers=DB::table('profile')
        ->leftJoin('users','users.id','=','profile.user_id')
        ->where('users.id','!=',$userid)->get();
        // dd($allusers);
        return view('profile.frindfriends',compact("allusers"));
    }
    public function sendFriends($user_id){
        // echo $user_id;
         Auth::user()->addfriends($user_id);       //friendszble trait
         return back();
    }
    public function requestfrienfs(){
        $uid=Auth::user()->id;
        $FriendRequests =DB::table('friendships')
        ->rightJoin('users','users.id','=','friendships.requester')->where('status','0') //who request 
        ->where('friendships.user_requested','=',$uid)->get(); //who logged
        return view('profile.requestfriends',compact('FriendRequests'));
    }
    public function acceptfriend($name,$id){
        $uid=Auth::user()->id;
        $checkRequest=friendships::where('requester',$id) //who request
        ->where('user_requested',$uid)->first();
        if($checkRequest){
            $updateFriendship=DB::table('friendships')
            ->where('user_requested', $uid) //logged id
            ->where('requester',$id) // request id
            ->update(['status' => 1]);         

            $notifications=new notifcations;
            $notifications->user_hero=$id;  //acept my request
            $notifications->user_logged=$uid; //logged id
            $notifications->note='accept your friend request'; 
            $notifications->status='1'; //unread notifications
            $notifications->save();

            if($notifications){
                return back()->with('data','You are now Friends with <b>'.$name.'</b>');
            }
        }else{
            return back()->with('data','no friends');
        }

    }
    public function friends(){
        $uid=Auth::user()->id;
        $requestfriends=DB::table('friendships') //requester
        ->leftJoin('users','users.id','=','friendships.user_requested') //send request id
        ->where('status',1)
        ->where('requester',$uid)//logged id
        ->get();       

        $acceptfriends=DB::table('friendships')
        ->leftJoin('users','users.id','=','friendships.requester')
        ->where('status',1)
        ->where('user_requested',$uid)->get();      
        $friendsmerge=array_merge($acceptfriends->toArray(),$requestfriends->toArray());
       
        return view('profile.myfriends',compact('friendsmerge'));
    }
    public function requestremovefriend($id){
        $uid=Auth::user()->id;
        DB::table('friendships')->where('user_requested',$uid)->where('requester',$id)->delete();
        return back()->with('data','Request has been deleted');
    }
    public static function notifications_acceptfriendcount(){
        $uid=Auth::user()->id;
        $notice_count=DB::table('notifcations')->where('status', 1)
        ->where('user_hero', $uid)
        ->count();
        return $notice_count;
    }
    public static function friendsrequestcount(){
        $uid=Auth::user()->id;
        $request_friends_count=DB::table('friendships')->where('status',0)->where('user_requested',$uid)->count();
        return $request_friends_count;
    }
    public static function noticefriends_data(){
        $uid=Auth::user()->id;
        $data=DB::table('users')
        ->leftJoin('notifcations','users.id','=','notifcations.user_logged')
        ->where('user_hero',$uid)
        // ->where('status',1)     //unread notice
        ->orderBy('notifcations.created_at','DESC') 
        ->get();
        return compact('data');
    }
    public function notifications_friends($id){
        $uid=Auth::user()->id;
        $note_friends=DB::table('notifcations')
        ->leftJoin('users','users.id','=','notifcations.user_logged')
        ->where('notifcations.id',$id)
        ->where('user_hero',$uid)
        ->orderBy('notifcations.created_at','DESC') 
        ->get();

        $updateNotifcation=DB::table('notifcations')
        ->where('id', $id) 
        ->update(['status' => 0]);     
        return view('profile.notifcationsfriends',compact('note_friends'));
    }
    public function removefriend($name,$id){
        $uid=Auth::user()->id;
        DB::table('friendships')
        ->where('user_requested',$uid)
        ->where('requester',$id)
        ->where('status',1)
        ->delete();
        DB::table('friendships')
        ->where('user_requested', $id)
        ->where('requester', $uid)
        ->where('status',1)
        ->delete();
        DB::table('notifcations')
        ->where('user_logged', $uid)
        ->where('user_hero', $id)
        ->where('note','accept your friend request')
        ->delete();
        DB::table('notifcations')
        ->where('user_logged', $id)
        ->where('user_hero', $uid)
        ->where('note','accept your friend request')
        ->delete();
        return back()->with('data','You are not Friends with <b>'.$name.'</b>'); 
    }
    public function setToken(Request $request){
        $email=$request->email_address;
        $checkEmail=DB::table('users')->where('email',$email)->get();   //check any user have this email email_address
        if(count($checkEmail)==0){
            echo "wrong email address.";
        }else{
            // echo "send reset link to this email link.";
            $randomNumber=rand(1,500);
            $tokens=Hash::make($randomNumber);  
            $tokens2=stripslashes($tokens);  
            $token=str_replace('/','',$tokens2);
            $fetche=DB::table('password_resets')->where('email',$email)->get();
            if(count($fetche)==0){
                $insert_token=DB::table('password_resets')
                ->insert(['email'=>$email,'token'=>$token,'created_at'=>\Carbon\Carbon::now()->toDateTimeString()]);
            }else{
                DB::table('password_resets')
                ->where('email',$email)
                ->update(['token'=>$token,'created_at'=>\Carbon\Carbon::now()->toDateTimeString()]);
            }
            $baseUrl='http://localhost/chat_laravel/getToken/'.$token;
            $To=$email;
            $subject="I am W.DJ is chat_laravel's Computer engineer.<br>
            If Password reset Please,go to link";
            $message="<a href='$baseUrl'>$token</a>";// Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";// More headers
            $headers .= 'From:<1041241220@stu.nkmu.edu.tw>' . "\r\n";
            mail($To,$subject,$message,$headers);
            if( mail($To,$subject,$message,$headers)){
                $arr="mail send scusses GO to your email";
                echo $arr;
            }else{
                $arr="mail error";
                echo $arr;
            }
        }
    }
    public function getToken($token){
       
        if(isset($token)&& $token!=""){  //token is right or wrong
            $getdata=DB::table('password_resets')->where('token',$token)->get();
            if(count($getdata)!=0){
               return view('profile.setPassword')->with('data',$getdata);
            }else{
                echo "token is wrong";
            }
        }else{
            echo "token not found";
        }

    }
    public function setnewPassword(Request $request){
        $email=$request->email;
        $pass=$request->pass;
        $cpass=$request->confrim_pass;
        if($pass==$cpass){
            DB::table('users')->where('email',$email)->update(['password'=>Hash::make($pass)]); //update the pass for this
            return view('auth.login');
        }else{
            echo "passwords not matched";
        }
    }
    public function jobs(){
        $jobs = DB::table('users')
        ->Join('jobs','users.id','jobs.company_id')
        ->get();
        return view('profile.jobs', compact('jobs'));
      }
  
      public function jobkey($id){
        $jobs = DB::table('users')
        ->leftJoin('jobs','users.id','jobs.company_id')
        ->where('jobs.id',$id)
        ->get();
        return view('profile.job', compact('jobs'));
      }
}
