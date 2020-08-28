<?php 
namespace Modules\Auth\Controllers;

class Auth  extends \App\Controllers\BaseController
{
  
	public function __construct()
	{
		$this->model = model('Auth_model', 'model');
		$this->isRequiredSession(false);
	}

	public function index()
	{
		if ($this->sessionApp["id"] != null && $this->sessionApp["role_id"] == 1){
			redirect(linkTo("dashboard"), 'refresh');
		}else if($this->sessionApp["id"] != null && $this->sessionApp["role_id"] == 2){
			redirect(linkTo("transaksi-mitra"), 'refresh');
		}

		$this->load->view('index');
	}

	public function process()
	{
		$login = array(
			"username" => $this->security->xss_clean($this->input->post("username")),
			"password" => $this->security->xss_clean($this->input->post("password")),
		);
		$is_user = $this->model->checkUser($login['username']);

		if (is_null($is_user)) {
			$this->session->set_flashdata('login_error', 1);
			$this->session->set_flashdata('login_message', "User Not Found");
			$this->respond(1, "User Not Found");
		}

		if (!compare_password($is_user->password, $login['password'])) {
			$this->session->set_flashdata('login_error', 1);
			$this->session->set_flashdata('login_message', "Wrong Password");
			$this->respond(1, "Wrong Password");
		}

		$data_user = $this->model->getUser($is_user->id);
		$this->session->set_userdata(SESSIONCODE, $data_user);
		$this->respond(0, "Success Login");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('panel', 'refresh');
	}

	public function notFound()
	{
		$this->isRequiredSession(true);
		$this->title = "Not Found";
		$this->display($this->config->item("template_location") . "/notfound");
	}

}