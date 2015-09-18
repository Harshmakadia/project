@extends('masterhome')
@section('content')
  
    <div class="container">
		@if(Session::has('flash_message'))
							<div class="alert alert-success">
								{{ Session::get('flash_message')}}
							</div>
		@endif
		<div class="panel panel-default">
			<div class="panel-heading">Manage Users</div>
				<div class="panel-body">
					<div class="first" id="right">
							Search<input type="text" name="search" value="">
							<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Create User</button>
					</div>
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Users</h4>
									</div>
										<div class="modal-body">
											{!!Form::open(['route' => 'manageusers.store', 'method' => 'POST', 'files' => true])!!}
												<input type="First" name="FirstName" id="inputfirst" class="form-control" placeholder="First Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="Last" name="LastName" id="inputlast" class="form-control" placeholder="Last Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="Email" name="Email" id="inputemail" class="form-control" placeholder="Email" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
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
    <table class="table table-bordered">
		<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Last Login</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@stop