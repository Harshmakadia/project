@extends('masterhome')
@section('content')
   <div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Login History</div>
				<div class="panel-body">
					<div class="first">
						<form class="form-inline" role="form">
							<div class="form-group">
								<label>Search :</label>
								<input type="Search" class="form-control" id="search" placeholder="Enter Name" onkeypress="return tabE(this,Event)">
							</div>
									<div class="form-group">
										<label>Date :</label>
										<input type="text" class="form-control datepicker"onkeypress="return tabE(this,Event)">
									</div>
											<div class="form-group">
												<label>To Date :</label>
												<input type="text" class="form-control datepicker" onkeypress="return tabE(this,Event)">      
												<button type="submit" class="btn btn-success"> GO </button>
						</form>
											</div>
					</div>
	<!-- Modal -->
				</div>
		</div>
    <hr>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>IP Address</th>
        <th>Date Time IST</th>
		<th>Result</th>
      </tr>
    </thead>
    <tbody>
     </tbody>
  </table>
  </div>
 
@stop
