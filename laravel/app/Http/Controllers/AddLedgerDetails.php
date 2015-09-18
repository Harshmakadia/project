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

class AddLedgerDetails extends Controller
{
	public function __construct()
	{
		
	}
	
    public function index()
	{.
	    if(!isset($_SESSION['login']))
		{
			return Redirect::to('login');
		}
	    $users = DB::table('ledgeraddressdetails')->select(DB::raw('Ledgerid','Street','City','State','Zipcode','Country')->get();
		return view('templates.ledger',['users' => $users]);
	}
					 
	
	public function show()
	{
		
	}
	
	public function edit()
	{
		
	}
	
	public function update()
	{
		
	}
	
	public function create()
	{
		
	}
	
	public function store()
	{
		$data = \Input::all();
		$Ledgerid= $data['ledgerid'];
		$Street= $data['street'];
		$City= $data['city'];
		$State=$data['state'];
		$zipcode=$data['zipcode'];
		$country=$data['country'];
		if(isset($Name)&&isset($Street)&&isset($City)&&isset($State)&&isset($zipcode)&&isset($country))
	    {
		    echo("djgsd");
			exit();
	       /* DB::table('ledgeraddressdetail')->insert(
                    array(
						   'Ledgerid'     =>   $Ledgerid, 
                           'Street' =>   $Street,
						   'City'    => $City,
						   'Zipcode' => $Zipcode,
                           'Country' => $Country						   
						  )
                     );*/
	    }
	}
	}
