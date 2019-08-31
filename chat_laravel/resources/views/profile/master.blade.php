<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php use App\Http\Controllers\ProfileController; 
    use App\Http\Controllers\MessagesController; 
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('public/js/app.js') }}" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <script src="https://use.fontawesome.com/595a5020bd.js"></script> -->
    <link rel="stylesheet" href="{{ asset('public/js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
   

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
<style>
.dropdown-item:hover, .dropdown-item:focus {
    color: #16181b;
    text-decoration: none;
    background-color: #ffffff;
}
.sidebarli{
        padding-left:30px; 
        padding-right:5px;
        padding-top:8px;
        padding-bottom:8px
        text-align:justify;
        display: block;
        width:100%;
    }
    .sidebarli:hover{
        background-color: #96a5fb3b;
    }   
</style>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button id="nav-toggle-button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         @auth                         
                            <li><a href="{{ url('/findfriends') }}" style="padding:5px 15px; border-radius:5px; margin:0px">Findfriends</a></li>
                            <li><a href="{{ url('/requestfriends') }}" style="border-radius:5px; margin:0px">My Requests<span style="color:rgb(251, 6, 6); font-weight:bold;
                                       font-size:16px">(<?php echo ProfileController::friendsrequestcount();?>)</span></a></li>                             
                        @endauth  
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a href="{{url('/friends')}}"style="padding:5px 20px; border-radius:5px; margin:0px"><img src="{{asset('public/img/friends.png')}}" width="40px" height="40px"></a>
                            </li>      
                            <li class="nav-item dropdown">
                                <a href="{{url('/messages')}}"style="padding:5px 20px; border-radius:5px; margin:0px">
                                    <img src="{{asset('public/img/message.png')}}" width="40px" height="40px">
                                    <span class="badge" style="background:red; position: relative; top:-7px; left:-22px;"><?php echo MessagesController::messagesCount()?></span>

                                </a>
                            </li>                   
                            <li class="nav-item dropdown">
                                 <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">               
                                    <img src="{{asset('public/img/notification.png')}}" width="40px" height="40px" ><span class="badge" style="background:red; position: relative; top:-2px; left:-20px;">
                                    <?php echo ProfileController::notifications_acceptfriendcount()?></span>
                                </a>      
                                <?php $notes_friends=ProfileController::noticefriends_data()?>           
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="top:50px;width:375px;padding-top:0; padding-bottom:0.5;">    
                                       <p style="margin:0;padding-left:2px;border-bottom: 0.5px solid">Your notice</p>
                                    @foreach($notes_friends['data'] as $notekey)                       
                                        <a href="{{url('/notifications_friends')}}/{{$notekey->id}}" class="dropdown-item"  style="padding-right:0;padding-left:0;padding-top:0; padding-bottom:0;">  
                                            @if($notekey->status==1)
                                            <div  class="col-md-12"  style="background:rgb(203, 206, 245);padding:1px">         
                                            @else
                                            <div   class="col-md-12" style="padding:1px">
                               
                                                @endif
                                                <div class="row" style="top:50px;width:375px; margin:0px">
                                                    <div class="col-md-2" style="padding-left:0px">
                                                        <img src="{{url('/')}}/public/img/{{$notekey->image}}" style="width:60px;height:60px;padding:1px;background:#fff;border:2px solid #eee" class="img-rounded">   
                                                    </div>
                                                    <div class="col-md-10">
                                                        <b style="color:rgb(8, 187, 8);font-size:90%">{{ucwords($notekey->name)}} </b>
                                                        <span style="font-size:90%">{{$notekey->note}}</span><br>
                                                        <small style="color:#90949c"><img src="{{asset('public/img/friends.png')}}" width="18px" height="18px">
                                                        {{date('F j ,Y',strtotime($notekey->created_at))}} at  {{date('g:i a',strtotime($notekey->created_at))}}</small>
                                                    </div>                                       
                                                </div>   
                                                                              
                                        </a> 
                                    @endforeach
                                </div>                                  
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">     
                                    <img src="{{url('/')}}/public/img/{{Auth::user()->image}}" width ="45px" height="45px" class="rounded-circle"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="top:50px;width:330px;position:absolute">
                                    <a class="dropdown-item" href="{{ url('/profile') }}/{{Auth::user()->slug}}">{{ __('Profile') }}</a>   
                                    <a class="dropdown-item" href="{{ url('editProfile') }}">{{ __('Edit Profile') }}</a>                    
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="row"style="padding-top:0px">
            @yield('content')
        </main>
    </div>
    <!-- <script src="../chat_laravel/public/js/profile.js"></script> -->
    <script src="{{ asset('public/js/profile.js') }}"></script>
</body>
</html>
