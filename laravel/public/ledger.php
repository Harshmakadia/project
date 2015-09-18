
<?php
/*$connect = new mysqli("localhost","root","jyadmin123","sas");
if($_GET['type'] == 'ledger'){
	$name_startsWith = $_GET['name_startsWith'];
	$result = $connect->query("SELECT Name,openingbalance FROM ledger where Name like '".$name_startsWith."%'");	
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Name'].'|'.$row['openingbalance'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}*/
$connect = new mysqli("localhost","root","jyadmin123","sas");
if($_GET['type'] == 'ledger'){
	$name = $_GET['name'];
	$openingbalance = $_GET['openingbalance'];
	
	$result = $connect->query("SELECT Name,openingbalance FROM ledger");	
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['Name'].'|'.$row['openingbalance'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}
?>