<?php

namespace SAS\Dao;

$documentRoot  = getenv("DOCUMENT_ROOT");

class DaoManager
{
	public $conn;
    public static function GetDatabaseConnection()
	{		
		$server_name = "127.0.0.1";
		$user_name = "root";
		$password = "jyadmin123";
	
		//create connection
		$conn = new \mysqli($server_name, $user_name, $password, "sas", 3306);

		//Check for error
		if($conn -> connect_errno)
		{
			die("Connection failed: " . $conn->connect_errno);
		}
		return $conn;
	}
}
?>





