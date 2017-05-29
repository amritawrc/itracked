<?php

class Org_managevenue extends MY_OrgController {

    function __construct() {
        parent::__construct();
       $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {

        //$userSession = $this->session->userdata;

        $org_id = $this->data['org_id'];
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('venue', $cond3);

        foreach ($details as $key => $value) {
            $org_id = $value['org_id'];
            $cond4 = "AND admin_id= $org_id and status!='5'";
            $name = $this->org->fetch('admin', $cond4);

            $id = $value['add_seq_no'];
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
            $details[$key]['name'] = $name[0]['frist_name'];
        }
        $this->data['det'] = $details;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_venue/listing", $this->data);
    }

    function view() {


        $org_id = $this->data['org_id'];

        $details = $this->org->fetch('codes');

        $this->data['det'] = $details;

        $details = $this->org->fetch('city');

        $this->data['dets'] = $details;

        $userSession = $this->session->userdata;

//        $cond3 = "AND status!='5' AND `org_id`='{$userSession['admin_data'][0]['org_seq_no']}'";
//        $details = $this->org->fetch('instructor', $cond3);
//        $this->data['ins'] = $details;
//        $stu = $this->org->fetch('student', $cond3);
//        $this->data['stu'] = $stu;
//        $cond3 = "AND status!='5' AND `org_id`='1' and type='i'";
//        $details = $this->org->fetch('instructor', $cond3);
//        $this->data['ins'] = $details;
//        $stu = $this->org->fetch('student', $cond3);
//        $this->data['stu'] = $stu;


        $cond3 = "AND status!='5' AND type='i' AND `org_id`='$org_id' ";
        $details = $this->org->fetch('user', $cond3);
        $this->data['ins'] = $details;

        $cond3 = "AND status!='5' AND type='s' AND `org_id`='$org_id' ";
        $stu = $this->org->fetch('user', $cond3);
        $this->data['stu'] = $stu;


        $this->get_include();
        $this->load->view($this->viewDir . "manage_venue/add", $this->data);
    }

    public function add() {


        $org_id = $this->data['org_id'];

        $arr = array();
        $arrra = array();


        $venue_name = $this->input->post('venue_name');
        // $orgid = $this->input->post('orgid');
        //$org_id = base64_decode($orgid);
        //$aapcode= substr(uniqid(), 0, 10);
        //$county = $this->input->post('county');
        // $city = $this->input->post('city');
        $phno = $this->input->post('phno');
        $mobno = $this->input->post('mobno');
        $email = $this->input->post('email');
        $house = $this->input->post('house');
        $street = $this->input->post('street');
        $postal = $this->input->post('postal');


        $contact = $this->input->post('contact');
        $remarks = $this->input->post('remarks');


        $arr['city'] = 1;
        $arr['county'] = 1;
        $arr['phone'] = $phno;
        $arr['mobile_cell'] = $mobno;
        $arr['email'] = $email;
        $arr['postal_code'] = $postal;

        $arr['remarks_notes'] = $remarks;
        $arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;


        $arra['ven_name'] = $venue_name;
        $arra['org_id'] = $org_id;

        $arra['house_name_number'] = $house;
        $arra['street_name'] = $street;
        $arra['contact_ref_no'] = $contact;

        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;

        //t($arra,1);
        //t($stud,1);
        if ($id = $this->org->add('address', $arr)) {


            $arra['add_seq_no'] = $id;

            $ven_id = $this->org->add('venue', $arra);

            $this->session->set_flashdata('suc_message', 'Venue Added Successfully');
            redirect('org/managevenue/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "managevenue/add", $this->data);
        }
    }

    public function edit($id, $org) {



        $org_id = $this->data['org_id'];
        $id = base64_decode($id);
        $org = base64_decode($org);

        //echo $id.$org; die();
        $arr = array();
        $arrra = array();
        if (isset($_POST['venue_name'])) {
            $idd = $this->input->post('org');
            $org = $this->input->post('idd');
            $idd = base64_decode($idd);
            $org = base64_decode($org);


            $venue_name = $this->input->post('venue_name');

            // $county = $this->input->post('county');
            // $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $mobno = $this->input->post('mobno');
            $email = $this->input->post('email');
            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');


            $contact = $this->input->post('contact');
            $remarks = $this->input->post('remarks');


            $arr['city'] = 1;
            $arr['county'] = 1;
            $arr['phone'] = $phno;
            $arr['mobile_cell'] = $mobno;
            $arr['email'] = $email;
            $arr['postal_code'] = $postal;

            $arr['remarks_notes'] = $remarks;
            $arr['updated_date'] = date('Y-m-d H:i:s');
            $arr['status'] = 1;


            $arra['ven_name'] = $venue_name;

            $arra['house_name_number'] = $house;
            $arra['street_name'] = $street;
            $arra['contact_ref_no'] = $contact;

            $arra['updated_date'] = date('Y-m-d H:i:s');
            $arra['status'] = 1;

            //t($arr,1);
            $cond = " AND `status`!=5 AND `id`='{$idd}'";
            $this->org->edit_cond('address', $arr, $cond);
            // t($cond,1); 

            $cond1 = " AND `status`!=5 AND `ven_seq_no`='{$id}'";

            $chk1 = $this->org->edit_cond('venue', $arra, $cond1);

            if ($chk || $chk1) {
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
            redirect('org/managevenue/index');
        } else {

            //$userSession = $this->session->userdata;
            $cond3 = "AND status!='5' AND `org_id`='$org_id'";
            $details = $this->org->fetch('event', $cond3);
            $this->data['ins'] = $details;

            $details = $this->org->fetch('city');
            $this->data['dets'] = $details;
            $cond3 = "AND status!='5' and ven_seq_no='$id'";
            $details = $this->org->fetch('venue', $cond3);
            //t($details,1);
            foreach ($details as $key => $value) {
                $id = $value['add_seq_no'];
                $cond = "AND id=$id and status!='5' and id='$org'";
                $org_details = $this->org->fetch('address', $cond);
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
                $city_details = $this->org->fetch('city', $cond1);
                $county_details = $this->org->fetch('county', $cond2);
                $details[$key]['city'] = $city_details[0]['city_name'];
                $details[$key]['county'] = $county_details[0]['county_name'];
            }
            $this->data['det'] = $details;
            //t($this->data['det'],1);
            $this->get_include();
            $this->load->view($this->viewDir . "manage_venue/edit", $this->data);
        }
    }

    function delete($id, $orig) {

        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            $org = base64_decode($orig);
            $arr['status'] = 5;
            $cond = " and ven_seq_no='{$id}'";
            $this->org->edit_cond('venue', $arr, $cond);
            $cond1 = " and id='{$org}'";
            $this->org->edit_cond('address', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/managevenue/index');
    }

}
