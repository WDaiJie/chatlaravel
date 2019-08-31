@extends('profile.master')
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Reset Password</div>
                  <div class="panel-body">
                        <form method="post" action="{{url('/setnewPassword')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{$data[0]->email}}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="email" class="form-control" value="{{$data[0]->email}}">
                                <input type="password" name="pass" class="form-control" placeholder="enter new password"><br>                               
                            </div>
                            <div class="col-md-6" style="margin-left:243px">                        
                                <input type="password" name="confrim_pass" class="form-control" placeholder="enter password again">
                            </div>
                        </div>                     
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>

  </div>
</div>
@endsection
