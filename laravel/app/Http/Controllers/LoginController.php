<?php
namespace App\Http\Controllers;
session_start();
require_once ("../log4php/Logger.php");
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Input;
use Validator;
use Auth;
use Session;
use Redirect;
use App\Login;
use App\Http\Models\dbConfig;
use Logger;
use Mail;
use DB;
//use Log4php;
Logger::configure('../config.xml');

class LoginController extends Controller
{
	private $login;
	private $connection;
	
	public function __construct(Login $login)
	{
		$this->login = $login;
	}
	
    public function index()
	{
		if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
		{
			$email = $_COOKIE['email'];
			$password = $_COOKIE['password'];
		}
		else
		{
			$email = "";
			$password = "";
		}
		$loginData = array("email" => $email,
						    "password" => $password,
							"error" => "");
		return view('templates.login',['loginData' => $loginData]);
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
	public function store(Login $logins)
	{
		$email = \Request::get('email');
		$password = \Request::get('password');
		
		if(isset($email)&&isset($password))
		{
			try
			{
				//set cookie
				$checkMe = \Request::get('checkMe');
				if(isset($checkMe))
				{
					setcookie("email", "", time() - 3600);
					setcookie("password", "", time() - 3600);
					setcookie('email',$email, time() + (86400 * 30), "/");
					setcookie('password',$password, time() + (86400 * 30), "/");	
				}
				
				$logins = $this->login->where('Email', $email)->where('Password', md5($password))->first();

				if(isset($logins))
				{
					$_SESSION["login"] = "true";
					$users = DB::table('userdetail')->select('FirstName')->where('Email', '=', $email)->pluck('FirstName');
					$_SESSION["name"] = $users;
					//maintain success log
					$log = Logger::getLogger("main");
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$log->info("Email: ".$email." Password: ".$password." IPAddress: ".$ipAddress." isSuccess: true");

					DB::table('logindetails')->insert(
                    array('DateTime'  =>   \DB::raw('NOW()'), 
                          'Email'     =>   $email,
						  'Password'  => $password,
						  'IPAddress' => $ipAddress,
						  'IsSuccess' => 1)
                     );
					return Redirect('home');
				}
				else
				{
					//maintain success log for failure
					$log = Logger::getLogger("main");
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$log->info("Email: ".$email." Password: ".$password." IPAddress: ".$ipAddress." isSuccess: false");
					
					DB::table('logindetails')->insert(
                    array('DateTime'  =>   \DB::raw('NOW()'), 
                          'Email'     =>   $email,
						  'Password'  => $password,
						  'IPAddress' => $ipAddress,
						  'IsSuccess' => 0)
                     );
					\Session::flash('flash_message','Please enter valid credentials.');
					return redirect('login');
				}
			}
			catch(\Exception $e)
			{
				echo $e->getMessage();
			}
		}
		
	}
}
