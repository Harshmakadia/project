<?php
namespace App\Http\Controllers;
use DB;
class Last
{
	function __construct()
	{
		
	}
	
   public static function getlastno()
    {
        
	     $dateValue=date('y-m-d');   
	   	 $month=date('m');
	     $year=date('y');
		 $result = DB::table('scrollmaster')->select('lastNo')->where('month','=',$month)->where('year','=',$year)->pluck('lastNo');
		 //$rowCount = $result->num_rows;
		
		 //$t_id = 1;
		 
		 if($result == 0){
			//$result1 = $connect->query("INSERT INTO scrollmaster(month,year,lastNo) VALUES ('$month','$year','1')"); 
		$result1 = DB::table('scrollmaster')->Insert([['month' => $month,'year' => $year, 'lastNo' => 1]]);
         return $t_id =1;
		 }
		else
		 	{
			 	{
					//$row['lastNo']++;
		 	  		$result++;
					
					$result2 = DB::table('scrollmaster')->where('month',$month)->where('year',$year)->update(['lastNo' => $result]);
					$t_id = $result;
					return $t_id;
			   	}
		    }
 	}
}

?>