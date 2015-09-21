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
class PaymentController extends Controller
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
		$users = DB::table('ledger')->select('name','openingbalance')->get();
		/*$paymentUsers = array();
		for($i = 0; $i < sizeof($users); $i++)
		{
			$paymentUsers[$users[$i]->name] = $users[$i]->openingbalance;
		}*/
		//print_r($users);
		//exit();
	    return view('templates.payment',['users' => $users]);
	  
	}
   
	public function store()
	{

		$data = $_POST['json'];
		$totalDebit = $_POST['totalDebit'];
		$type=1;
		$date=$_POST['date'];
		$t_id=Last::getlastno();
		
		//$name = $_POST['name'];
        
		DB::table('transaction')->insert(
                   array(  
                           'created_by' =>$_SESSION["name"],
                           'type_id' =>$type,
                           'date' =>$date,
                           'total_amount' =>$totalDebit,
                           't_id'=>$t_id
                           )
                   );
        $id = DB::table('transaction')->orderBy('created_at', 'desc')->select('id')->pluck('id');
        
        for($i = 0; $i <  sizeof($data); $i++)
		{
			//foreach ($data[$i]  as $key => $value)
			//{
				//print_r($key);
				$crdr= $data[$i]['crdr'];
			    $name= $data[$i]['name'];
			    $debit= $data[$i]['debit'];
				$openingbalance = $data[$i]['openingbalance'];

              
				DB::table('transaction_details')->insert(
				 	array(
				 	    'transaction_id' =>$id,
				 		'amount' =>$debit,
				 		'ledger' =>$name

				 		)
				 	);
				DB::table('ledger')->where('name',$name)->update(['OpeningBalance' => $openingbalance]);
		}
      
    }
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