@extends ('layouts.dashboard')
@section('page_heading','Add user')
@section('section')

<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-7">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error }}</li>
				@endforeach
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-7">
			<form class="form-horizontal" role="form" method="post" action="{{url("/create_user")}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label for="name" class="col-md-4 control-label">Name</label>
					<div class="col-md-8">
						<input id="name" type="text" class="form-control" name="username" value="" required="" autofocus="">
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-md-4 control-label">E-Mail Address</label>
					<div class="col-md-8">
						<input id="email" type="email" class="form-control" name="email" value="" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Password</label>
					<div class="col-md-8">
						<input id="password" type="password" class="form-control" name="password" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
					<div class="col-md-8">
						<input id="password-confirm" type="password" class="form-control" name="confirm_password" required="">
					</div>
				</div>

				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Add</button>
					<a href="{{url("/user_control")}}">
						<button type="button" class="btn btn-primary">Cancel</button>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

@stop
