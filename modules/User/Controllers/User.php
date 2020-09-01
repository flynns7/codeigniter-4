<?php
namespace Modules\User\Controllers;

class User extends \App\Controllers\BaseController
{	

	public function index()
	{	
		$this->actionPage = array("refresh","filter","add");
		$this->layout = 'Modules\User\Views\index';
		$this->content['js'] = 'Modules\User\Views\index.js';
		$this->display();
	}

}
