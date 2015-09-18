@extends('masterhome')
@section('content')
  
    <div class="container">
		@if(Session::has('flash_message'))
							<div class="alert alert-success">
								{{ Session::get('flash_message')}}
							</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading">Ledger</div>
				<div class="panel-body">
					<div class="first" id="right">
							Search<input type="text" id="search" name="search" value="">
							<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Create Ledger</button>
					</div>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">New Ledger</h4>
									</div>
										<div class="modal-body">
											{!!Form::open(['route' => 'manageusers.store', 'method' => 'POST', 'files' => true])!!}
												<input type="Name" name="name" id="name" class="form-control" placeholder="Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="Fname" name="fname" id="fname" class="form-control" placeholder="Full Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												
													<select class="form-control" id="group" name="Group" placeholder="group" required="" autofocus="" onkeypress="return tabE(this,Event)">
															<option>Select Group</option>
															<option>Bank Account</option>
															<option>Cash-in-Hand</option>
															<option>Expenses</option>
															<option>Sundry Creditors</option>
															<option>Sundry Debitors</option>
														     <option>Supari A/c</option>
															</select><br>
										
												<input type="text" name="obalance" id="fname" class="form-control number" placeholder="Opening Balance" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
											    <label><input type="radio" name="bal" value="credit" checked>Credit</label>
											   <label> <input type="radio" name="bal" value="debit">Debit</label>
              
								        </div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-danger btn-block">Create</button>
												</div>
											{!!Form::close()!!}	
								</div>
							</div>
						</div>
				</div>
		</div>
    <hr>
    <table class="table table-bordered table-striped table-hover" id="keyword" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th><span>Name</span></th>
				<th><span>Full Name</span></th>
				<th><span>Group<span></th>
				<th><span>Opening Balance</span></th>
				<th><span>Cr/Dr</span></th>
			</tr>
			</thead>
			<tbody>
			
			<tr>
			     <td>Paul</td>
				 <td>Peter Paul</td>
				 <td>Sundry Creditors</td>
				 <td>1000</td>
				 <td>cr</td>
		    </tr>
			      
		    <tr>
			     <td>john</td>
				 <td>john doe</td>
				 <td>Sundry Debitors</td>
				 <td>10000</td>
				 <td>dr</td>
		    </tr>
		   <tr>
			     <td>Max</td>
				 <td>Max Alex Johnson </td>
				 <td>Sundry Debitors</td>
				 <td>1000333</td>
				 <td>dr</td>
		    </tr>
			<tr>
			     <td>Lionel</td>
				 <td>Messi</td>
				 <td>Sundry Debitors</td>
				 <td>10012120</td>
				 <td>dr</td>
		    </tr>
		
				
	
		
		</tbody>
	</table>
</div>
@stop
