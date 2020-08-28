<?php
namespace Modules\User\Controllers;

class User extends \App\Controllers\BaseController
{	

	public function index()
	{	
		$this->layout = 'Modules\User\Views\index';
		$this->content['test'] = 'test';
		$this->display();
	}

}
