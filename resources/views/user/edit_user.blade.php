@extends ('layouts.dashboard')
@section('page_heading','Edit user')
@section('section')

<div class="col-sm-12">
	<div class="row">
        <div class="col-sm-7">
            <form class="form-horizontal" role="form" method="post" action="{{url($userData["id"]."/update_user")}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="username" value="{{$userData["name"]}}" required="" autofocus="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" value="{{$userData["email"]}}" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">New password</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Confirm new password</label>
                    <div class="col-md-8">
                        <input id="confirm-password" type="password" class="form-control" name="confirm_password" value="">
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{url("/user_control")}}">
                        <button type="button" class="btn btn-primary">Cancel</button>
                    </a>
                </div>
            </form>
        </div>
	</div>
</div>

@stop
