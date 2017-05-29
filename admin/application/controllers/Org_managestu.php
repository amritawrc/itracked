<?php

class Org_managestu extends MY_OrgController {

    function __construct() {
        parent::__construct();
        $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {

        $org_id = $this->data['org_id'];
        //$userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id' and type='s'";
        $details = $this->org->fetch('user', $cond3);

        $sql = "SELECT usr.*, eve.ev_seq_no, eve.org_id, eve.start_date, eve.end_date, evestu.id as eve_stu_id, evestu.org_id as eveorg_id, eve.event_name "
                . "FROM tbl_user as usr "
                . "LEFT JOIN tbl_event_stu_map as evestu ON usr.id = evestu.stu_id "
                . "LEFT JOIN tbl_event as eve ON evestu.ev_id = eve.ev_seq_no "
                . "WHERE usr.status < 5 AND usr.type = 's' AND usr.org_id=$org_id";
        $query = $this->db->query($sql);
        $row = $query->result_array();

//        t($row,1);
        //$dett = $this->org->fetch('stu_ev');
//        foreach ($details as $key => $value) {
//            
//            $org_id = $value['org_id'];
//            $cond4 = "AND org_seq_no = $org_id and status!='5'";
//            $name = $this->org->fetch('org', $cond4);
//            $id = $value['add_seq_no'];
//            $email = $value['email'];
//            $mobile = $value['mobile'];
//            if ($id) {
//                $cond = "AND id=$id and status!='5'";
//                $org_details = $this->org->fetch('address', $cond);
//
//                $details[$key]['email'] = $email;
//                $details[$key]['mobile'] = $mobile;
//                $city = $org_details[0]['city'];
//                $county = $org_details[0]['county'];
//                $cond1 = "AND id=$city";
//                $cond2 = "AND id=$county";
//                $city_details = $this->org->fetch('city', $cond1);
//                $county_details = $this->org->fetch('county', $cond2);
//                $details[$key]['city'] = $city_details[0]['city_name'];
//                $details[$key]['county'] = $county_details[0]['county_name'];
//                $details[$key]['name'] = $name[0]['org_name'];
//             
//            }
//
//
//            $details[$key]['event_name'] = $this->event_det($details[$key]['stu_seq_no']);
//            $details[$key]['event_id'] = $this->event_det1($details[$key]['stu_seq_no']);
//            
//              $stt_idd= $value['stu_seq_no'];
//              $cond4 = "AND user_id=$stt_idd";
//              $pay_det = $this->org->fetch('payments', $cond4);
//              $details[$key]['id'] = $pay_det[0]['user_id'];
//             
//             
//        }
        // t($details,1);

        $this->data['det'] = $row;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_stu/listing", $this->data);
    }

    function changePayment() {
        $status = $this->input->post('payment_status');
        $stu_id = $this->input->post('stud_id');
        $arr = array();
        $arr = array('payment_status' => $status);
        $cond = "AND id=$stu_id";
        $chk1 = $this->org->edit_cond('user', $arr, $cond);
//        echo $this->db->last_query();
        if ($chk1) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function view() {

        $details = $this->org->fetch('codes');
        $this->data['det'] = $details;

        $details = $this->org->fetch('city');
        $this->data['dets'] = $details;


        $org_id = $this->data['org_id'];
        // $userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('event', $cond3);
        $this->data['detss'] = $details;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_stu/add", $this->data);
    }

    function relate($stuid) {



        $org_id = $this->data['org_id'];
        $this->data['det1'] = $stuid;
        // $userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('event', $cond3);
        $this->data['dets'] = $details;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_stu/relate", $this->data);
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

    function fetch_group($event_id) {

        $event_id = $this->input->post('event_id');

        $cond = " and event_id = '" . $event_id . "'";
        $return = $this->org->fetch('group', $cond);

//        echo $this->db->last_query();
        //t($return);
        //exit;
        $opt = '<option value="">Enter Group</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['group_seq_no'] . '">' . $value['group_name'] . '</option>';
        }
        echo $opt;
    }

    function fetch_ins() {

        //if($country_id == '') { $country_id = $this->input->post('country_id'); }
        $eve_id = $this->input->post('eve_id');

        $select = "ins_id";
        $cond = " and ev_seq_no = '" . $eve_id . "'";
        $return = $this->org->fetch('event', $cond, $select);

        $ins_id = $return[0]['ins_id'];

        $cond = " and ins_seq_no = '" . $ins_id . "'";
        $return = $this->org->fetch('instructor', $cond);
        //echo $this->db->last_query();
        //t($return);
        //exit;
        //$opt = '<option value="">venue</option>';
        foreach ($return as $key => $value) {
            $opt .= '<option value="' . $value['ins_seq_no'] . '">' . $value['first_name'] . " " . $value['last_name'] . '</option>';
        }
        echo json_encode($opt);
    }

    function manage_ven_ev() {


        $org_id = $this->data['org_id'];
        $arr = array();
        $arra = array();
        $evid = $this->input->post('event');
        //$orgid = $this->input->post('orgid');
        // $org_id = base64_decode($orgid);
        $insid = $this->input->post('instructor');
        $stuid = $this->input->post('stuid');
        $stuid = base64_decode($stuid);
        $arr['org_id'] = $org_id;
        $arr['ins_id'] = $insid;
        $arr['stu_id'] = $stuid;
        $arr['ev_id'] = $evid;
        //$arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;

        $arra['map'] = 1;
        //t($arr,1);
        $this->org->add('event_stu_map', $arr);

        $cond1 = " AND `id`='{$stuid}'";
        $this->org->edit_cond('user', $arra, $cond1);

        $this->session->set_flashdata('suc_message', 'Student is added under an instructor');
        redirect('org/managestu/index');
    }

    public function add() {
        $org_id = $this->data['org_id'];
        //echo "Hi";
        $arr = array();
        $arrra = array();
        $st = array();
        $gr = array();

        $event = $this->input->post('event');
        $group = $this->input->post('group');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        // $orgid = $this->input->post('orgid');
        //$org_id = base64_decode($orgid);
        //$aapcode= substr(uniqid(), 0, 10);
        $county = $this->input->post('county');
        $city = $this->input->post('city');
        $phno = $this->input->post('phno');
        $mobno = $this->input->post('mobno');
        $email = $this->input->post('email');
        $house = $this->input->post('house');
        $street = $this->input->post('street');
        $postal = $this->input->post('postal');

        $gender = $this->input->post('gender');
        $dob = $this->input->post('dob');
        $dob = date('Y-m-d', strtotime($dob));
        $age = $this->input->post('age');
        $ski = $this->input->post('ski');
        $height = $this->input->post('height');
        $weight = $this->input->post('weight');
        $shoe = $this->input->post('shoe');
        $med = $this->input->post('med');

        $diet = $this->input->post('diet');
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
        $arr['created_date'] = date('Y-m-d H:i:s');
        $arr['status'] = 1;


        $arra['first_name'] = $first_name;
        $arra['last_name'] = $last_name;
        $arra['org_id'] = $org_id;
        $arra['mobile'] = $phno;
        $arra['email'] = $email;
        $arra['house_name_number'] = $house;
        $arra['street_name'] = $street;
        $arra['gender'] = $gender;
        //$arra['appcode'] = $aapcode;
        $arra['dob'] = $dob;
        $arra['age_on_return_to_uk'] = $age;
        $arra['shoe_size'] = $shoe;
        $arra['ski'] = $ski;
        $arra['height'] = $height;
        $arra['weight'] = $weight;
        $arra['medical'] = $med;
        $arra['dietary'] = $diet;
        $arra['reg_start_date'] = $start_date;

        $arra['reg_end_date'] = $end_date;
        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;

        //t($arra,1);
        if ($id = $this->org->add('address', $arr)) {

//                $details = $this->admin->fetch('address');
//                $id=  $details[0]['id'];
            $arra['add_seq_no'] = $id;
            // t($arra,1);
            $stt = $this->org->add('student', $arra);

            $cond = "AND status!='5' and ev_seq_no='$event'";
            $details = $this->org->fetch('event', $cond);

            $gr['org_id'] = $org_id;
            $gr['stu_id'] = $stt;
            $gr['grp_id'] = $group;
            $gr['ins_id'] = $details[0]['ins_id'];
            $gr['ev_id'] = $event;
            $gr['status'] = 1;

            $st['org_id'] = $org_id;
            $st['stu_id'] = $stt;
            $st['grp_id'] = $group;
            $st['event_id'] = $event;
            $st['status'] = 1;

            $this->org->add('event_stu_map', $gr);
            $this->org->add('grp_stu_map', $st);

            $this->session->set_flashdata('suc_message', 'Student Added Successfully');
            redirect('org/managestu/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "managestu/add", $this->data);
        }
    }

    function mailsent($id) {



        $org_id = $this->data['org_id'];
        $stu_seq_no = $id;
//
//        $cond = "AND status!='5' and id='$add_seq_no'";
//        $details = $this->org->fetch('address', $cond);

        $add_seq_no = $id;

        $cond = "AND status!='5' and id='$stu_seq_no'";
        $details1 = $this->org->fetch('user', $cond);
        //$this->data['addr'] = $details;
        $this->data['addr1'] = $details1;
        //t($this->data['addr'],1);

        $aapcode = substr(rand(0, 99999) . rand(999, 99999), 0, 2);
        $arr = Array();
        //$arr['appcode'] = $aapcode;
        $email = $this->data['addr1'][0]['email'];
        $st = date('d', strtotime($this->data['addr1'][0]['reg_start_date']));
        $en = date('d', strtotime($this->data['addr1'][0]['reg_end_date']));
        $org = $this->data['addr1'][0]['org_id'];

        $cond = "AND status!='5' and org_seq_no='$org_id'";
        $details2 = $this->org->fetch('org', $cond);
        $this->data['addr2'] = $details2;
        $orgname = substr($this->data['addr2'][0]['org_name'], 0, 2);

        $app = "ST" . $orgname . $st . $en . $aapcode;
        $arr['appcode'] = $app;
        // echo $orgname; die();

        $sub = "Generated Appcode";
        $message_content1 = "Your appcode is " . $app;
        $this->email_send($email, $sub, $message_content1, 0, 1);

        $cond = " AND `status`!=5 AND `id`='{$stu_seq_no}'";
        $chk1 = $this->org->edit_cond('user', $arr, $cond);
        // echo $this->db->last_query(); die();
        if ($chk1) {
            $this->session->set_flashdata('suc_message', 'Appcode sent successfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/managestu/index');
    }

    public function edit($id, $org) {


        $org_id = $this->data['org_id'];
        $id = base64_decode($id);
        $org = base64_decode($org);

        //echo $id.$org; die();
        $arr = array();
        $arrra = array();
        $st = array();
        $gr = array();

        if (isset($_POST['first_name'])) {
            $idd = $this->input->post('org');
            $org = $this->input->post('idd');
            $idd = base64_decode($idd);
            $org = base64_decode($org);
            //echo $idd.$org; die();

            $event = $this->input->post('event');
            $group = $this->input->post('group');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $orgid = $this->input->post('orgid');
            $org_id = base64_decode($orgid);

            $county = $this->input->post('county');
            $city = $this->input->post('city');
            $phno = $this->input->post('phno');
            $mobno = $this->input->post('mobno');
            $email = $this->input->post('email');
            $house = $this->input->post('house');
            $street = $this->input->post('street');
            $postal = $this->input->post('postal');

            $gender = $this->input->post('gender');
            $dob = $this->input->post('dob');
            $dob = date('Y-m-d', strtotime($dob));
            $age = $this->input->post('age');
            $ski = $this->input->post('ski');
            $height = $this->input->post('height');
            $weight = $this->input->post('weight');
            $shoe = $this->input->post('shoe');
            $med = $this->input->post('med');

            $diet = $this->input->post('diet');
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


            $arra['first_name'] = $first_name;
            $arra['last_name'] = $last_name;
//        $arra['org_id'] = $org_id; 
            $arra['email'] = $email;
            $arra['mobile'] = $phno;
            $arra['house_name_number'] = $house;
            $arra['street_name'] = $street;
            $arra['gender'] = $gender;
            $arra['mobile'] = $phno;
            $arra['email'] = $email;
            $arra['dob'] = $dob;
            $arra['age_on_return_to_uk'] = $age;
            $arra['shoe_size'] = $shoe;
            $arra['ski'] = $ski;
            $arra['height'] = $height;
            $arra['weight'] = $weight;
            $arra['medical'] = $med;
            $arra['dietary'] = $diet;
            $arra['reg_start_date'] = $start_date;

            $arra['reg_end_date'] = $end_date;

            $arra['updated_date'] = date('Y-m-d H:i:s');
            $arra['status'] = 1;


            $cond = " AND `status`!=5 AND `id`='{$idd}'";
            $this->org->edit_cond('address', $arr, $cond);
            // t($cond,1); 

            $cond = "AND status!='5' and ev_seq_no='$event'";
            $details = $this->org->fetch('event', $cond);

            $gr['org_id'] = $org_id;
            $gr['stu_id'] = $id;
            $gr['grp_id'] = $group;
            $gr['ins_id'] = $details[0]['ins_id'];
            $gr['ev_id'] = $event;
            $gr['status'] = 1;

            $st['org_id'] = $org_id;
            $st['stu_id'] = $id;
            $st['grp_id'] = $group;
            $st['event_id'] = $event;
            $st['status'] = 1;

            $cond1 = " AND `status`!=5 AND `stu_id`='{$id}'";
            $this->org->edit_cond('event_stu_map', $gr, $cond1);

            $this->org->edit_cond('grp_stu_map', $st, $cond1);

            $cond1 = " AND `status`!=5 AND `id`='{$id}'";
            $chk1 = $this->org->edit_cond('user', $arra, $cond1);

            if ($chk || $chk1) {
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
            redirect('org/managestu/index');
        } else {

            //$userSession = $this->session->userdata;
            $cond3 = "AND status!='5' AND `org_id`='$org_id'";
            $details = $this->org->fetch('event', $cond3);
            $this->data['detss'] = $details;

            $details = $this->org->fetch('city');
            $this->data['dets'] = $details;

            $cond3 = "AND status!='5' and id='$id'";
            $details = $this->org->fetch('user', $cond3);
            //t($details,1);
            foreach ($details as $key => $value) {
                $email = $value['email'];
                $mobile = $value['mobile'];

                $id = $value['add_seq_no'];
                $cond = "AND id=$id and status!='5' and id='$org'";
                $org_details = $this->org->fetch('address', $cond);
                //t($org_details,1);
//                $details[$key]['email'] = $org_details[0]['email'];
//                $details[$key]['phone'] = $org_details[0]['phone'];

                $details[$key]['email'] = $email;
                $details[$key]['mobile'] = $mobile;
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
            $this->load->view($this->viewDir . "manage_stu/edit", $this->data);
        }
    }

   function delete($id) {

        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            //$org = base64_decode($orig);
            $arr['status'] = 5;
            $cond = " and id='{$id}'";
            $this->org->edit_cond('user', $arr, $cond);
           // $cond1 = " and id='{$org}'";
           // $this->org->edit_cond('address', $arr, $cond1);

           // $cond1 = " and stu_id='{$id}'";
           // $this->org->delete_cond('event_stu_map', $cond1);
           // $cond1 = " and stu_id='{$org}'";
            //$this->org->delete_cond('grp_stu_map', $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/managestu/index');
    }

    function event_det($stu_id = "") {

        $cond4 = "AND stu_id = $stu_id";
        $dett = $this->org->fetch('event_stu_map', $cond4);
        //echo $this->db->last_query(); 

        $cond4 = "AND ev_seq_no = {$dett[0]['ev_id']}";
        $dettt = $this->org->fetch('event', $cond4);
        //echo $this->db->last_query(); die();
        return (!empty($dettt) ? $dettt[0]['event_name'] : "");
    }

    function event_det1($stu_id = "") {

        $cond4 = "AND stu_id = $stu_id";
        $dett = $this->org->fetch('event_stu_map', $cond4);
        //echo $this->db->last_query(); 
        $cond4 = "AND ev_seq_no = {$dett[0]['ev_id']}";
        $dettt = $this->org->fetch('event', $cond4);
        //echo $this->db->last_query(); die();
        return (!empty($dettt) ? $dettt[0]['ev_seq_no'] : "");
    }

    function studentPanic($param) {

        $org_id = $this->data['org_id'];
        $sql = "select stu_id from tbl_event_stu_map where org_id=$org_id AND (panic=1 and seen=0) OR (panic=0 and seen=1)";
        $query = $this->db->query($sql);
        $panic_student = $query->result_array();
//        t($panic_student);
//        exit;
        foreach ($panic_student as $key => $value) {

            $cond = "AND id='" . $value['stu_id'] . "' and status!='5'";
            $panic_student_details = $this->org->fetch('user', $cond);

            $cond1 = "AND stu_id='" . $value['stu_id'] . "' and status!='5'";
            $dett = $this->org->fetch('event_stu_map', $cond1);

            $id = $panic_student_details[0]['add_seq_no'];
            if ($id) {
                $cond = "AND id=$id and status!='5'";
                $org_details = $this->org->fetch('address', $cond);

                $panic_student_details[0]['email'] = $org_details[0]['email'];

                $panic_student_details[0]['phone'] = $org_details[0]['phone'];

                $city = $org_details[0]['city'];
                $county = $org_details[0]['county'];

                $cond1 = "AND id=$city";
                $cond2 = "AND id=$county";
                $city_details = $this->org->fetch('city', $cond1);
                $county_details = $this->org->fetch('county', $cond2);

                $panic_student_details[0]['city'] = $city_details[0]['city_name'];
                $panic_student_details[0]['county'] = $county_details[0]['county_name'];
            } else {
                
            }


            $panic_student_details[0]['name'] = $name[0]['org_name'];

            $panic_student_details[0]['event_name'] = $this->event_det($panic_student_details[0]['id']);
            $panic_student_details[0]['event_id'] = $this->event_det1($panic_student_details[0]['id']);
            $panic_student_details[0]['seen'] = $dett[0]['seen'];
            $panic_student[$key]['details'] = $panic_student_details;
        }
//         t($panic_student);exit;
        $this->data['panic_student'] = $panic_student;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_stu/panic_student_list", $this->data);
    }

    function panicStudentLocation($stu_seq_no) {

        $stu_seq_no = base64_decode($stu_seq_no);
//       echo $stu_seq_no;
//       exit;

        $org_id = $this->data['org_id'];

        $sql = "select stu.type,stu.fname,stu.lname,stu.email,stu.phone as mobile,stu.gender,map.*,"
                . " stud.age_on_return_to_uk,tbl_event.event_name,ins.fname as instructor_first_name,"
                . " ins.lname as instructor_last_name"
                . " from tbl_event_stu_map as map"
                . " left join tbl_user as stu on map.stu_id = stu.id"
                . " left join tbl_event on tbl_event.ev_seq_no = map.ev_id "
                . " left join tbl_user as ins on ins.id = map.ins_id "
                . " left join tbl_user_details as stud on map.stu_id = stud.user_id"
                . " where map.org_id=$org_id AND map.stu_id=$stu_seq_no  AND map.panic=1 AND map.lat!=''";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();

//        echo $this->db->last_query();
//         t($row1);
        $select = "id,fname,lname,email,phone as mobile,lat,long";
//        $cond = "AND lat!='' and status!='5' AND type='i'";
        $cond = "AND status!='5' AND type='i'";
        $ins_details = $this->org->fetch('user', $cond, $select);

        if (count($ins_details)) {
            $row1 = array_merge($row1, $ins_details);
        }

//        echo $this->db->last_query();
//        t($row1);
//        exit;

        $this->data['details'] = $row1;
        $this->data['stu_id'] = $stu_seq_no;
        $this->data['instructor_image'] = $this->data['main_base_url'] . 'assets/upload/ballon.png';


//        $sql = "update tbl_event_stu_map set panic=0,seen=1 where org_id=$org_id";
//        $query = $this->db->query($sql);

        $this->get_include();
        $this->load->view($this->viewDir . "manage_stu/student_location", $this->data);
    }

    function panicStudentLocation1($stu_seq_no) {

        $org_id = $this->data['org_id'];
//       echo $stu_seq_no;
//       exit;

        $sql = "select stu.type,stu.fname,stu.lname,stu.email,stu.phone as mobile,stu.gender,map.*,"
                . " stud.age_on_return_to_uk,tbl_event.event_name,ins.fname as instructor_first_name,"
                . " ins.lname as instructor_last_name"
                . " from tbl_event_stu_map as map"
                . " left join tbl_user as stu on map.stu_id = stu.id"
                . " left join tbl_event on tbl_event.ev_seq_no = map.ev_id "
                . " left join tbl_user as ins on ins.id = map.ins_id "
                . " left join tbl_user_details as stud on map.stu_id = stud.user_id"
                . " where map.org_id=$org_id AND map.stu_id=$stu_seq_no  AND map.panic=1 AND map.lat!=''";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();

//        echo $this->db->last_query();
//         t($row1);
        $select = "id,fname,lname,email,phone as mobile,lat,long";
//        $cond = "AND lat!='' and status!='5' AND type='i'";
        $cond = "AND status!='5' AND type='i'";
        $ins_details = $this->org->fetch('user', $cond, $select);

        if (count($ins_details)) {
            $row1 = array_merge($row1, $ins_details);
        }


        echo json_encode($row1);
    }

    function panicStudentMessages($id) {

        $id = base64_decode($id);
        $cond = "AND stu_id=$id and status!='5'";
        $details = $this->org->fetch('event_stu_map', $cond);

        foreach ($details as $key => $value) {
            $stu = $details[0]['stu_id'];
            $cond = "AND id=$stu and status!='5'";
            $aa = $this->org->fetch('user', $cond);

            $details[$key]['name'] = $aa[0]['fname'] . " " . $aa[0]['lname'];
            $details[$key]['email'] = $aa[0]['email'];
            $details[$key]['mobile'] = $aa[0]['phone'];
        }
        $this->data['det'] = $details;
        $this->get_include();

        $this->load->view($this->viewDir . "manage_stu/student_message", $this->data);
    }

    function panicStudentImages($id) {

        $id = base64_decode($id);
        $cond = "AND stu_id=$id and status!='5'";
        $details = $this->org->fetch('event_stu_map', $cond);

        foreach ($details as $key => $value) {
            $stu = $details[0]['stu_id'];
            $cond = "AND id=$stu and status!='5'";
            $aa = $this->org->fetch('user', $cond);

            $details[$key]['name'] = $aa[0]['fname'] . " " . $aa[0]['lname'];
            $details[$key]['email'] = $aa[0]['email'];
            $details[$key]['mobile'] = $aa[0]['phone'];
        }
        $this->data['det'] = $details;

        $this->get_include();

        $this->load->view($this->viewDir . "manage_stu/student_image", $this->data);
    }

    function panicStudentseen($id) {

        $id = base64_decode($id);
        $arr = array();
        $cond = "AND stu_id=$id and status!='5'";
        $arr['panic'] = '0';
        $arr['seen'] = '1';
        $this->org->edit_cond('event_stu_map', $arr, $cond);
        $this->session->set_flashdata('suc_message', 'Status Changed Sucessfully');


//        foreach ($details as $key => $value) {
//            $stu = $details[0]['stu_id'];
//            $cond = "AND stu_seq_no=$stu and status!='5'";
//            $aa = $this->org->fetch('student', $cond);
//
//            $details[$key]['name'] = $aa[0]['first_name'] . " " . $aa[0]['last_name'];
//            $details[$key]['email'] = $aa[0]['email'];
//            $details[$key]['mobile'] = $aa[0]['mobile'];
//        }
//        $this->data['det'] = $details;

        redirect('org/managestu/studentPanic');
    }

    function invoice($id) {

        $id = base64_decode($id);
        $cond = "AND user_id=$id";
        $details = $this->org->fetch('payments', $cond);


        $this->data['det'] = $details;
        $this->get_include();

        $this->load->view($this->viewDir . "manage_stu/student_invoice", $this->data);
    }

}
