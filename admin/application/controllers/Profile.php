<?php

class Profile extends MY_AdminController {

    function __construct() {
        parent::__construct();
        // $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('admin');
        
    }
    function index(){
        $userSession = $this->session->userdata;
        $cond = "AND `admin_id`='{$userSession['admin_data'][0]['admin_id']}' AND `status`='1'";
        $adminDatafetch = $this->admin->fetch('admin', $cond);
        if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])){
         $first_name = $this->input->post('first_name');
         $last_name = $this->input->post('last_name'); 
         $email = $this->input->post('email'); 
         $arr['frist_name']=trim($first_name);
         $arr['last_name']=trim($last_name);
         $arr['email']=trim($email);  
         $userSession['admin_data'][0]['email']=trim($email);
         $this->session->set_userdata($userSession);
         $this->admin->edit_cond('admin',$arr,$cond);
         $this->session->set_flashdata('suc_message', 'Sucessfully Profile Updated');
         redirect('profile');
        }
        $this->data['admin']=$adminDatafetch;
        $this->get_include();
        $this->load->view($this->viewDir.'profile/profile',$this->data);
    }
}

