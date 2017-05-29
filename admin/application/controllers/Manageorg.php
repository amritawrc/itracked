<?php

class Manageorg extends MY_AdminController {

    function __construct() {
        parent::__construct();
        //echo 123;
        // $this->checkSessionForUser(); ///////for login check(refer my controller)/////

       // echo 456;exit;
        $this->load->model('admin');
    }

    public function index() {
        $this->checkSessionForUser();
        $cond3 = "AND status < '5'";
        $details = $this->admin->fetch('org', $cond3);
	//print_r($details  );
        foreach ($details as $key => $value) {
            $id = $value['add_seq_no'];
            $cond = "AND id=$id and status!='5'";
            $org_details = $this->admin->fetch('address', $cond);
	
            $details[$key]['email'] = $org_details[0]['email'];
            $details[$key]['phone'] = $org_details[0]['phone'];
            $city = $org_details[0]['city'];
            $county = $org_details[0]['county'];
            $cond1 = "AND id=$city";
            $cond2 = "AND id=$county";
            $city_details = $this->admin->fetch('city', $cond1);
            $county_details = $this->admin->fetch('county', $cond2);
            $details[$key]['city'] = $city_details[0]['city_name'];
            $details[$key]['county'] = $county_details[0]['county_name'];
        }
        $this->data['det'] = $details;
        //t($this->data['det'],1);
        $this->get_include();
        $this->load->view($this->viewDir . "manage_org/listing", $this->data);
    }

    public function add() {
        $this->checkSessionForUser();
        //echo "Hi";
        $arr = array();
        $arrra = array();
           $pass= '12345678';
           $pass_1 = base64_encode('12345678');
           $password = md5($pass);
        $name = $this->input->post('orgname');
       // $county = $this->input->post('county');
       // $city = $this->input->post('city');
        // $phno = $this->input->post('phno');
        $mobno = $this->input->post('mobno');
        $email = $this->input->post('email');
        // $website = $this->input->post('website');
        // $house = $this->input->post('house');
        // $street = $this->input->post('street');
        // $postal = $this->input->post('postal');
        // $type = $this->input->post('type');
        // $authno = $this->input->post('authno');
        $emgname = $this->input->post('emgname');
        // $role = $this->input->post('role');
        // $primary = $this->input->post('primary');
        // $secondary = $this->input->post('secondary');
        // $tertiary = $this->input->post('tertiary');
        // $start = $this->input->post('start_date');
        // $start = date('Y-m-d', strtotime($start));
        // $end = $this->input->post('end_date');
        // $end = date('Y-m-d', strtotime($end));
        // $lisence = $this->input->post('lisence');
        // $remarks = $this->input->post('remarks');
         
       
        //$arr['city'] = $city;
        //$arr['county'] = $county;
        // $arr['phone'] = $phno;
        $arr['mobile_cell'] = $mobno;
        $arr['email'] = $email;
        // $arr['postal_code'] = $postal;
        // $arr['website_url'] = $website;
        // $arr['remarks_notes'] = $remarks;
        $arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 0;
    // t($arr);
         $arra['username'] = $email;
         $arra['password'] = $password;
        $arra['org_name'] = $name;
        // $arra['pass'] = $pass;
        // $arra['house_name_number'] = $house;
        // $arra['street_name'] = $street;
        // $arra['org_type'] = $type;
        // $arra['org_auth_no'] = $authno;
        $arra['sp_contact_name'] = $emgname;
        // $arra['sp_contact_role'] = $role;
        // $arra['sp_contact_no1'] = $primary;
        // $arra['sp_contact_no2'] = $secondary;
        // $arra['sp_contact_no3'] = $tertiary;
        // $arra['reg_start_date'] = $start;
        // $arra['reg_end_date'] = $end;
        // $arra['lisence_fee_paid'] = $lisence;
        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 0;
// t($arra); exit;
        
        if ($id = $this->admin->add('address', $arr)) {

//                $details = $this->admin->fetch('address');
//                $id=  $details[0]['id'];
            $arra['add_seq_no'] = $id;
            // t($arra,1);
           $insert_id = $this->admin->add('org', $arra);
        //     $sub = "Login Details";
        //         $message_content1 = "Your username is ".$email." Your password is ".$pass;
        // //echo $message_content1; die();
        // //$this->email->clear();
        
            $this->VerifyEmail($arra['username'] , $insert_id, $arra['org_name'], $pass_1); 
    //   echo 123; exit;
            $this->session->set_flashdata('suc_message', 'organization Added Sucessfully');
            redirect('manageorg');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
           redirect('manageorg');
        }
    }

    public function edit($id, $org) {
        $this->checkSessionForUser();
      
        $id = base64_decode($id);
        $org = base64_decode($org);
        
         //echo $id.$org; die();
        $arr = array();
        $arrra = array();
        if (isset($_POST['orgname'])) {
            $idd = $this->input->post('org');
         $org = $this->input->post('idd');
        $idd = base64_decode($idd);
        $org = base64_decode($org);
         //echo $idd.$org; die();
            $name = $this->input->post('orgname');
           // $county = $this->input->post('county');
           // $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $add_seq_no = $this->input->post('add_seq_no');
            $mobno = $this->input->post('mobno');
            $email = $this->input->post('email');
            $website = $this->input->post('website');
            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');
            $type = $this->input->post('type');
            $authno = $this->input->post('authno');
            $emgname = $this->input->post('emgname');
            $role = $this->input->post('role');
            $primary = $this->input->post('primary');
            $secondary = $this->input->post('secondary');
            $tertiary = $this->input->post('tertiary');
            $start = $this->input->post('start_date');
            $start = date('Y-m-d', strtotime($start));
            $end = $this->input->post('end_date');
            $end = date('Y-m-d', strtotime($end));
            $lisence = $this->input->post('lisence');
            $remarks = $this->input->post('remarks');

            //$arr['city'] = $city;
            //$arr['county'] = $county;
            $arr['phone'] = $phno;
            $arr['mobile_cell'] = $mobno;
            $arr['email'] = $email;
            $arr['postal_code'] = $postal;
            $arr['website_url'] = $website;
            $arr['remarks_notes'] = $remarks;
            $arr['updated_date'] = date('Y-m-d H:i:s');
            $arr['status'] = 1;


            $arra['org_name'] = $name;
            $arra['house_name_number'] = $house;
            $arra['street_name'] = $street;
            $arra['org_type'] = $type;
            $arra['org_auth_no'] = $authno;
            $arra['sp_contact_name'] = $emgname;
            $arra['sp_contact_role'] = $role;
            $arra['sp_contact_no1'] = $primary;
            $arra['sp_contact_no2'] = $secondary;
            $arra['sp_contact_no3'] = $tertiary;
            $arra['reg_start_date'] = $start;
            $arra['reg_end_date'] = $end;
            $arra['lisence_fee_paid'] = $lisence;
            $arra['updated_date'] = date('Y-m-d H:i:s');
            $arra['status'] = 1;



            $cond = " AND `status`!=5 AND `id`='$add_seq_no '";
            $this->admin->edit_cond('address', $arr, $cond) ;

            
                $cond1 = " AND `status`!=5 AND `org_seq_no`='{$id}'";

                $chk1=$this->admin->edit_cond('org', $arra, $cond1);
           
            if ($chk || $chk1) {
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
            redirect('manageorg/index');
        } else {
            
            $details = $this->admin->fetch('codes');
                  $this->data['detl']= $details;
                  $details = $this->admin->fetch('city');
                  $this->data['dets']= $details;
                  
            $cond3 = "AND status!='5' and org_seq_no='$id'";
            $details = $this->admin->fetch('org', $cond3);
           //t($details,1);
            foreach ($details as $key => $value) {
                $id = $value['add_seq_no'];
                $cond = "AND id=$id and status!='5' and id='$org'";
                $org_details = $this->admin->fetch('address', $cond);
                 //t($org_details,1);
                $details[$key]['email'] = $org_details[0]['email'];
                $details[$key]['phone'] = $org_details[0]['phone'];
                $details[$key]['mobile_cell'] = $org_details[0]['mobile_cell'];
                $details[$key]['postal_code'] = $org_details[0]['postal_code'];
                $details[$key]['website_url'] = $org_details[0]['website_url'];
                $details[$key]['remarks_notes'] = $org_details[0]['remarks_notes'];
                //$city = $org_details[0]['city'];
                //$county = $org_details[0]['county'];
               // $cond1 = "AND id=$city";
               // $cond2 = "AND id=$county";
               // $city_details = $this->admin->fetch('city', $cond1);
               // $county_details = $this->admin->fetch('county', $cond2);
               // $details[$key]['city'] = $city_details[0]['city_name'];
               // $details[$key]['county'] = $county_details[0]['county_name'];
            }
            $this->data['det'] = $details;
            //t($this->data['det'],1);
            $this->get_include();
            $this->load->view($this->viewDir . "manage_org/edit", $this->data);
        }
    }
    function view($id, $org){
$this->checkSessionForUser();
        $id = base64_decode($id);
        $org = base64_decode($org);

                  $details = $this->admin->fetch('codes');
                  $this->data['detl']= $details;
                  $details = $this->admin->fetch('city');
                  $this->data['dets']= $details;
                  
            $cond3 = "AND status!='5' and org_seq_no='$id'";
            $details = $this->admin->fetch('org', $cond3);
           //t($details,1);
            foreach ($details as $key => $value) {
                $id = $value['add_seq_no'];
                $cond = "AND id=$id and status!='5' and id='$org'";
                $org_details = $this->admin->fetch('address', $cond);
                 //t($org_details,1);
                $details[$key]['email'] = $org_details[0]['email'];
                $details[$key]['phone'] = $org_details[0]['phone'];
                $details[$key]['mobile_cell'] = $org_details[0]['mobile_cell'];
                $details[$key]['postal_code'] = $org_details[0]['postal_code'];
                $details[$key]['website_url'] = $org_details[0]['website_url'];
                $details[$key]['remarks_notes'] = $org_details[0]['remarks_notes'];
                //$city = $org_details[0]['city'];
                //$county = $org_details[0]['county'];
               // $cond1 = "AND id=$city";
               // $cond2 = "AND id=$county";
               // $city_details = $this->admin->fetch('city', $cond1);
               // $county_details = $this->admin->fetch('county', $cond2);
               // $details[$key]['city'] = $city_details[0]['city_name'];
               // $details[$key]['county'] = $county_details[0]['county_name'];
            }
            $this->data['det'] = $details;
        
            $this->get_include();
            $this->load->view($this->viewDir . "manage_org/view", $this->data);

    }

    function delete($id, $orig) {
$this->checkSessionForUser();
        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            $org = base64_decode($orig);
            $arr['status'] = 5;
            $cond = " and org_seq_no='{$id}'";
            $this->admin->edit_cond('org', $arr, $cond);
            $cond1 = " and id='{$org}'";
            $this->admin->edit_cond('address', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('manageorg/index');
    }
    
    function email_id_check() {
		$this->checkSessionForUser();
        $email_id = $this->input->post('email_id');
        if ($email_id != '') {
            $cond = " and username = '" . $email_id . "'";
            $row = $this->admin->fetch('org', $cond);
            $this->data['email'] = $row;
            $row_1 = count($this->data['email']);
            if ($row_1 > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
    function VerifyEmail($email, $code, $org_name, $pass_1){
        // echo $email.' - - '.$code; 
        
        $link_url    = $this->data['base_url'].'manageorg/StatusUpdateViaEmail/';
        $one_time_password = base64_encode($code);
        $to     = $email;
		$path = $this->data['email_template_path'].'verifyEmail.html';
		$password = base64_decode($pass_1);
 	//exit;
//	echo	$message_tpl = file_get_contents($path);
		$message_tpl = $this->load->view($this->viewDir .'email/verifyEmail','',true);
// 	exit;
	    $patterns = array();
	    
	    $patterns[0] = '/!!!#org_name#!!!/';
	    $patterns[1] = '/!!!#link_url#!!!/';
	    $patterns[2] = '/!!!#year#!!!/';
        // $patterns[3] = '/!!!#logo#!/!!/'; 
        $patterns[3] = '/!!!#username#!!!/';
        $patterns[4] = '/!!!#password#!!!/';
        
        $replacements = array();
        
        $replacements[0] = ucfirst($org_name);
        $replacements[1] = $link_url.$one_time_password;
        $replacements[2] = date("Y");
        // $replacements[3] = 'http://itrackedltd.com/admin/assets/pages/img/itracked_logo.png';
    // exit;
        $replacements[3] = $email;
        $replacements[4] = $password;
        
        
        $message_content = preg_replace($patterns, $replacements, $message_tpl);
        //  t($message_content); exit;
        $subject = "Welcome to iTracked";
        
        $chkEmailStatus = $this->email_send($to, $subject, $message_content ,0,1);
// 		 echo 'ddggdg-'.$chkEmailStatus;exit;
        
        if($chkEmailStatus){
        	return 1;
        }else{
        	return 0;
        }
        
    }
    function StatusUpdateViaEmail($code = ''){
        // $this->checkSessionForUser();
        $code = base64_decode($code);
        
        $cond = "AND `org_seq_no`='$code' AND `status`='0'";
		$ExistsChk = $this->admin->fetch('org',$cond);
		
		$email = $ExistsChk[0]['username'];
		$organisation_name = $ExistsChk[0]['org_name'];
		

		if(count($ExistsChk)>0){
		    
		    $data_array = array(
		        'status' => '1',
		        'updated_by' => '1',
		        'updated_date' => date('Y-m-d')
		        );
		  $where = " AND `org_seq_no` = {$code}" ;
		  
		 $insert_status = $this->admin->edit_cond('org', $data_array, $where);   
		  //echo $this->db->last_query(); 
		  //exit;
		  if(!empty($insert_status)){
		      $this->org_registration_via_email($email , $code, $organisation_name); 
		      //echo 'devosmita'; exit;
		      $this->session->set_flashdata('suc_message', 'Thank you for verifying your email address.<br/>An email has been sent your email address. <br/>Please complete your registration by clicking on the button below.');
		      redirect('org/login');
		      //exit;
		      
		  }
		    
		}else{
		      $this->session->set_flashdata('suc_message', 'Something went wrong! Please try again!');
		      redirect('org/login');
		      //exit;
		  }
        
    }

    function org_registration_via_email($email, $code, $organisation_name){
        $code = base64_encode($code);
        $link_url    = $this->data['base_url'].'manageorg/org_add_details';
        $message_tpl = $this->load->view($this->viewDir .'email/organisationEmail','',true);
        
        $patterns = array();
        $patterns[0] = '/!!!#org_name#!!!/';
        $patterns[1] = '/!!!#link_url#!!!/';
      
        $replacements = array();
        $replacements[0] = ucfirst($organisation_name);
        $replacements[1] = $link_url . '/' . $code;
        
    $message_content = preg_replace($patterns, $replacements, $message_tpl);
    
    $subject = 'iTracked: Please complete your registration';
    // echo $to.','. $subject . ',' . $message_content;
    $chkEmailStatus = $this->email_send($email, $subject, $message_content ,0,1);
 		 //echo 'ddggdg-'.$chkEmailStatus;exit;
        
        if($chkEmailStatus){
        	return 1;
        }else{
        	return 0;
        }
    
    }
    function org_add_details($code = ''){
        $org_id = base64_decode($code);
        
        $cond = " AND org_seq_no = {$org_id}";
        $organisation_details = $this->admin->fetch('org', $cond);
        // t($organisation_details); exit;
        $submit = $this->input->post('org_details_add');
        if(isset($submit)){
             // $county = $this->input->post('county');
           // $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $add_seq_no = $this->input->post('add_seq_no');
            $mobno = $this->input->post('mobno');
            $website = $this->input->post('website');
            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');
            $type = $this->input->post('type');
            $authno = $this->input->post('authno');
            $emgname = $this->input->post('emgname');
            $role = $this->input->post('role');
            $primary = $this->input->post('primary');
            $secondary = $this->input->post('secondary');
            $tertiary = $this->input->post('tertiary');
            $start = $this->input->post('start_date');
            $start = date('Y-m-d', strtotime($start));
            $end = $this->input->post('end_date');
            $end = date('Y-m-d', strtotime($end));
            $lisence = $this->input->post('lisence');
            $remarks = $this->input->post('remarks');
            $currency = $this->input->post('currency');
            $bank_ac_no = $this->input->post('bank_ac_no');
            $bank_name = $this->input->post('bank_name');
            $bank_address = $this->input->post('bank_address');
            $iban_number = $this->input->post('iban_number');
            $routing_no = $this->input->post('routing_no');
            $data_address = array(
                'phone' => $phno,
                'address_line1' => $house,
                'address_line2' => $street,
                'mobile_cell'=> $mobno,
                'email' => $organisation_details[0]['username'],
                'postal_code' => $postal,
                'website_url' => $website,
                'remarks_notes' => $remarks,
                'updated_by' => $org_id,
                'updated_date' => time(),
                'status' => 1
                );
                // t($data_address);
              $where = " AND `id` = '" . $organisation_details[0]['add_seq_no'] ."' " ;
             $insert_address = $this->admin->edit_cond('address', $data_address, $where) ;
            //  echo $this->db->last_query();
            if($insert_address){
                $dat_org = array(
                'phno' => $phno,
                'postal' => $postal,
                'website' => $website,
                'house_name_number' => $house,
                'street_name' => $street,
                'org_type' => $type,
                'org_auth_no' => $authno,
                'sp_contact_role' => $role,
                'sp_contact_no1' => $primary,
                'sp_contact_no2' => $secondary,
                'sp_contact_no3' => $tertiary,
                'reg_start_date' => $start,
                'reg_end_date' => $end,
                'lisence_fee_paid' => $lisence,
                'updated_by' => $org_id,
                'updated_date' => time(),
                'currency' =>$currency,
                'bank_ac_no' => $bank_ac_no,
                'bank_name' => $bank_name,
                'bank_address' => $bank_address,
                'iban_number' => $iban_number,
                'routing_no' => $routing_no
                    );
                    // t($dat_org); 
                $where = " AND `org_seq_no` = {$org_id}";   
                $insert_org = $this->admin->edit_cond('org', $dat_org, $where) ;
                // echo $this->db->last_query();exit;
                if($insert_org){
                     $this->session->set_flashdata('suc_message', 'Thank you for registering with iTracked. Please log in to continue.');
		            redirect('org/login');
                    
                } else{
                     $this->session->set_flashdata('suc_message', 'Something went wrong! Please try again');
		            redirect('org/login');
                }
            }
        } else{
            $details = $this->admin->fetch('codes');
            $this->data['detl']= $details;
        }
        
        // t($this->data['detl']); exit; 
        $this->data['organisation_details'] = $organisation_details[0];
        $this->get_include();
        $this->load->view($this->viewDir . "manage_org/org_details_add", $this->data);   
    }
    

}
