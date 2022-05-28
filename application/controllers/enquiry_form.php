<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_form extends CI_Controller {

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
        $this->form_validation->set_rules('email','Enter your email','required');
        $this->form_validation->set_rules('mo_number','Enter your number','required');
        $this->form_validation->set_rules('name','Enter your full name','required');
        $this->form_validation->set_rules('country','Enter your country','required');
        $this->form_validation->set_rules('cl_nm','Enter your college name','required');
        if ($this->form_validation->run()) 
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mo_number = $this->input->post('mo_number');
            $wh_number = $this->input->post('wh_number');
            $message = $this->input->post('message');
            $cl_nm = $this->input->post('cl_nm');
            $country = $this->input->post('country');
            $course = $this->input->post('course');
            date_default_timezone_set('Asia/Kolkata'); 

            $dt2=date("d-m-Y / H:i:s");
            $data = $this->input->post();
            $config['upload_path']          = './uploads/enquiry_form_assignments/';
            $config['allowed_types']        = 'jpeg|jpg|png|pdf';
            $config['max_size']             = 400;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('img_url') == false) 
            {

                $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
                redirect('welcome/index');
            }else
            {
               $imag = $this->upload->data();
              $image_name = $imag['file_name'];
              $data = array('img_url'=>$image_name,'name'=>$name,'email'=>$email,'mo_number'=>$mo_number,'wh_number'=>$wh_number,'message'=>$message,'cl_nm'=>$cl_nm,'course'=>$course,'country'=>$country);
              $table ='enquiry_trans';
              $where = array();
              $this->load->model('Dashboard_model');
             $result =  $this->Dashboard_model->insert_data($table,$data,$where);
              if ($result) {
                //This is config settign for email sending...
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.gmail.com';
                $config['smtp_user'] = 'webanajmandi.evolve@gmail.com';
                $config['smtp_pass'] = '';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';

                $from_email = "webanajmandi.evolve@gmail.com";
                 //$to_email = 'shah@evolveonweb.com';
                $to_email = 'anshul.evolve@gmail.com';
                //Load email library
                $this->load->library('email',$config);
                $this->email->from($from_email);
                $this->email->to($to_email);
                $this->email->subject('Enquiry from Assignmenthelp11');
                $this->email->set_mailtype("html");
                $image_url = base_url()."uploads/enquiry_form_assignments/$image_name";
                $this->email->attach($image_url);
                //Email body
                
                $body = "<div>
                <ul style='list-style:circle;'>
                <li>Date & Time : $dt2</li>
                <li>User Name: $name</li>
                <li>User Email: $email</li>
                <li>User Mobile Number: $mo_number</li>
                <li>User Whatssapp Number: $wh_number</li>
                <li>User Country: $country</li>
                <li>User College/University: $cl_nm</li>
                <li>User Course: $course</li>
                <li>User Message: $message</li>
                </ul>
                </div>";
                
                $this->email->message($body);
                //Send mail
                if($this->email->send()==true){
                    $this->session->set_flashdata('success','Send successfully!');
                   
                    //For user
                    $this->load->library('email',$config);
                    $this->email->from($from_email);
                    $this->email->to($email);
                    $this->email->subject('Thanks for enquiry');
                   
                    // user mail body
                    $u_email_body = "<div>
                    <h2 style='color:#56aeff;font-style:italic;'>Welcome to Assignmenthelp11</h2>
                    <span>Hello $name,</span>
                    <br>
                    <span>Greetings from Assignmenthelp11!</span>
                    <br>
                    <p>We, The Assignmenthelp11, provide writing services related to preparing model articles and journal papers for our clients.. In easy words Assignmenthelp11 can manage your Assignments Essays, Power Point Presentation, Poster Making, Proposal / Dissertation, Business Report, CV Designing, and SOP with as easy as piece of cake.</h3>
                    <h3>We will reply to you shortly.</h3>
                    </div>";
                    //$url = $this->load->view('website/pages/mail_for_user');
                    $this->email->message($u_email_body);
                    $this->email->send();
                    redirect('welcome/index');
                }else{
                    $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
                    redirect('welcome/index');
                }
                   
              }else{
                $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
               redirect('welcome/index');
              }
            

        }
    }else {
            $this->session->set_flashdata('enquiry_error', 'All fields are required!');
            redirect('welcome/index');
        }

}
}
    ?>