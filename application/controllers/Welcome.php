<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	
	public function index(){
     $this->load->view('index');
   }
	public function blog(){
     $this->load->view('blog');
   }
   
	public function blog_detail(){
     $this->load->view('blog_detail');
   }
	function validation()
 {
  $this->load->library('form_validation');
  $this->form_validation->set_rules('name', 'Name', 'required');
  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  $this->form_validation->set_rules('phone', 'phone', 'required');
  $this->form_validation->set_rules('address', 'address', 'required');
  if($this->form_validation->run())
  {
	   $data = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'address' => $this->input->post('address', true),
               
            );
		 $result = $this->db->insert('member',$data);
		 if($result){
          $array = array(
   
          'success' => '<div class="alert alert-success">Thank you for Contact Us</div>'
           );
		 }
  }
  else
  {
   $array = array(
    'error'   => true,
    'name_error' => form_error('name'),
    'email_error' => form_error('email'),
    'phone_error' => form_error('phone'),
    'address_error' => form_error('address')
   );
   
  }

  echo json_encode($array);
 }
}
