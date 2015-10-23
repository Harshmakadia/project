<!DOCTYPE HTML>
 <html lang="en">
 <head>
   <title>Maruti</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"> 
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="../resources/views/static/js/underscore-min.js"></script>
   <script type="text/javascript" src="../resources/views/static/js/common/common.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.8/datatables.min.css"/>
  <!-- <link rel="stylesheet" type="text/css" src="../resources/views/static/css/payment.css"/>
   <script src="../resources/views/static/js/payment.js"></script>-->
   <!--<script src="../resources/views/static/js/script.js"></script>
  <script>
		     function tabE(obj, e) {
        var e = (typeof event != 'undefined') ? window.event : e; // IE : Moz 
        if (e.keyCode == 13) {
            var ele = document.forms[0].elements;
            for (var i = 0; i < ele.length; i++) {
                var q = (i == ele.length - 1) ? 0 : i + 1; // if last element : if any other 
                if (obj == ele[i]) {
                    ele[q].focus();
                    break
                }
            }
            return false;
        }}
</script>-->
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.8/datatables.min.js"></script>

   <!--<script src="../resources/views/static/js/datapicker.js"></script>-->
   <script>
       $(document).ready(
			/* This is the function that will get executed after the DOM is fully loaded */
		function () {
			 $("#datepicker").datepicker().datepicker('setDate',new Date());
			$( ".datepicker").datepicker({
			changeMonth: true,//this option for allowing user to select month
			changeYear: true //this option for allowing user to select from year range
				});
			}
		);
	</script>

<script><!--This script is for entering comma between numbers-->
$('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});
</script>



</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" style="color: #18BC9C;font-size:25px;" href="#">Maruti</a>
				</div>

				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Master <span class="caret"></span></a>
							<ul class="dropdown-menu" style="background-color: #2C3E50;">
															<li><a href="{{ URL::to('ledger') }}"><span class="glyphicon glyphicon-tasks"></span> Ledgers</a></li>
								<li class="divider">
								<li><a href="{{ URL::to('loginhistory') }}"><span class="glyphicon glyphicon-briefcase"></span> Account</a></li>
							</ul>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Voucher Entry <span class="caret"></span></a>
						<ul class="dropdown-menu" style="background-color: #2C3E50;">
							<li><a href="{{ URL::to('payment') }}"><span class="glyphicon glyphicon-file"></span> Payment</a></li>
							<li class="divider">
							<li><a href="#"><span class="glyphicon glyphicon-record"></span> Journal</a></li>
							<li class="divider">
							<li><a href="#"><span class="glyphicon glyphicon-th-list"></span> Receipt</a></li>
						</ul>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Display <span class="caret"></span></a>
					<ul class="dropdown-menu" style="background-color: #2C3E50;">
						<li><a href="#"><span class="glyphicon glyphicon-tasks"></span> Day Book</a></li>
						<li class="divider">
						<li><a href="#"><span class="glyphicon glyphicon-book"></span> Sales</a></li>
						<li class="divider">
						<li><a href="#"><span class="glyphicon glyphicon-stats"></span> Profit/Loss <span class="glyphicon glyphicon-charts"></span> </a></li>
						<li class="divider">
						<li><a href="{{ URL::to('viewpayment') }}"><span class=""></span>View Payment Entries </a></li>
					</ul>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <span class="caret"></span></a>
					<ul class="dropdown-menu" style="background-color: #2C3E50;">
						<li><a href="{{ URL::to('manageusers') }}"><span class="glyphicon glyphicon-pencil"></span> Manage Users</a></li>
						<li class="divider">
						<li><a href="{{ URL::to('loginhistory') }}"><span class="glyphicon glyphicon-cog"></span> Login History</a></li>
					</ul>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<div class="profilebutton">
					<div class="dropdown dropdown1" style="background-color: #2C3E50;">
						<button class="btn btn-default profile" type="button" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
										Profile<span class="caret"></span></button>
							<ul class="dropdown-menu" style="background-color: #2C3E50;">
								<li><a href="#"><span class="glyphicon glyphicon-user"></span> User Stats </a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Account Setting</a></li>
								<li class="divider"></li>
								<li><a href="{{ URL::route('home.show') }}"><span class="glyphicon glyphicon-log-out"></span> Logout  </li></a>
							</ul>
					</div>
				</ul>
				</div>
				</div>
			</div>
		</nav>

	
    @yield('content')
</body>
</html>


<script>

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(10).fadeIn(10);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(10).fadeOut(10);
});

</script>


<style>
.profilebutton
{
	padding-top: 8px;
}
.navbar-default {
    background-color: #2C3E50;
	 border: 0;
    border-radius: 0;
    box-shadow: 0px 2px 14px 0px rgba(0,0,0,0.75);
    padding: 10px 0;
	}

.navbar-default .navbar-nav>li>a {
    color: #FFFFFF;
	    font-size: 16px;}
	
.navbar-default .navbar-nav>li>a:hover {
    color: #18BC9C;}
	
.dropdown-menu>li>a {
    color: white;
	backgroung-color:#2C3E50;}
.dropdown-menu>li>a:hover{


 backgroung-color:#2C3E50;
 color:#18BC9C;}
 
 .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
    background-color: #2C3E50;}
	
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: white;
    background-color: #2C3E50;
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #2C3E50 ;
    border-color: #337ab7;
}

@media (max-width: 767px) {
.navbar-default .navbar-nav .open .dropdown-menu>li>a {
    color: white;}
.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
	color:#18BC9C;
}
.button{
	padding-top : 8px;
}
@media (max-width: 767px){
	.dropdown-menu {
    width: 1000px !important;
   
}
}
	</style>
