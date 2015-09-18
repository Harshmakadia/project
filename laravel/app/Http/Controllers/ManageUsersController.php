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

class ManageUsersController extends Controller
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
		$users = DB::table('userdetail')->leftJoin('logindetails', 'userdetail.Email', '=', 'logindetails.Email')->groupBy('userdetail.Email')->select(DB::raw('FirstName, LastName, userdetail.Email, max(logindetails.DateTime) as LastLogin' ))->where('DateTime', '!=', 'null' )->get();
		return view('templates.manageusers',['users' => $users]);
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
		$firstName = \Request::get('FirstName');
		$lastName = \Request::get('LastName');
		$email = \Request::get('Email');
		$password = Password::generatePassword(9);
		
		if(isset($firstName)&&isset($lastName)&&isset($email))
		{
			$data = array("email" => $email,
							"password" => $password);
			Mail::send('email.createUser',$data,function($message){
				$email = \Request::get('Email');
				$message->from('suparisystem@example.com', 'SAS');
				$message->to($email, 'sas')->subject('New user account created in SAS');
				$message->replyTo('noreply@gmail.com', 'noreply');
			});
			
			DB::table('userdetail')->insert(
                    array('Email'     =>   $email, 
                          'FirstName' => $firstName,
						  'LastName'  => $lastName,
						  'Password'  => md5($password)
						  )
                     );
	     	\Session::flash('flash_message','New user account created.');
			return redirect('manageusers');
		}
	}
 }
