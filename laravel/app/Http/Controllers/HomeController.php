<?php
namespace App\Http\Controllers;
session_start();

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
//use Logger;
use Mail;
//use Log4php;
//Logger::configure('../config.xml');

class HomeController extends Controller
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
		return view('templates.home');
	}
	
	public function show()
	{
		// destroy the login session 
		session_destroy();
		return Redirect::to('login');
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
