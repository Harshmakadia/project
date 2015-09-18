<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <!-- <link rel="stylesheet" type="text/css" href="loginpage.css">-->
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
  <script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="additional-methods.min.js"></script>
  <script src="jquery.validate.js"></script>
  <script src="jquery-ui.js"></script>
  <link rel="stylesheet" href="animate.css">
  <script type="text/javascript" src="jquery-1.11.3.min"></script>
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
   
</script> 
</head>

<body>
<div class = "container">
	<div class="wrapper">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Please Sign In!</h3>
			  <hr class="colorgraph"><br>
      <div class="form-group form-group-login">
    <div class="form-group has-feedback">
         <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <input type="text" placeholder="Email" class="form-control" id="email">
       </div>
      <div class="form-group has-feedback">
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <input type="password" placeholder="Password" class="form-control" id="pwd">
      </div>
               <label><input type="checkbox">Remember me</label>
               </div>			  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
		</form>			
	</div>
</div>





<style>
.wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

<script>
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