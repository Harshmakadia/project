<?php
namespace App\Http\Controllers;
session_start();
require_once ("../log4php/Logger.php");
require_once ("../app/Http/Controllers/Password.php");
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Session;
use Redirect;
use Logger;
use Mail;
use DB;
use App\Http\Controllers\Password;

//use Log4php;
Logger::configure('../config.xml');
class LedgerController extends Controller
{
	
	public function getledger()
	{
		
    if($_GET['type'] == 'ledger'){
		$name_startsWith = $_GET['name_startsWith'];
		$queries = DB::table('ledger')
		->where('Name', 'LIKE', $name_startsWith.'%')
		->get();

		//$result = DB::table('ledger')->("SELECT Name,openingbalance FROM ledger where Name like '".$name_startsWith."%'");	
		
		foreach ($queries as $query)
		{
			$results[] = $query->Name.'|'.$query->OpeningBalance;
		}
		
		echo json_encode($results);
		
	}
    }	
}