<?php
class Managepar extends MY_AdminController
{
	function __construct()
	{
		parent::__construct();
		 $this->checkSessionForUser(); ///////for login check(refer my controller)/////

                $this->load->model('admin');
                    $this->load->model('org');
    }

	 public function index() {
        

    // $org_id = $this->data['org_id'];
         //$userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND type='p'";
        $details = $this->org->fetch('user', $cond3);

   
        $this->data['det'] = $details;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_parent/listing", $this->data);
    }
    
   public function delete_par($id) {
   //echo "hi"; die();
        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            
            $arr['status'] = 5;
            $cond = " and id='{$id}'";
            $this->org->edit_cond('user', $arr, $cond);
         // echo $cond; die();
            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('managepar/index');
    }
	
}