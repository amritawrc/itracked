<?php
class Dashboard extends MY_AdminController
{
	function __construct()
	{
		parent::__construct();
			$this->checkSessionForUser(); ///////for login check(refer my controller)/////


                $this->load->model('admin');
    }

	public function index(){
            
             $details = $this->admin->fetch('codes');
                  $this->data['det']= $details;
                  $details = $this->admin->fetch('city');
                  $this->data['dets']= $details;
                  
                  // t($this->data['det'],1);
		$this->get_include();
		$this->load->view($this->viewDir."home/dashboard",$this->data);
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