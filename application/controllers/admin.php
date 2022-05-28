<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model('login');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}


	//Login function 
	public function login(){
		$this->form_validation->set_rules('username','Input','required');
		$this->form_validation->set_rules('password','Input','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if ($this->form_validation->run()) {
			$user_name = $this->input->post('username');
			$password = $this->input->post('password');
            $pass = md5($password);
			$check = $this->login->Login_validate($user_name,$pass);
            if ($check) {
                $row_id = $check[0]['row_id'];
				$name = $check[0]['user_name'];
				$this->session->set_userdata('row_id',$row_id);
				$this->session->set_userdata('username',$name);
				redirect('dashboard/index');
			}else{
				$this->session->set_flashdata('error','Please Enter vailid username and password');
				redirect('admin/index');
			}
		}else{
			$this->load->view('admin/login');
		}
		
	}


	//Logout here...
	public function logout(){
		$this->session->unset_userdata('username');
        redirect('admin/index');
	}
}
