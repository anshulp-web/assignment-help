<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->model('Dashboard_model');
	}

    public function index(){
        if ($this->session->userdata('username')) {
            redirect('dashboard/slider');
        }else{
            redirect('admin/login');
        }
       
    }

    //Slider Images view load here...

    public function slider(){
        $data = 'row_id,img_url';
        $table = 'slider_images';
        $where = array();
       $result = $this->Dashboard_model->select_data($data,$table,$where);
       if ($this->session->userdata('username')) {
        $this->load->view('admin/slider',['result'=>$result]);
    }else{
        redirect('admin/login');
    }
       
        
    }

    //Add Slider images function here...
     public function addslider(){
        $config['upload_path']          = './uploads/slider-images/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 400;

     $this->load->library('upload', $config);
     if ($this->upload->do_upload('img')==false)
     {
       
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/slider');
     }
     else
     {
        $imag = $this->upload->data();
       $image_name = $imag['file_name'];
       $data = array('img_url'=>$image_name);
       $table ='slider_images';
      $result =  $this->Dashboard_model->insert_data($table,$data);
       if ($result) {
          $this->session->set_flashdata('img_success','Image uploaded successfully!');
          redirect('dashboard/slider');
       }else{
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/slider');
       }
     }
    }


    //Remove Slider image here...

    public function remove(){
        $row_id = $_GET['/'];
        $data = 'img_url';
        $table = 'slider_images';
        $where = array('row_id'=>$row_id);
        $result = $this->Dashboard_model->select_data($data,$table,$where);
        $image= $result[0]['img_url'];
        $table = 'slider_images';
        $where = array('row_id'=>$row_id);
        $result = $this->Dashboard_model->delete_data($where,$table);
        unlink("./uploads/slider-images/".$image);
        if ($result) {
         redirect('dashboard/slider');
        }else{
            ?>
            <script>
                alert('Something went wrong!');
            </script>
            <?php
        }
    }

   //Update image preview function here...
   public function update(){
    $row_id = $_GET['/'];
    $data = 'img_url';
    $table = 'slider_images';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $image= $result[0]['img_url'];
    if ($this->session->userdata('username')) {
        $this->load->view('admin/image_update',['preview_image'=>$image]);
    }else{
        redirect('admin/login');
    }
   

    
   }

   //update image function here....

   public function updateimg(){
       $this->form_validation->set_rules('row_id','Input','required');
        if ($this->form_validation->run()) {
            $old_img = $this->input->post('old_img');
            $row_id = $this->input->post('row_id');
        
        $config['upload_path']          = './uploads/slider-images/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 400;
    
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img') == false) {
            $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/slider');
        } else {
            unlink("./uploads/slider-images/".$old_img);
            $imag = $this->upload->data();
            $image_name = $imag['file_name'];
            $data = array('img_url' => $image_name);
            $table = 'slider_images';
            $where = array('row_id'=>$row_id);
            $result =  $this->Dashboard_model->update_data($table, $data , $where);
            if ($result) {
                $this->session->set_flashdata('img_update', 'Image updated successfully!');
                redirect('dashboard/slider');
              
            } else {
                $this->session->set_flashdata('img_error', 'Only jpg,png extension accepted.And Image size not more than 400kb.');
                redirect('dashboard/slider');
            }
        }
    }
    }



    //Home page section first start here....

    public function h_section1(){
        $data = 'row_id,img_url,heading,content,status';
        $table = 'h_section_one';
        $where = array();
       $result = $this->Dashboard_model->select_data($data,$table,$where);
       if ($this->session->userdata('username')) {
        $this->load->view('admin/h_section1',['result'=>$result]);
    }else{
        redirect('admin/login');
    }
     
    }
//Add function for home page section first here....

public function add_h_section1(){
    if ($this->session->userdata('username')) {
        $this->load->view('admin/add_h_section1');
    }else{
        redirect('admin/login');
    }
   

}


//Adding home page section first funcion here...
public function adding_h_section1(){
$this->form_validation->set_rules('heading','Input','required');
$this->form_validation->set_rules('content','Input','required');
$this->form_validation->set_rules('status','Input','required');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if ($this->form_validation->run()) {
    $heading = $this->input->post('heading');
    $content = $this->input->post('content');
    $status = $this->input->post('status');
    $config['upload_path']          = './uploads/home-page-section1-images/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 400;

 $this->load->library('upload', $config);
 if ($this->upload->do_upload('img_url')==false)
 {
   
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section1');
 }
 else
 {
    $imag = $this->upload->data();
   $image_name = $imag['file_name'];
   $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
   $table ='h_section_one';
  $result =  $this->Dashboard_model->insert_data($table,$data);
   if ($result) {
      $this->session->set_flashdata('success','Inserted successfully!');
      redirect('dashboard/h_section1');
   }else{
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section1');
   }
 }
}else{
    $this->session->set_flashdata('form_error','All fields are required!');
    $this->load->view('admin/add_h_section1');
}
}


//home page section first data update function here.....

public function up_h_section1(){
    $id= $_GET['/'];
    $data = 'img_url,heading,row_id,content,status';
    $table = 'h_section_one';
    $where = array('row_id'=>$id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $this->load->view('admin/add_h_section1',['record'=>$result]);
}

public function updating_h_section1(){
$this->form_validation->set_rules('heading','Input','required');
$this->form_validation->set_rules('content','Input','required');
$this->form_validation->set_rules('status','Input','required');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if ($this->form_validation->run()) {
    $row_id = $this->input->post('hidden_ipt');
    $old_img = $this->input->post('old_img');
    $heading = $this->input->post('heading');
    $content = $this->input->post('content');
    $status = $this->input->post('status');
    $config['upload_path']          = './uploads/home-page-section1-images/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 400;

 $this->load->library('upload', $config);
 if ($this->upload->do_upload('img_url')==false)
 {
   
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section1');
 }
 else
 {
     unlink("./uploads/home-page-section1-images/".$old_img);
    $imag = $this->upload->data();
   $image_name = $imag['file_name'];
   $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
   $table ='h_section_one';
   $where = array('row_id'=>$row_id);
  $result =  $this->Dashboard_model->update_data($table,$data,$where);
   if ($result) {
      $this->session->set_flashdata('up_success','Updated successfully!');
      redirect('dashboard/h_section1');
   }else{
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section1');
   }
 }
}else{
    $this->session->set_flashdata('form_error','All fields are required!');
    $this->load->view('admin/add_h_section1');
}
}

//Remove home page section first
public function rm_h_section1(){
    $row_id = $_GET['/'];
    $data = 'img_url';
    $table = 'h_section_one';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $image= $result[0]['img_url'];
    $table = 'h_section_one';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->delete_data($where,$table);
    unlink("./uploads/home-page-section1-images/".$image);
    if ($result) {
     redirect('dashboard/h_section1');
    }else{
        ?>
        <script>
            alert('Something went wrong!');
        </script>
        <?php
    }
 
    }
//Home page section second functions here....


public function h_section2(){
    $data = 'row_id,img_url,heading,content,status';
    $table = 'h_section_two';
    $where = array();
   $result = $this->Dashboard_model->select_data($data,$table,$where);
        if ($this->session->userdata('username')) {
            $this->load->view('admin/h_section2', ['result' => $result]);
        } else {
            redirect('admin/login');
        }
 
}

//Add function for home page section second here....

public function add_h_section2(){
    if ($this->session->userdata('username')) {
        $this->load->view('admin/add_h_section2');
    }else{
        redirect('admin/login');
    }
   

}

//Adding home page section second funcion here...
public function adding_h_section2(){
    $this->form_validation->set_rules('heading','Input','required');
    $this->form_validation->set_rules('content','Input','required');
    $this->form_validation->set_rules('status','Input','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
        $heading = $this->input->post('heading');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $config['upload_path']          = './uploads/home-page-section2-images/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 400;
    
     $this->load->library('upload', $config);
     if ($this->upload->do_upload('img_url')==false)
     {
       
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/h_section2');
     }
     else
     {
        $imag = $this->upload->data();
       $image_name = $imag['file_name'];
       $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
       $table ='h_section_two';
      $result =  $this->Dashboard_model->insert_data($table,$data);
       if ($result) {
          $this->session->set_flashdata('success','Inserted successfully!');
          redirect('dashboard/h_section2');
       }else{
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/h_section2');
       }
     }
    }else{
        $this->session->set_flashdata('form_error','All fields are required!');
        $this->load->view('admin/add_h_section2');
    }
    }

//home page section Second data update function here.....

public function up_h_section2(){
    $id= $_GET['/'];
    $data = 'img_url,heading,row_id,content,status';
    $table = 'h_section_two';
    $where = array('row_id'=>$id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $this->load->view('admin/add_h_section2',['record'=>$result]);
}

public function updating_h_section2(){
$this->form_validation->set_rules('heading','Input','required');
$this->form_validation->set_rules('content','Input','required');
$this->form_validation->set_rules('status','Input','required');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if ($this->form_validation->run()) {
    $row_id = $this->input->post('hidden_ipt');
    $heading = $this->input->post('heading');
    $content = $this->input->post('content');
    $status = $this->input->post('status');
    $old_img = $this->input->post('old_img');
    $config['upload_path']          = './uploads/home-page-section2-images/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 400;

 $this->load->library('upload', $config);
 if ($this->upload->do_upload('img_url')==false)
 {
   
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section2');
 }
 else
 {
    unlink("./uploads/home-page-section2-images/".$old_img);
    $imag = $this->upload->data();
   $image_name = $imag['file_name'];
   $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
   $table ='h_section_two';
   $where = array('row_id'=>$row_id);
  $result =  $this->Dashboard_model->update_data($table,$data,$where);
   if ($result) {
      $this->session->set_flashdata('up_success','Updated successfully!');
      redirect('dashboard/h_section2');
   }else{
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/h_section2');
   }
 }
}else{
    $this->session->set_flashdata('form_error','All fields are required!');
    $this->load->view('admin/add_h_section2');
}
}
//Remove home page section second
public function rm_h_section2(){
    $row_id = $_GET['/'];
    $data = 'img_url';
    $table = 'h_section_two';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $image= $result[0]['img_url'];
    $table = 'h_section_two';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->delete_data($where,$table);
    unlink("./uploads/home-page-section2-images/".$image);
    if ($result) {
     redirect('dashboard/h_section2');
    }else{
        ?>
        <script>
            alert('Something went wrong!');
        </script>
        <?php
    }
}


//About page functions here........

public function a_section1(){
    $data = 'row_id,img_url,heading,content,status';
    $table = 'a_section_one';
    $where = array();
   $result = $this->Dashboard_model->select_data($data,$table,$where);
        if ($this->session->userdata('username')) {
            $this->load->view('admin/a_section1', ['result' => $result]);
        } else {
            redirect('admin/login');
        }
 
}

//Add function for home page section second here....

public function add_a_section1(){
    if ($this->session->userdata('username')) {
        $this->load->view('admin/add_a_section1');
    }else{
        redirect('admin/login');
    }
   

}
//Adding home page section first funcion here...
public function adding_a_section1(){
    $this->form_validation->set_rules('heading','Input','required');
    $this->form_validation->set_rules('content','Input','required');
    $this->form_validation->set_rules('status','Input','required');
    $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
    if ($this->form_validation->run()) {
        $heading = $this->input->post('heading');
        $content = $this->input->post('content');
        $status = $this->input->post('status');
        $config['upload_path']          = './uploads/about-page-section1-images/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 400;
    
     $this->load->library('upload', $config);
     if ($this->upload->do_upload('img_url')==false)
     {
       
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/a_section1');
     }
     else
     {
        $imag = $this->upload->data();
       $image_name = $imag['file_name'];
       $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
       $table ='a_section_one';
      $result =  $this->Dashboard_model->insert_data($table,$data);
       if ($result) {
          $this->session->set_flashdata('success','Inserted successfully!');
          redirect('dashboard/a_section1');
       }else{
        $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
        redirect('dashboard/a_section1');
       }
     }
    }else{
        $this->session->set_flashdata('form_error','All fields are required!');
        $this->load->view('admin/add_a_section1');
    }
    }

    //About page section first data update function here.....

public function up_a_section1(){
    $id= $_GET['/'];
    $data = 'img_url,heading,row_id,content,status';
    $table = 'a_section_one';
    $where = array('row_id'=>$id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $this->load->view('admin/add_a_section1',['record'=>$result]);
}

public function updating_a_section1(){
$this->form_validation->set_rules('heading','Input','required');
$this->form_validation->set_rules('content','Input','required');
$this->form_validation->set_rules('status','Input','required');
$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
if ($this->form_validation->run()) {
    $row_id = $this->input->post('hidden_ipt');
    $old_img = $this->input->post('old_img');
    $heading = $this->input->post('heading');
    $content = $this->input->post('content');
    $status = $this->input->post('status');
    $config['upload_path']          = './uploads/about-page-section1-images/';
    $config['allowed_types']        = 'jpeg|jpg|png';
    $config['max_size']             = 400;

 $this->load->library('upload', $config);
 if ($this->upload->do_upload('img_url')==false)
 {
   
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/a_section1');
 }
 else
 {
     unlink("./uploads/about-page-section1-images/".$old_img);
    $imag = $this->upload->data();
   $image_name = $imag['file_name'];
   $data = array('img_url'=>$image_name,'heading'=>$heading,'content'=>$content,'status'=>$status);
   $table ='a_section_one';
   $where = array('row_id'=>$row_id);
  $result =  $this->Dashboard_model->update_data($table,$data,$where);
   if ($result) {
      $this->session->set_flashdata('up_success','Updated successfully!');
      redirect('dashboard/a_section1');
   }else{
    $this->session->set_flashdata('img_error','Only jpg,png extension accepted.And Image size not more than 400kb.');
    redirect('dashboard/a_section1');
   }
 }
}else{
    $this->session->set_flashdata('form_error','All fields are required!');
    $this->load->view('admin/add_a_section1');
}
}

//Remove home page section first
public function rm_a_section1(){
    $row_id = $_GET['/'];
    $data = 'img_url';
    $table = 'a_section_one';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->select_data($data,$table,$where);
    $image= $result[0]['img_url'];
    $table = 'a_section_one';
    $where = array('row_id'=>$row_id);
    $result = $this->Dashboard_model->delete_data($where,$table);
    unlink("./uploads/about-page-section1-images/".$image);
    if ($result) {
     redirect('dashboard/a_section1');
    }else{
        ?>
        <script>
            alert('Something went wrong!');
        </script>
        <?php
    }
 
    }
}
