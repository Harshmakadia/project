<!DOCTYPE html>
<html lang="en">
<head>
	<title>Maruti</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../resources/views/static/css/style.css">
	<link rel="stylesheet" href="../resources/views/static/js/css/screen.css">
	<script src="../resources/views/static/js/lib/jquery.js"></script>
	<script src="../resources/views/static/js/dist/jquery.validate.js"></script>
	
</head>
    <body>
					@yield('content')
    </body>
</html>
<style>
body{
	background-image:url(login.jpg);
}
.glyphicon {
    padding-top: 6px;
}
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
   box-shadow: 11px 11px 12px -1px rgba(0,0,0,0.75);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}
.has-feedback .form-control {
    padding-right: 42.5px;
    border: 0px;
    border-radius: 0px;
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

.container-fluid
{
  background-color:cornflowerblue;
}
.navbar-inverse .navbar-nav>li>a{
color:aquamarine;
}
.navbar-inverse .navbar-brand {
    color: aquamarine;
	    font-size: 18px;
}
.btn-group-lg>.btn, .btn-lg {
   
    border-radius: 0px;
    border: 0px;
	    background: linear-gradient(to bottom, rgba(105, 170, 232, 1) 0%, rgba(38, 51, 235, 1) 100%);
    color: #fff;
    font-family: sans-serif;
}



</style>