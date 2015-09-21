<?php
namespace App\Http\Controllers;
session_start();
require_once ("../log4php/Logger.php");
require_once ("../app/Http/Controllers/Password.php");
require_once ("../app/Http/Controllers/scrollmaster.php");
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

class ViewPaymentController extends Controller
{
	public function __construct()
	{
		
	}
	
    public function index()
	{
		 if(!isset($_SESSION['login']))
		{
			return Redirect::to('login');
		}
			$users = DB::table('transaction_details')->leftjoin('ledger','transaction_details.ledger','=','ledger.Name')->groupBy('ledger.Name')->select('ledger.CrDr as CrDr',
      				'transaction_details.ledger as Name',
      				'transaction_details.amount as Debit',
      				DB::raw('ABS(ledger.OpeningBalance) as openingBalance'))->get();
			return view('templates.viewpayment',['users' => $users]);
	}


	public function store()
	{	       
		$data = $_POST['json'];
		$totalDebit = $_POST['totalDebit'];
		$type=1;
		$date=$_POST['date'];
		//$timestamp = date('Y-m-d H:i:s', strtotime($date)); 
		//$name = $_POST['name'];
		DB::table('transaction')->where('id',212)->update(['updated_by' =>$_SESSION["name"]]);

    	for($i = 0; $i <  sizeof($data); $i++)
		{
				$crdr= $data[$i]['crdr'];
			    $name= $data[$i]['name'];
			    $debit= $data[$i]['debit'];
				$openingbalance = $data[$i]['openingbalance'];
		}	


      
    } 
}