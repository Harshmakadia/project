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

class AjaxAddUserController extends Controller
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
		//if(Request::ajax()) {
			$data = \Input::all();
			//print_r($data);die;
		//}
		$FirstName= $data['FirstName'];
		$LastName= $data['LastName'];
		$Email= $data['Email'];
		$password = Password::generatePassword(9);
	
	/*	$emailExist = DB::table('userdetail')->where('Email', $Email)->count();
		
		if($emailExist > 0)
		{
			\Session::flash('flash_error','Email is already available.');
			return;
		}*/
		DB::table('userdetail')->insert(
                    array(
							'Email'     =>   $Email, 
                          'FirstName' => $FirstName,
						  'LastName'  => $LastName,
						  'Password'  => md5($password)
						  )
                     );
	$dataEmail = array("email" => $Email,
							"password" => $password);
	Mail::send('email.createUser',$dataEmail,function($message){
	$data = \Input::all();
	$Email= $data['Email'];
	$message->from('suparisystem@example.com', 'SAS');
	$message->to($Email, 'sas')->subject('New user account created in SAS');
	$message->replyTo('noreply@gmail.com', 'noreply');
			});				 
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
