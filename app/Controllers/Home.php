<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data["test"] = "data";
		return view('welcome_message',$data);
	}

	//--------------------------------------------------------------------

}
