<?php
class Org_dashboard extends MY_OrgController
{
	function __construct()
	{
		parent::__construct();
		 $this->checkSessionForUser(); ///////for login check(refer my controller)/////

                $this->load->model('org');
    }

	public function index(){
            

 $org_id = $this->data['org_id'];
           //$userSession = $this->session->userdata;
           $details = $this->org->fetch('codes');
                  $this->data['dets']= $details;
        $cond = "AND `org_seq_no`='$org_id' AND `status`='1'";
        $details = $this->org->fetch('org', $cond);
            $this->data['det'] = $details;
                 // t($det,1);
		$this->get_include();
		$this->load->view($this->viewDir."home/dashboard",$this->data);
	
        }
        
        public function edit() {
            $org_id = $this->data['org_id'];
      
//        $id = base64_decode($id);
//        $org = base64_decode($org);
        
         //echo $id.$org; die();
       
        $arra = array();
        if (isset($_POST['orgname'])) {
            $id = $this->input->post('org');
            $org = $this->input->post('idd');
           $id = base64_decode($id);
            $org = base64_decode($org);
        
            $name = $this->input->post('orgname');
            $username = $this->input->post('username');
            $house = $this->input->post('house');
            $street = $this->input->post('street');
            
            $type = $this->input->post('type');
            $authno = $this->input->post('authno');
            $emgname = $this->input->post('emgname');
            $role = $this->input->post('role');
            $primary = $this->input->post('primary');
            $secondary = $this->input->post('secondary');
            $tertiary = $this->input->post('tertiary');
            
            $arra['org_name'] = $name;
            $arra['username'] = $username;
            $arra['house_name_number'] = $house;
            $arra['street_name'] = $street;
            $arra['org_type'] = $type;
            $arra['org_auth_no'] = $authno;
            $arra['sp_contact_name'] = $emgname;
            $arra['sp_contact_role'] = $role;
            $arra['sp_contact_no1'] = $primary;
            $arra['sp_contact_no2'] = $secondary;
            $arra['sp_contact_no3'] = $tertiary;
           
            $arra['updated_date'] = date('Y-m-d H:i:s');
            $arra['status'] = 1;
           //t($arra,1);
 
                $cond1 = " AND `status`!=5 AND `org_seq_no`='{$org_id}'";
                $cond2 = " AND `status`!=5 AND `org_seq_no`='{$org_id}'";
            
                $chk1=$this->org->edit_cond('org', $arra, $cond1);
                $chk2=$this->org->edit_cond('org', $arra, $cond2);
           
         
                
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
             
            redirect('org/dashboard/');
        } else {
            
           
           // $userSession = $this->session->userdata;
           $details = $this->org->fetch('codes');
                  $this->data['dets']= $details;
        $cond = "AND `org_seq_no`='$org_id' AND `status`='1'";
        $details = $this->org->fetch('org', $cond);
            $this->data['det'] = $details;
                 // t($det,1);
		$this->get_include();
		$this->load->view($this->viewDir."home/dashboard",$this->data);
        }
    }
     
	function fetch_county($country_id = '', $state_id = '')
	{
		if($country_id == '') { $country_id = $this->input->post('country_id'); }
		if($state_id == '') { $state_id = $this->input->post('state_id'); }
		$cond = " and state_seq_no = '".$state_id."'";
		$return = $this->admin->fetch('county',$cond);
                //echo $this->db->last_query();
                //t($return);
                //exit;
		$opt = '<option value="">County</option>';
		foreach ($return as $key => $value) {
			$opt .= '<option value="'.$value['id'].'">'.$value['county_name'].'</option>';
		}
		echo json_encode($opt);
	}
      
	
}