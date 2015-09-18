<?php
namespace App\Http\Controllers;
use DB;
class json
{
	function __construct()
	{
		
	}
	
   public static function json1()
    {
    	
     	$ledgers = DB::table('ledger')->select('name')->get();
     }
 }
?>

