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
use App\Login;
use DB;
use App\Http\Controllers\Password;

//use Log4php;
Logger::configure('../config.xml');

class LoginHistoryController extends Controller
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
		$users = DB::table('userdetail')->rightJoin('logindetails', 'userdetail.Email', '=', 'logindetails.Email')->select(DB::raw('CONCAT(FirstName, " ", LastName) AS Name, logindetails.IPAddress, logindetails.DateTime as LastLogin, logindetails.IsSuccess as Result' ))->orderBy('logindetails.DateTime', 'DESC')->get();
		
		//$users = Login::paginate(15);
		return view('templates.loginhistory',['users' => $users]);
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
	}
}
