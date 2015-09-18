<?php
namespace App\Http\Models;

use App\LoginDetails;

class LoginDetails
{
	private $loginDetails;
	
	public function __construct(LoginDetails $loginDetails)
	{
		$this->loginDetails = $loginDetails;
	}
	
	public function loginHistory(LoginDetails $loginDetails)
	{
		$loginDetails->DateTime = 
	}
	
}