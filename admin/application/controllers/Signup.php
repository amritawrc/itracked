<?php

class Signup extends MY_AdminController {

    function __construct() {
        parent::__construct();
        $this->checkSessionForUser(); ///////for login check(refer my controller)/////
          $this->load->model('admin');
     
    }

    function index() {
          $this->get_include();
            $this->load->view($this->viewDir . "login/register", $this->data);
        
    }

   
 function submitregister(){
		if(isset($_POST['username'])){
			$fname = $this->input->post('firstname');
    		$lname = $this->input->post('lastname');
    		$email = $this->input->post('username');
                $password = $this->input->post('password');
    		
    	
    			$arr = array();
    			$arr['frist_name'] = $fname;
    			$arr['last_name'] = $lname;
    			$arr['email'] = $email;
    			$arr['status'] = 1;
    			$arr['password'] = md5($password);
    			
                               
                        //t($arr,1);
                        $this->admin->add('admin',$arr);
    			if(1){
                       // echo "hi"; die();
    	         $this->session->set_flashdata('suc_message', 'Thank you for registering.Please login.');
    		 redirect('login/index');
                        }       
		}else{
			$this->get_include();
			$this->load->view($this->viewDir.'login/register',$this->data);
		}
	}
  
    

}
