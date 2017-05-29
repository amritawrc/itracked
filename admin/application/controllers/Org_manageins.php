<?php

class Org_manageins extends MY_OrgController {

    function __construct() {
        parent::__construct();
         $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {
        

         $org_id = $this->data['org_id'];
         
        // echo $org_id;exit;
        //$org_admin_id = $userSession['admin_data'][0]['org_seq_no']; 
//    exit;
        //$userSession = $this->session->userdata;
//        $sql = "SELECT ins.*, "
//                . "addr.id, addr.address_line1, addr.address_line2, addr.email as email_address, addr.postal_code, addr.country, addr.phone, addr.mobile_cell, "
//                . "usr.id, usr.status as status_1, usr.type, usr.email as username, usr.org_id as organisation_id, "
//                . "country.id, country.country_id, country.name "
//                . "FROM tbl_instructor as ins "
//                . "LEFT JOIN tbl_user as usr ON ins.user_id = usr.id "
//                . "LEFT JOIN tbl_address as addr ON ins.add_seq_no = addr.id "
//                . "LEFT JOIN tbl_country as country ON addr.country = country.id "
//                . "WHERE usr.org_id =1 AND usr.status = 1 AND usr.type = 'i'";                     //################ Replace ins.org_id = 1 with $org_admin_id when login works ################ //
        $sql = "SELECT ins.*, "
                . " "
                . "usr.id, usr.status as status_1, usr.phone,usr.type, usr.email as username, usr.org_id as organisation_id "
                . ""
                . "FROM tbl_instructor as ins "
                . "LEFT JOIN tbl_user as usr ON ins.user_id = usr.id "
//                . "LEFT JOIN tbl_address as addr ON ins.add_seq_no = addr.id "
//                . "LEFT JOIN tbl_country as country ON addr.country = country.id "
                . "WHERE usr.org_id = '" . $org_id . "' AND usr.status < 5 AND usr.type = 'i'";                     //################ Replace ins.org_id = 1 with $org_admin_id when login works ################ //
        $query = $this->db->query($sql);
        $row  =  $query->result_array();
        $this->data['det'] = $row;
        //t($this->data['det'],1); exit;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_ins/listing", $this->data);
    }

    function view() {

        $details = $this->org->fetch('city');
        $this->data['dets']= $details;
        
            $sql = "SELECT * FROM `tbl_country` WHERE 1";
            $query = $this->db->query($sql);
//            echo $this->db->last_query();
            $rowC = $query->result_array();
            $this->data['all_country'] = $rowC;
//            t($this->data['all_country'], 1);
//            exit;
       $this->get_include();
        $this->load->view($this->viewDir . "manage_ins/add", $this->data); 
    }

    function fetch_county($country_id = '', $state_id = '') {
        if ($country_id == '') {
            $country_id = $this->input->post('country_id');
        }
        if ($state_id == '') {
            $state_id = $this->input->post('state_id');
        }
        $cond = " and state_seq_no = '" . $state_id . "'";
        $return = $this->org->fetch('county', $cond);
        //echo $this->db->last_query();
        //t($return);
        //exit;
        $opt = '<option value="">County</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['id'] . '">' . $value['county_name'] . '</option>';
        }
        echo json_encode($opt);
    }

    public function add() {
        

        $org_id = $this->data['org_id'];
//    exit;
       // $org_admin_id = $userSession['admin_data'][0]['org_seq_no']; 
        $submit = $this->input->post('instructor_add');
        
        if (isset($submit)) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            
//            $orgid = $this->input->post('orgid');
//            $org_id = base64_decode($orgid);
//            $aapcode= substr(rand(0,99999).rand(999,99999), 0, 2);
//            $county = $this->input->post('county');
//            $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $mobno = $this->input->post('mobno');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);

            $random = uniqid();
            $random1 = base64_encode($random);
            $final_password = $password . $random1;


            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');
            $country = $this->input->post('country');
            $gender = $this->input->post('gender');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $dob = implode("-", $whole_date);
            $ins_type = $this->input->post('ins_type');
            $education = $this->input->post('education');
            $exp = $this->input->post('exp');
            $rel = $this->input->post('rel');
            $auth = $this->input->post('auth');
            $start_date = $this->input->post('start_date');
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = $this->input->post('end_date');
            $end_date = date('Y-m-d', strtotime($end_date));
            $st = date('d', strtotime($start_date));
            $st = date('d', strtotime($end_date));
            $en = date('d', strtotime($this->data['addr1'][0]['reg_end_date']));
            $ski = $this->input->post('ski');
            $fee_type = $this->input->post('fee_type');
            $currency = $this->input->post('currency');
            $fee = $this->input->post('fee');
            $remarks = $this->input->post('remarks');

            $cond = "AND status!='5' and org_seq_no='$org_id'";
            $details2 = $this->org->fetch('org', $cond);
            $this->data['addr2'] = $details2;
            $orgname = substr($this->data['addr2'][0]['org_name'], 0, 2);    ////
//        $app = "IN".$orgname.$st.$en.$aapcode;       
            ///////////////// INSERT ADDRESS DETAILS INTO USER TABLE ////////////////////
            
            $user_address = array(
                'address_line1' => $house,
                'address_line2' => $street,
                'email' => $email,
                'phone' => $phno,
                'mobile_cell' => $mobno,
                'country' => $country,
                'postal_code' => $postal,
                'remarks_notes' => $remarks
            );
//                t($user_address); 
            $address_id = $this->org->add('address', $user_address);
//        echo $this->db->last_query(); 
//        exit;
        
            ///////////////// INSERT INSTRUCTOR DETAILS INTO USER TABLE /////////////////  

            $userData = array(
                'org_id' => $org_id,
                'type' => 'i',
//            'appcode' => $aapcode,
                'fname' => $first_name,
                'lname' => $last_name,
                'email' => $email,
                'password' => $final_password,
                'salt' => $random,
                'phone' => $phno,
                'gender' => $gender,
                'address_id' => $address_id,
                'status' => 1
            );
//        t($userData); 
            $insert_user = $this->org->add('user', $userData);
//        echo $this->db->last_query(); 
//        exit;
            ///////////////// INSERT INSTRUCTOR DETAILS INTO INSTRUCTOR TABLE //////////////////
            $insData = array(
                'org_id' => $org_id,                       //################ Replace 1 with $org_admin_id when login works ################ //
                'user_id' => $insert_user,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'gender' => $gender,
                'dob' => $dob,
                'education' => $education,
                'exp' => $exp,
                'rele_exp' => $rel,
                'ins_type' => $ins_type,
                'ins_profile_app' => $ski,
                'add_seq_no' => $address_id,
                'auth_ref_no' => $auth,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'fee_type' => $fee_type,
                'fee_curr' => $currency,
                'fee' => $fee,
                'created_date' => time(),
                'updated_date' => time(),
                'created_by' => $org_id,               //################ Replace 1 with $org_admin_id when login works ################ //                                 
                'updated_by' => $org_id,               //################ Replace 1 with $org_admin_id when login works ################ //
                'status' => 1
            );
            //        t($insData); 
            $insert_ins = $this->org->add('instructor', $insData);
//        echo $this->db->last_query(); 
//        exit;
            if ($insert_ins) {
                $msg = 'Instructor added successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect('org/manageins/index');
            } else {
                $msg = 'Error in editing attorney manager';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            }
        } else {
            $sql = "SELECT * FROM `tbl_country` WHERE 1";
            $query = $this->db->query($sql);
            $rowC = $query->result_array();
            $this->data['all_country'] = $rowC;
//            t($this->data['all_country'], 1);
        }

        //t($arra,1);
        $this->get_include();
        $this->load->view($this->viewDir . "manageins/add", $this->data);
    }

    public function edit($id,$uid) {
       
      $org_id = $this->data['org_id']; 
      $id = base64_decode($id);
      //$uid = base64_decode($uid); 
      
//      $cond = "AND id = '" . $uid . "'";
//      $row = $this->org->fetch('user',$cond);
//      echo $this->db->last_query();
//      
////    exit;
//       //$org = base64_decode($org); 
//
//        $this->data['uid'] = $uid;
//        echo $id.$uid; 
//        exit;
        $arr = array();
        $arrra = array();
        $submit = $this->input->post('instructor_add');
          if (isset($submit)) {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $uid = $this->input->post('user_id');
//            $orgid = $this->input->post('orgid');
//            $org_id = base64_decode($orgid);
//            $aapcode= substr(rand(0,99999).rand(999,99999), 0, 2);
//            $county = $this->input->post('county');
//            $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $mobno = $this->input->post('mobno');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = md5($password);

            $random = uniqid();
            $random1 = base64_encode($random);
            $final_password = $password . $random1;


            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');
            $country = $this->input->post('country');
            $gender = $this->input->post('gender');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $day = $this->input->post('day');
            $whole_date = array($day, $month, $year);
            $dob = implode("-", $whole_date);
            $ins_type = $this->input->post('ins_type');
            $education = $this->input->post('education');
            $exp = $this->input->post('exp');
            $rel = $this->input->post('rel');
            $auth = $this->input->post('auth');
            $start_date = $this->input->post('start_date');
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = $this->input->post('end_date');
            $end_date = date('Y-m-d', strtotime($end_date));
            $st = date('d', strtotime($start_date));
            $st = date('d', strtotime($end_date));
            $en = date('d', strtotime($this->data['addr1'][0]['reg_end_date']));
            $ski = $this->input->post('ski');
            $fee_type = $this->input->post('fee_type');
            $currency = $this->input->post('currency');
            $fee = $this->input->post('fee');
            $remarks = $this->input->post('remarks');

            $cond = "AND status!='5' and org_seq_no='$org_id'";
            $details2 = $this->org->fetch('org', $cond);
            $this->data['addr2'] = $details2;
            $orgname = substr($this->data['addr2'][0]['org_name'], 0, 2);    ////
//        $app = "IN".$orgname.$st.$en.$aapcode;       
            ///////////////// INSERT ADDRESS DETAILS INTO USER TABLE ////////////////////
            
            $user_address = array(
                'address_line1' => $house,
                'address_line2' => $street,
                'email' => $email,
                'phone' => $phno,
                'mobile_cell' => $mobno,
                'country' => $country,
                'postal_code' => $postal,
                'remarks_notes' => $remarks
            );
//                t($user_address); 
            $cond= "And id='$id'";
            $address_id = $this->org->edit_cond('address', $user_address,$cond);
//        echo $this->db->last_query(); 
//        exit;
        
            ///////////////// INSERT INSTRUCTOR DETAILS INTO USER TABLE /////////////////  
               $cond= "And id='$uid'";
            $userData = array(
                'org_id' => $org_id,
                'type' => 'i',
//            'appcode' => $aapcode,
                'fname' => $first_name,
                'lname' => $last_name,
                'email' => $email,
                'password' => $final_password,
                'salt' => $random,
                'phone' => $phno,
                'gender' => $gender,
                'address_id' => $id,
                'status' => 1
            );
//        t($userData); 
            $insert_user = $this->org->edit_cond('user', $userData,$cond);
//        echo $this->db->last_query(); 
//        exit;
            ///////////////// INSERT INSTRUCTOR DETAILS INTO INSTRUCTOR TABLE //////////////////
            
           
            $insData = array(
                'org_id' => $org_id,                       //################ Replace 1 with $org_admin_id when login works ################ //
                'user_id' => $uid,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'gender' => $gender,
                'dob' => $dob,
                'education' => $education,
                'exp' => $exp,
                'rele_exp' => $rel,
                'ins_type' => $ins_type,
                'ins_profile_app' => $ski,
                'add_seq_no' => $id,
                'auth_ref_no' => $auth,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'fee_type' => $fee_type,
                'fee_curr' => $currency,
                'fee' => $fee,
                'created_date' => time(),
                'updated_date' => time(),
                'created_by' => $org_id,               //################ Replace 1 with $org_admin_id when login works ################ //                                 
                'updated_by' => $org_id,               //################ Replace 1 with $org_admin_id when login works ################ //
                'status' => 1
            );
                   // t($insData,1); 
              $cond= "And ins_seq_no='$id'";
            $insert_ins = $this->org->edit_cond('instructor', $insData,$cond);
//        echo $this->db->last_query(); 
//        exit;
            if ($insert_ins) {
                $msg = 'Instructor edited successfully';
                $this->session->set_flashdata('suc_message', '<font color="green"><span class="err_msg">' . $msg . '</font></span>');
                redirect('org/manageins/index');
            } else {
                $msg = 'Error in editing instructor details';
                $this->session->set_flashdata('err_message', '<font color="red"><span class="err_msg">' . $msg . '</font></span>');
            }
        } else {

            $sql = "SELECT * FROM `tbl_country` WHERE 1";
            $query = $this->db->query($sql);
            $rowC = $query->result_array();
            $this->data['all_country'] = $rowC;
//            t($this->data['all_country'], 1);
//            exit;
                    $org_id = $this->data['org_id'];

        $sql = "SELECT ins.*, "
                . "addr.id, addr.address_line1, addr.address_line2, addr.postal_code, addr.country, addr.mobile_cell, addr.remarks_notes, "
                . "usr.id, usr.status as status_1, usr.phone,usr.type, usr.email as username, usr.org_id as organisation_id "
                . ""
                . "FROM tbl_instructor as ins "
                . "LEFT JOIN tbl_user as usr ON ins.user_id = usr.id "
                . "LEFT JOIN tbl_address as addr ON ins.add_seq_no = addr.id "
//                . "LEFT JOIN tbl_country as country ON addr.country = country.id "
                . "WHERE usr.org_id =$org_id AND usr.status = 1 AND usr.type = 'i' AND ins.ins_seq_no = '" . $id . "'";                     //################ Replace ins.org_id = 1 with $org_admin_id when login works ################ //
        $query = $this->db->query($sql);
//        echo $this->db->last_query();
        $row  =  $query->result_array();
        $this->data['det'] = $row;
//            t($this->data['det'],1); exit;
            $this->get_include();
            $this->load->view($this->viewDir . "manage_ins/edit", $this->data);
        }
    }

    function delete($id, $uid) {

        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            $uid = base64_decode($uid);
            $arr['status'] = 5;
            $cond = " and ins_seq_no='{$id}'";
            $this->org->edit_cond('instructor', $arr, $cond);
            $cond = " and id='{$uid}'";
            $this->org->edit_cond('user', $arr, $cond);
           // echo $cond; die();
            $cond1 = " and id='{$id}'";
            $this->org->edit_cond('address', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/manageins/index');
    }

}
