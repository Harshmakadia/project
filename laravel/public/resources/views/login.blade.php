<!doctype html>
<html>
<head>
<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
{!! Form::open(array('url' => 'login','class' => 'form-horizontal')) !!}
<h1>Login</h1>
@if(Session::has('error'))
<div class="alert-box success">
  <h2>{!! Session::get('error') !!}</h2>
</div>
@endif

<div class="control-group">
	<div class="controls">
		{!! Form::text('email','',array('id'=>'','id'=>'inputEmail','placeholder' => 'Email')) !!}
	</div>
<p class="errors">{{$errors->first('email')}}</p>
</div>
<div class="control-group">
	<div class="controls">
		{!! Form::password('password',array('id'=>'inputPassword', 'placeholder' => 'Password')) !!}
	</div>
<p class="errors">{{$errors->first('password')}}</p>
</div>
<p>{!! Form::submit('Login', array('class'=>'btn btn-primary')) !!}</p>
{!! Form::close() !!}
</body>
</html>