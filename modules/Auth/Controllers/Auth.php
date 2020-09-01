<?php 
namespace Modules\Auth\Controllers;
use \Modules\Auth\Models\AuthModel;
class Auth  extends \App\Controllers\BaseController
{
  
	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->isRequiredSession(false);
	}

	public function index()
	{
		$this->layout = 'Modules\Auth\Views\index';
		$this->content['js'] = 'Modules\Auth\Views\index.js';
		$this->display();
	}

	public function process()
	{
		$this->isAjax();
		$model = new AuthModel();
		$login = array(
			"username" => $this->request->getPost("username"),
			"password" => $this->request->getPost("password"),
		);
		$is_user = $model->checkUser($login['username']);
		if (is_null($is_user)) {
			$this->session->markAsFlashdata('login_error', 1);
			$this->session->markAsFlashdata('login_message', "User Not Found");
			$this->respond(1, "User Not Found");
		}

		if (!compare_password($is_user->password, $login['password'])) {
			$this->session->markAsFlashdata('login_error', 1);
			$this->session->markAsFlashdata('login_message', "Wrong Password");
			$this->respond(1, "Wrong Password");
		}

		$data_user = $this->model->getUser($is_user->id);
		$this->session->set(SESSIONCODE, $data_user);
		$this->respond(0, "Success Login");
	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to('panel'); 
	}

	public function notFound()
	{
		$this->isRequiredSession(true);
		$this->title = "Not Found";
		$this->display($this->config->item("template_location") . "/notfound");
	}

}