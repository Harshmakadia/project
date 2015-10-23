@extends('masterhome')
@section('content')

<h2><label for="payment" class="label label-primary pull-left" id="label">Payment</label></h2>
	<input type="text" class="datepicker pull-right" id="datepicker">
{!!Form::open(['route' =>'payment.store','id' =>'form-search','name'=>'myform','method' =>'POST','class' => 'form-signin' , 'files' => true , 'autocomplete' => 'off'])!!}
	<div class="container">
		<br>
		<br>
		<?php $users = DB::table('ledger')->select('name','openingbalance')->get();
		  $var = json_encode($users);	?>
	 
	 
		<form class="formData">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th class="resizeHeading" >Cr/Dr</th>
						<th class="resizeHeading">Name</th>
						<th class="resizeHeading">Amount</th>
						<th class="resizeHeading">Balance</th>
						<th class="resizeHeading">Delete</th>		  
					</tr>
				</thead>
			</table>
		</form>
	</div>
	
		<input type="button" value="Submit Entries" id="add" class="btn btn-success center-block"/>
		<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="label">Delete Entry!</h4>
					</div>
					<div class="modal-body">
						Are you sure you want to delete?
					</div>
					<div class="modal-footer">
						<a class="btn btn-danger" class="delete" id="delete" data-dismiss="modal">Delete</a>
						<a class="btn btn-default" class="cancel" id="cancel" data-dismiss="modal">Cancel</a>  
					</div>
				</div>
			</div>
		</div>
  </body>

{!!Form::close()!!}

<style>
table.dataTable tbody td {
    padding: 8px 10px;
 
}

.modal {
}
.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: 100%;
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
}
body {
    background-color: #E0FFFF;
}
hr {
border-top: 3px solid #2C3E50;}

.dataTables_empty {
 display:none;
}

.ui-autocomplete {
  max-height: 100px;
  overflow-y: auto;
  /* prevent horizontal scrollbar */
  overflow-x: hidden;
}

* html .ui-autocomplete {
  height: 100px;
}

input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0px 1000px white inset;
}

.glyphicon-remove {
  color:red;
  
}
table.dataTable {
  border-collapse: collapse;
}
body
{
  background-color:aliceblue;
}
#datepicker
{
  margin-right: 12px;
  width: 90px;
}
#label
{
  margin-left: 13px;
}     
#add
{
 /* width: 430px; */

 margin-top: 18px;
}
</style> 
<style>
.dataTables_empty {
 display:none;
}
</style>

<script>
	var PaymentDetailData = {!! $var !!};
</script>
<script src="../resources/views/static/js/payment.js"></script>
@stop


