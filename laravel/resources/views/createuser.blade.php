<?php
$connection = mysql_connect("localhost", "root", "jyadmin123");
$db = mysql_select_db("sas", $connection); // Selecting Database
//Fetching Values from URL
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Email=$_POST['Email'];

//Insert query
$query = mysql_query("insert into userdetail(FirstName, LastName, Email) values ('$FirstName', '$LastName', '$Email')");
echo "Form Submitted Succesfully";
mysql_close($connection); // Connection Closed
?>