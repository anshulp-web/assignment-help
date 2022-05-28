<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data = 'row_id,img_url';
        $table = 'slider_images';
        $where = array();
		$this->load->model('Dashboard_model');
        $result1 = $this->Dashboard_model->select_data($data,$table,$where);


		$data = 'row_id,img_url,heading,content';
        $table = 'h_section_one';
        $where = array('status'=>'Active');
		$this->load->model('Dashboard_model');
        $result2 = $this->Dashboard_model->select_data($data,$table,$where);

		$data = 'row_id,img_url,heading,content';
        $table = 'h_section_two';
        $where = array('status'=>'Active');
		$this->load->model('Dashboard_model');
        $result3 = $this->Dashboard_model->select_data($data,$table,$where);
		$send = array(
			'slider'=>$result1,
			'h_section1'=>$result2,
			'h_section2'=>$result3
		);
		$this->load->view('index',$send);
	}
}
