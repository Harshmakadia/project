@extends('masterlogin')

@section('content')
	<div class = "container">
		<div class="wrapper">
		
			{!!Form::open(['route' => 'login.store', 'id' => 'myform', 'name' => 'myform', 'method' => 'POST','class' => 'form-signin' , 'files' => true])!!}				
				<h3 class="form-signin-heading">Please Sign In!</h3>
				<hr class="colorgraph"><br>
				@if(Session::has('flash_message'))
							<div class="alert alert-danger">
								{{ Session::get('flash_message')}}
							</div>
				@endif
				<div class="form-group form-group-login">
					<div class="form-group has-feedback">
						
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
							<input type="text" placeholder="Email" name="email" class="form-control" id="email" value={{$loginData['email']}}>
					</div>
					<div class="form-group has-feedback">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<input type="password" placeholder="Password" name="password" class="form-control" id="pwd" value="{{$loginData['password']}}">
					</div>
					<label><input type="checkbox" name="checkMe" value="checked">Remember me</label>
               </div>			  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
			{!!Form::close()!!}			
		</div>
	</div>

<script type="text/javascript"> 

$(document).ready(function() {
	$("#myform").validate({
		rules: {
			email: {
			required: true,
			email: true
			},
			password: {
			required: true,
			minlength: 5
			}
		},
		messages:{
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			email: "Please enter a valid email address"}
	});
});

$(document).ready(function()
{
  $(window).resize(function()
  {
    $('.container').css(
    {
      position: 'absolute'
    });

    $('.container').css(
    {
      left: ($(window).width() - $('.container').outerWidth()) / 2,
      top: ($(window).height() - $('.container').outerHeight()) / 2
    });
  });

   //call `resize` to center elements
  $(window).resize();
});
</script>

@stop