@extends('masterhome')
@section('content')
   <div class="container">
		<label for="loginhistory">Login History</label>
	<!-- Modal -->
			
		
    <hr>
	<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped keyword">
    <thead style="
        background-color: #18BC92;
    color: #2C3E50;">
      <tr>
        <th>Name</th>
        <th>IP Address</th>
        <th>Date</th>
		<th>Result</th>
      </tr>
	  </thead>
	   <tbody>
	  @foreach ($users as $user)
		<tr>
	
			<td>{{ $user->Name }}</td>
			<td>{{ $user->IPAddress }}</td>
			<td>{{ $user->LastLogin }}</td>
			@if (($user->Result) === 1)
				<td>Success</td>
			@else
				<td>Fail</td>
			@endif
			
		</tr>			
	  @endforeach
    
   
     </tbody>
  </table>
  </div>
  
  
  </div>
 
 <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

  
 <style>
 body{
background-color: #E0FFFF;
 }
hr {
border-top: 3px solid #2C3E50;}
 </style>
@stop
