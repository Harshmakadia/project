@extends('masterhome')
@section('content')

<div class="container">

		
				
				
				<label for="create">Manage Users</label>	
				<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">Create User</button>
			
				
			<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Users</h4>
									</div>
										<div class="modal-body">
											<!--{!!Form::open(['route' => 'manageusers.store', 'method' => 'POST', 'files' => true])!!}-->
											<form>
											 <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="First" name="FirstName" id="FirstName" class="form-control" placeholder="First Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="Last" name="LastName" id="LastName" class="form-control" placeholder="Last Name" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<input type="Email" name="Email" id="Email" class="form-control" placeholder="Email" required="" autofocus="" onkeypress="return tabE(this,Event)"><br>
												<p>Upload Profile Picture</p><input type="file" name="datafile" onkeypress="return tabE(this,Event)">
								        </div>
												<div class="modal-footer">
													<button type="button" id="submit" class="btn btn-danger btn-block" data-dismiss="modal" aria-label="Close">Create</button>
												</div>
											</form>
											<!--{!!Form::close()!!}	-->
											
								</div>
							</div>
						</div>
					
			
		
    <hr>
	<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover keyword" id="myTable" cellspacing="0" cellpadding="0">
		<thead style="
        background-color: #18BC92;
    color: #2C3E50;">
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Last Login</th>
			</tr>
		</thead>
		<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->FirstName }}</td>
						<td>{{ $user->LastName }}</td>
						<td>{{ $user->Email }}</td>
						<td>{{ $user->LastLogin }}</td>
					</tr>			
				@endforeach
			
		
		
		</tbody>
	</table>
	</div>
</div>
		


<script>
$(document).ready(function(){
  $('#submit').click(function(){    
   
          if($('input[name=Email]').val()==''||$('input[name=FirstName]').val()==''||$('input[name=LastName]').val()=='')
		  {
			    alert("Please Enter all fields");
			
		  }			  
		  else
		  {
               $.ajax({
               url: 'adduser',
               type: "post",
               data: {'Email':$('input[name=Email]').val(),'FirstName':$('input[name=FirstName]').val(),'LastName':$('input[name=LastName]').val(), '_token': $('input[name=_token]').val()},
		 });
               alert("Conformation Email Sent"); 
    }     

  }); 
});
</script>
 <script>
$(document).ready(function(){
    $('#myTable').dataTable({
	"" :false }); 
	
});
</script>
<style>
body {
    background-color: #E0FFFF;
}
hr {
border-top: 3px solid #2C3E50;}
</style>
						

@stop
