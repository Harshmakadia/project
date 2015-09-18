@extends('masterhome')
@section('content')
 <div class="container">
                 <label for="Ledgers" class="pull-left">Ledger Details</label>
				 
				  
				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">Create Ledger</button>
				<br>
				<br>
				<br>
				@if(Session::has('flash_error'))
				<div class="alert alert-danger">
					{{ Session::get('flash_error')}}
				</div>
				@endif
				@if(Session::has('flash_error1'))
				<div class="alert alert-success">
					{{ Session::get('flash_error1')}}
				</div>
				@endif
	
				
					<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">New Ledger</h4>
									</div>
										<div class="modal-body">
											{!!Form::open(['route' => 'ledger.store', 'id' => 'myform', 'name' => 'myform', 'method' => 'POST','class' => 'form-signin' , 'files' => true])!!}
											<!--<form>-->
											    <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="text" name="Name" id="name" class="form-control" placeholder="Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="text" name="FullName" id="fname" class="form-control" placeholder="Full Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<select class="form-control" id="group" name="Groups" placeholder="group" required="" autofocus="" onkeypress="return tabE(this,Event)">
															<option>Select Group</option>
															<option>Bank Account</option>
															<option>Cash-in-Hand</option>
															<option>Expenses</option>
															<option>Sundry Creditors</option>
															<option>Sundry Debitors</option>
														    <option>Supari A/c</option>
													</select><br>
									          <input type="number" step="any" name="OpeningBalance" id="fname" class="form-control number" placeholder="Opening Balance" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
									 <label><input type="radio" name="CrDr" value="Cr" checked>Credit</label>
											  <label> <input type="radio" name="CrDr" value="Dr">Debit</label>
              
								        </div>
												<div class="modal-footer">
													<button type="submit" id="submit" class="btn btn-danger btn-block">Create</button>
												</div>
											<!--</form>-->
											{!!Form::close()!!}
								</div>
							</div>
						</div>
			
	
			<div class="table-responsive">
			 <table class="table table-bordered table-striped table-hover keyword" cellspacing="0" cellpadding="0" id="myTable">
		<thead style="
        background-color: #18BC92;
    color: #2C3E50;">
			<tr>
				<th>Name</th>
				<th>Full Name</th>
				<th>Group</th>
				<th>Opening Balance</th>
				<th>Cr/Dr</th>
			</tr>
		</thead>
			 <tbody>
		       @foreach ($users as $user)
					<tr>
						<td>{{ $user->Name }}</td>
						<td>{{ $user->FullName }}</td>
						<td>{{ $user->Groups }}</td>
						<td>{{ abs($user->OpeningBalance) }}</td>
						<td>{{ $user->CrDr }}</td>
					</tr>			
				@endforeach
         </tbody>
		  </table>
		  </div>
		   
</div>
 <script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true
    } );
} );
/*$(document).ready(function(){
	
$("#myTable").jsGrid({
    width: "100%",
    height: "400px",
 
    filtering: true,
    editing: true,
    sorting: true,
    paging: true
});
});*/
 

</script>
<!--<script>
$(document).ready(function(){
  $('#submit').click(function(){    
   
          if($('input[name=Name]').val()==''||$('input[name=FullName]').val()==''||$('input[name=Groups]').val()==''||$('input[name=OpeningBalance]').val()==''||$('input[name=CrDr]').val()=='')
		  {
			    alert("Please Enter all fields");
		  }			  
		  else
		  {
               $.ajax({
               url: 'ledger',
               type: "post",
               data: {'Name':$('input[name=Name]').val(),'FullName':$('input[name=FullName]').val(),'Group':$('input[name=Group]').val(),'OpeningBalance':$('input[name=OpeningBalance]').val(),'CrDr':$('input[name=CrDr]').val(), '_token': $('input[name=_token]').val()},
			      });
      
    }     

  }); 
});
</script>-->
<style>
body {
    background-color: #E0FFFF;
}
hr {
border-top: 3px solid #2C3E50;}
</style>

@stop
