<?php
    $msgCount1=DB::table('conversation')
    ->where('status',1)
    ->where('user_one',Auth::user()->id)
    ->count();
    $msgCount2=DB::table('conversation')
    ->where('status',1)
    ->where('user_two',Auth::user()->id)
    ->count();

?>