<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_opt_form extends CI_Controller {

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
        $this->form_validation->set_rules('wh_number','Enter your whatssapp number','required');
        $this->form_validation->set_rules('name','Enter your full name','required');
        $this->form_validation->set_rules('city','Enter your city','required');
        $this->form_validation->set_rules('qualification','Enter your qualification','required');
        if ($this->form_validation->run()) 
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $wh_number = $this->input->post('wh_number');
            $city = $this->input->post('city');
            $qualification = $this->input->post('qualification');
            $specialization = $this->input->post('specialization');
            date_default_timezone_set('Asia/Kolkata'); 

            $dt2=date("d-m-Y / H:i:s");
            $data = $this->input->post();
            $config['upload_path']          = './uploads/career-page-form/';
            $config['allowed_types']        = 'jpeg|jpg|png|pdf';
            $config['max_size']             = 400;
           
            $this->load->library('upload', $config);
            
            
            
            if ($this->upload->do_upload('cv_img') == false) 
            {

                $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
                redirect('career/index');
            }else
            {
               $imag = $this->upload->data();
              $image_name = $imag['file_name'];
            
              $dt2=date("d-m-Y / H:i:s");
              $data = $this->input->post();
              $config2['upload_path']          = './uploads/career-page-form/';
              $config2['allowed_types']        = 'jpeg|jpg|png|pdf';
              $config2['max_size']             = 400;
    
              $this->upload->initialize($config2);
              $this->upload->do_upload('smp_img');
              $img2 =  $this->upload->data();
              $image_name2 = $img2['file_name'];
              $data = array('cv_img'=>$image_name,'name'=>$name,'email'=>$email,'city'=>$city,'wh_number'=>$wh_number,'qualification'=>$qualification,'specialization'=>$specialization,'smp_img'=>$image_name2);
              $table ='job_opt_trans';
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
                $this->email->subject('Job Application from Assignmenthelp11');
                $this->email->set_mailtype("html");
                $image_url1 = base_url()."uploads/career-page-form/$image_name";
                $image_url2 = base_url()."uploads/career-page-form/$image_name2";
                $path =  base_url()."uploads/career-page-form/";
                $file_names=array($image_name,$image_name2);
                foreach($file_names as $file_name)
                {   
                 $this->email->attach($path.$file_name);  
                }
               
                //Email body
                
                $body = "<div>
                <ul style='list-style:circle;'>
                <li>Date & Time : $dt2</li>
                <li>User Name: $name</li>
                <li>User Email: $email</li>
                <li>User Whatssapp Number: $wh_number</li>
                <li>User City: $city</li>
                <li>User Qualification:$qualification</li>
                <li>User Specialization:$specialization</li>
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
                    <p>We received your application.</h3>
                    <h3>We will reply to you shortly.</h3>
                    </div>";
                    //$url = $this->load->view('website/pages/mail_for_user');
                    $this->email->message($u_email_body);
                    $this->email->send();
                    redirect('career/index');
                }else{
                    $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
                    redirect('career/index');
                }
              }else{
                $this->session->set_flashdata('img_error', 'Only jpg,png,pdf extension accepted.And Image size not more than 400kb.');
                redirect('career/index');
              }
            

        }
    }else {
            $this->session->set_flashdata('enquiry_error', 'All fields are required!');
            redirect('career/index');
        }

}
}
    ?>