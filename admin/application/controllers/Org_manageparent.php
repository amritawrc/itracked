<?php

class Org_manageparent extends MY_OrgController {

    function __construct() {
        parent::__construct();
       $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {
        

     $org_id = $this->data['org_id'];
         //$userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('parent', $cond3);

        foreach ($details as $key => $value) {
            $org_id= $value['org_id'];
             $cond4 = "AND org_seq_no = $org_id and status!='5'";
            $name = $this->org->fetch('org', $cond4);
            
            $id = $value['add_seq_no'];
            if($id){
            $cond = "AND id=$id and status!='5'";
            $org_details = $this->org->fetch('address', $cond);

            $details[$key]['email'] = $org_details[0]['email'];
            $details[$key]['phone'] = $org_details[0]['phone'];
            $city = $org_details[0]['city'];
            $county = $org_details[0]['county'];
            $cond1 = "AND id=$city";
            $cond2 = "AND id=$county";
            $city_details = $this->org->fetch('city', $cond1);
            $county_details = $this->org->fetch('county', $cond2);
            $details[$key]['city'] = $city_details[0]['city_name'];
            $details[$key]['county'] = $county_details[0]['county_name'];
            $details[$key]['name'] = $name[0]['org_name'];
            
            }
        }
        $this->data['det'] = $details;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_parent/listing", $this->data);
    }
    
    function view()
    {    
        

         $org_id = $this->data['org_id'];
                //$userSession = $this->session->userdata;
        $cond = "AND status!='5' AND `org_id`='$org_id'";
        $stu = $this->org->fetch('student', $cond);
         $this->data['stu']= $stu;
         
                  $details = $this->org->fetch('city');
                  $this->data['dets']= $details;
       $this->get_include();
        $this->load->view($this->viewDir . "manage_parent/add", $this->data); 
    }
    
    	function fetch_county($country_id = '', $state_id = '')
	{
		if($country_id == '') { $country_id = $this->input->post('country_id'); }
		if($state_id == '') { $state_id = $this->input->post('state_id'); }
		$cond = " and state_seq_no = '".$state_id."'";
		$return = $this->org->fetch('county',$cond);
                //echo $this->db->last_query();
                //t($return);
                //exit;
		$opt = '<option value="">County</option>';
		foreach ($return as $key => $value) {
			$opt .= '<option value="'.$value['id'].'">'.$value['county_name'].'</option>';
		}
		echo json_encode($opt);
	}
        
         function mailsent($id){
             

     $org_id = $this->data['org_id'];
        $par_seq_no=$id;
      
//         $cond = "AND status!='5' and id='$add_seq_no'";
//         $details = $this->org->fetch('address', $cond);
         
           $cond = "AND status!='5' and par_seq_no='$par_seq_no'";
         $details1 = $this->org->fetch('parent', $cond);
        // $this->data['addr'] = $details;
         $this->data['addr1'] = $details1;
       
        // t($this->data['addr'],1);
        $aapcode= substr(rand(0,99999).rand(999,99999), 0, 2);
         $arr= Array();
        // $arr['appcode'] = $aapcode;
         $email = $this->data['addr1'][0]['email'];
        
         $st= date('d',strtotime($this->data['addr1'][0]['reg_start_date']));
         $en= date('d',strtotime($this->data['addr1'][0]['reg_end_date']));
         $org= $this->data['addr1'][0]['org_id'];
         
        $cond = "AND status!='5' and org_seq_no='$org_id'";
        $details2 = $this->org->fetch('org', $cond);
        $this->data['addr2'] = $details2;
        $orgname= substr($this->data['addr2'][0]['org_name'],0,2);
         
        $app = "PR".$orgname.$st.$en.$aapcode;
        $arr['appcode'] = $app;
         
        // echo $app; die();
         $sub = "Generated Appcode";
         $message_content1 = "Your appcode is ".$app;
         $this->email_send($email, $sub, $message_content1, 0, 1); 
         $cond = " AND `status`!=5 AND `par_seq_no`='{$par_seq_no}'";
        
        $chk1=$this->org->edit_cond('parent', $arr, $cond);
        // echo $this->db->last_query(); die();
        if ($chk1) {
                $this->session->set_flashdata('suc_message', 'Appcode sent successfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
         
         redirect('org/manageparent/index');
    }

        public function add() {
            

     $org_id = $this->data['org_id'];
        //echo "Hi";
        $arr = array();
        $arrra = array();

        $first_name = $this->input->post('f_first_name');
         $last_name = $this->input->post('f_last_name');
          $m_first_name = $this->input->post('m_first_name');
         $m_last_name = $this->input->post('m_last_name');
         //$orgid = $this->input->post('orgid');
         //$org_id=  base64_decode($orgid);
         //$aapcode= substr(uniqid(), 0, 10);
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $phno = $this->input->post('phno');
        $mobno = $this->input->post('mobno');
        $email = $this->input->post('email');
        $house = $this->input->post('house');
        $street = $this->input->post('street');
        $postal = $this->input->post('postal');
        $child = $this->input->post('child');
      
        $remarks = $this->input->post('remarks');
         $start_date = $this->input->post('start_date');
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = $this->input->post('end_date');
        $end_date = date('Y-m-d', strtotime($end_date));
        $stud = $this->input->post('stud');

        $arr['city'] = $city;
        $arr['county'] = $county;
        $arr['phone'] = $phno;
        $arr['mobile_cell'] = $mobno;
        $arr['email'] = $email;
        $arr['postal_code'] = $postal;
        $arr['remarks_notes'] = $remarks;
        $arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;


        $arra['fath_first_name'] = $first_name;
        $arra['fath_last_name'] = $last_name;
        $arra['mot_first_name'] = $m_first_name;
        $arra['mot_last_name'] = $m_last_name;
        $arra['org_id'] = $org_id; 
        $arra['phno'] = $phno;
        $arra['email'] = $email;
        $arra['house_name_number'] = $house;
        $arra['street_name'] = $street;
      
        //$arra['appcode'] = $aapcode;
       
        $arra['no_child'] = $child;
        $arra['reg_start_date'] = $start_date;
        
        $arra['reg_end_date'] = $end_date;
        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;

       // t($arra,1);
        if ($id = $this->org->add('address', $arr)) {

//                $details = $this->admin->fetch('address');
//                $id=  $details[0]['id'];
            $arra['add_seq_no'] = $id;
            // t($arra,1);
            if($p_id=$this->org->add('parent', $arra)){
                
                                    $data = array();
               foreach($stud as $key => $value){
                 
                 $data['org_id'] = $org_id; 
                 $data['par_id']=$p_id;
                  $data['stu_id']=$value;
                  $data['status']= '1';
                  $this->org->add('par_stu_map', $data);
                  
               }
           // t($data,1);
                
            }
            
               
            
//                $sub = "Generated Appcode";
//                $message_content1 = "Your appcode is ".$aapcode;
//        //echo $message_content1; die();
//        //$this->email->clear();
//            $this->email_send($email, $sub, $message_content1, 0, 1); 
//        //echo 'ddggdg-'.$chkEmailStatus;die();

            $this->session->set_flashdata('suc_message', 'Parent Added Sucessfully');
            redirect('org/manageparent/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "manageparent/add", $this->data);
        }
    }

    public function edit($id, $org) {
        

        $org_id = $this->data['org_id'];
      
        $id = base64_decode($id);
        $org = base64_decode($org);
        
         //echo $id.$org; die();
        $arr = array();
        $arrra = array();
        if (isset($_POST['f_first_name'])) {  
            
          $idd = $this->input->post('org');
         $org = $this->input->post('idd');
        $idd = base64_decode($idd);
        $org = base64_decode($org);
            
            $first_name = $this->input->post('f_first_name');
         $last_name = $this->input->post('f_last_name');
          $m_first_name = $this->input->post('m_first_name');
         $m_last_name = $this->input->post('m_last_name');
         
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $phno = $this->input->post('phno');
        $mobno = $this->input->post('mobno');
        $email = $this->input->post('email');
        $house = $this->input->post('house');
        $street = $this->input->post('street');
        $postal = $this->input->post('postal');
        $child = $this->input->post('child');
      
        $remarks = $this->input->post('remarks');
         $start_date = $this->input->post('start_date');
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = $this->input->post('end_date');
        $end_date = date('Y-m-d', strtotime($end_date));

        $arr['city'] = $city;
        $arr['county'] = $county;
        $arr['phone'] = $phno;
        $arr['mobile_cell'] = $mobno;
        $arr['email'] = $email;
        $arr['postal_code'] = $postal;
        $arr['remarks_notes'] = $remarks;
        $arr['updated_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;


        $arra['fath_first_name'] = $first_name;
        $arra['fath_last_name'] = $last_name;
        $arra['mot_first_name'] = $m_first_name;
        $arra['mot_last_name'] = $m_last_name;
        
        $arra['house_name_number'] = $house;
        $arra['street_name'] = $street;
      
        $arra['no_child'] = $child;
          $arra['reg_start_date'] = $start_date;
        
        $arra['reg_end_date'] = $end_date;
        $arra['updated_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;

            //t($arra,1); 
            $cond = " AND `status`!=5 AND `id`='{$idd}'";
            $this->org->edit_cond('address', $arr, $cond) ;
               
            
                $cond1 = " AND `status`!=5 AND `par_seq_no`='{$id}'";

                $chk1=$this->org->edit_cond('parent', $arra, $cond1);
           
            if ($chk || $chk1) {
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
            redirect('org/manageparent/index');
        } else {
            
              $details = $this->org->fetch('city');
                  $this->data['dets']= $details;
            $cond3 = "AND status!='5' and par_seq_no='$id'";
            $details = $this->org->fetch('parent', $cond3);
           //t($details,1);
            foreach ($details as $key => $value) {
                $email = $value['email'];
                $mobile = $value['phno'];
                $id = $value['add_seq_no'];
                $cond = "AND id=$id and status!='5' and id='$org'";
                $org_details = $this->org->fetch('address', $cond);
                 //t($org_details,1);
//                $details[$key]['email'] = $org_details[0]['email'];
//                $details[$key]['phone'] = $org_details[0]['phone'];
                
                $details[$key]['email'] = $email;
                $details[$key]['phone'] = $mobile;
                $details[$key]['mobile_cell'] = $org_details[0]['mobile_cell'];
                $details[$key]['postal_code'] = $org_details[0]['postal_code'];
                $details[$key]['website_url'] = $org_details[0]['website_url'];
                $details[$key]['remarks_notes'] = $org_details[0]['remarks_notes'];
                $city = $org_details[0]['city'];
                $county = $org_details[0]['county'];
                $cond1 = "AND id=$city";
                $cond2 = "AND id=$county";
                $city_details = $this->org->fetch('city', $cond1);
                $county_details = $this->org->fetch('county', $cond2);
                $details[$key]['city'] = $city_details[0]['city_name'];
                $details[$key]['county'] = $county_details[0]['county_name'];
            }
            $this->data['det'] = $details;
            //t($this->data['det'],1);
            $this->get_include();
            $this->load->view($this->viewDir . "manage_parent/edit", $this->data);
        }
    }

    function delete($id, $orig) {

        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            $org = base64_decode($orig);
            $arr['status'] = 5;
            $cond = " and par_seq_no='{$id}'";
            $this->org->edit_cond('parent', $arr, $cond);
            $cond1 = " and id='{$org}'";
            $this->org->edit_cond('address', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/manageparent/index');
    }

}
