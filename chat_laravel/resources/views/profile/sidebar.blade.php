<div class="col-md-3" style="position:fixed;left:0px;margin-top:20px;margin-bottom:20px;">
    <div class="card">
        <div class="card-header">Sidebar Link</div>
             @if(Auth::check())
                <div class="sidebarli"> 
                    <a href="{{ url('/profile')}}/{{Auth::user()->slug}}"><img src="{{Config::get('app.url')}}/public/img/{{Auth::user()->image}}"width="40" style="margin:10px"/>{{Auth::user()->name}}</a>
                </div>
                <div class="sidebarli"> 
                    <a href="{{url('/')}}"> <img src="{{Config::get('app.url')}}/public/img/newsfeed.png"width="40" style="margin:10px"/>News Feed</a>
                </div>
                <div class="sidebarli"> 
                    <a href="{{url('/friends')}}"> <img src="{{Config::get('app.url')}}/public/img/friends.png"width="40" style="margin:10px"/> Friends </a>
                </div>
                <div class="sidebarli"> 
                    <a href="{{url('/messages')}}"> <img src="{{Config::get('app.url')}}/public/img/message.png"width="40" style="margin:10px"/>Messages</a>
                </div>
                <div class="sidebarli"> 
                    <a href="{{url('/findfriends')}}"> <img src="{{Config::get('app.url')}}/public/img/findfriend.png"width="40" style="margin:10px"/>Find Friends</a>
                </div>
                <div class="sidebarli"> 
                    <a href="{{url('/jobs')}}"> <img src="{{Config::get('app.url')}}/public/img/findjob.png"width="40" style="margin:10px"/>Find Jobs</a>
                </div>                     
            @endif      
    </div>
</div>