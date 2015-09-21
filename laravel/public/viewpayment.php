<?php
    //open connection to mysql db
    $connection = mysqli_connect("localhost","root","jyadmin123","sas") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from transaction_details";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $ledger = array();
    /*while($row =mysqli_fetch_assoc($result))
    {
        $ledger[] = $row;
    }*/
	while($row = $result->fetch_assoc())
	{
        print_r($row['ledger']."-".$row['amount']."</br>");
    }
    
	
	
	

    //close the db connection
    mysqli_close($connection);
?>