<?php

class Manageorg extends MY_AdminController {

    function __construct() {
        parent::__construct();
        //echo 123;
        //$this->checkSessionForUser();
       // echo 456;exit;
        $this->load->model('admin');
    }

    public function index() {
        $cond3 = "AND status!='5'";
        $details = $this->admin->fetch('org', $cond3);

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
        //echo "Hi";
        $arr = array();
        $arrra = array();
           $pass= '12345678';
           $password = md5($pass);
        $name = $this->input->post('orgname');
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $phno = $this->input->post('phno');
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
         
       
        $arr['city'] = $city;
        $arr['county'] = $county;
        $arr['phone'] = $phno;
        $arr['mobile_cell'] = $mobno;
        $arr['email'] = $email;
        $arr['postal_code'] = $postal;
        $arr['website_url'] = $website;
        $arr['remarks_notes'] = $remarks;
        $arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;

         $arra['username'] = $email;
         $arra['password'] = $password;
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
        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;

        //t($arr,1);
        if ($id = $this->admin->add('address', $arr)) {

//                $details = $this->admin->fetch('address');
//                $id=  $details[0]['id'];
            $arra['add_seq_no'] = $id;
            // t($arra,1);
            $this->admin->add('org', $arra);
            $sub = "Login Details";
                $message_content1 = "Your username is ".$email." Your password is ".$pass;
        //echo $message_content1; die();
        //$this->email->clear();
            $this->email_send($email, $sub, $message_content1, 0, 1); 
       
            $this->session->set_flashdata('suc_message', 'organization Added Sucessfully');
            redirect('dashboard/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "dashboard/index", $this->data);
        }
    }

    public function edit($id, $org) {
      
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
            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $phno = $this->input->post('phno');
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

            $arr['city'] = $city;
            $arr['county'] = $county;
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



            $cond = " AND `status`!=5 AND `id`='{$org}'";
            $this->admin->edit_cond('address', $arr, $cond) ;
                //t($arr,1); 
            
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
            $this->load->view($this->viewDir . "manage_org/edit", $this->data);
        }
    }

    function delete($id, $orig) {

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

}
