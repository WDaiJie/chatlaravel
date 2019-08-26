<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
date_default_timezone_set('Asia/Taipei');

class companyController extends Controller
{
    public function index(){
         return view('company.index');
    }
    public function addJobSubmit(Request $request){
        // dd($request->all());     implode  returns a string that is composed of array elements.
        $skills=implode($request->skills,',');
        $contact_email=$request->contact_email;
        $job_title=$request->job_title;
        $requirements=$request->Requirements;
        $loggedid=Auth::user()->id;
        $addJob=Db::table('jobs')->insert([
            'skills'=>$skills,
            'contact_email'=>$contact_email,
            'job_title'=>$job_title,
            'requirements'=>$requirements,
            'company_id'=>$loggedid,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s") 
        ]);
        if($addJob){
            $jobs=DB::table('jobs')->where('company_id',$loggedid)->get();
            return view('company.jobs',compact('jobs'));
        }
    }
    public function viewJobs(){
        $loggedid=Auth::user()->id;
        $jobs=DB::table('jobs')->where('company_id',$loggedid)->get();
        return view('company.jobs',compact('jobs'));
    }
}