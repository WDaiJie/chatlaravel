<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
get: after the address (URL)
post:send the form data to the message-body
*/


Route::get('/', 'PostsController@index');
Route::group(['middleware', 'auth'],function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{slug}', 'ProfileController@index')->name('profile');
    Route::get('/changePhoto',function(){
        return view('profile.pic');
    });
    Route::post('/uploadPhoto','ProfileController@uploadPhoto');
    Route::get('editProfile','ProfileController@edit');    
    Route::post('/updateProfile','ProfileController@updateProfile');
    Route::get('/findfriends','ProfileController@frindfriends');
    Route::get('/addfriends/{id}','ProfileController@sendFriends');
    Route::get('/requestfriends','ProfileController@requestfrienfs');
    Route::get('/acceptfriend/{name}/{id}','ProfileController@acceptfriend');
    Route::get('/friends','ProfileController@friends');
    Route::get('/requestremovefriend/{id}','ProfileController@requestremovefriend');
    Route::get('/noticefriends_data/{id}','ProfileController@notifications_friends');
    Route::get('/removefriend/{name}/{id}','ProfileController@removefriend'); 
    Route::get('/getMessages','MessagesController@getMessages');
    Route::get('/getMessages/{id}','MessagesController@showsendMessages');
    Route::post('/sendMessages','MessagesController@sendPrivMessages');
    Route::post('/sendNewMessage', 'MessagesController@sendNewMessage');
    Route::get('/newMessagefriendli','MessagesController@newMessage');
    Route::get('/newMessage',function(){
        return view ('newMessage');
    });
    Route::post('/addnewPost','PostsController@addnewPost');
    // forgot password
    Route::get('/forgotPassword',function(){
        return view ('profile.forgotPassword');
    });
    Route::get('/messages',function(){
        return view ('messages');
    });
    Route::get('/getToken/{token}','ProfileController@getToken');
    Route::post('/setToken','ProfileController@setToken');
    //set new password
    Route::post('/setnewPassword','ProfileController@setnewPassword');
    Route::get('/posts','PostsController@show');
});
Route::group(['prefix'=>'company','middleware'=>['auth','company']],function () {   
    Route::get('/','companyController@index');
    Route::get('/addJobFrom',function () {
        return view ('company.addJob');
    });
    Route::get('/jobs','companyController@viewJobs');
    Route::post('addJobSubmit','companyController@addJobSubmit');
});
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function () {   
    Route::get('/','adminController@index');    
});
Route::get('/logout','Auth\LoginController@logout');

Auth::routes();
