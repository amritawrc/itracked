<?php

class Admin_payingstu extends MY_AdminController {

    function __construct() {
        parent::__construct();
        $this->ifLoggedin(); ///////for login check(refer my controller)/////

        $this->load->model('admin');
    }

//	public function index(){
//            
//               
//        $cond3 = "AND status!='5'";
//        $details = $this->admin->fetch('student', $cond3);
//
//        foreach ($details as $key => $value) {
//            $id = $value['add_seq_no'];
//            $cond = "AND id=$id and status!='5'";
//            $org_details = $this->admin->fetch('address', $cond);
//            $oid = $value['org_id'];
//             $cond3 = "AND org_seq_no = $oid and status!='5'";
//            $org_det = $this->admin->fetch('org', $cond3);
//            $details[$key]['email'] = $org_details[0]['email'];
//            $details[$key]['phone'] = $org_details[0]['phone'];
//            $city = $org_details[0]['city'];
//            $county = $org_details[0]['county'];
//            $cond1 = "AND id=$city";
//            $cond2 = "AND id=$county";
//            $city_details = $this->admin->fetch('city', $cond1);
//            $county_details = $this->admin->fetch('county', $cond2);
//            $details[$key]['city'] = $city_details[0]['city_name'];
//            $details[$key]['county'] = $county_details[0]['county_name'];
//             $details[$key]['orgname'] = $org_det[0]['org_name'];
//        }
//        $this->data['det'] = $details;
//        $this->get_include();
//        $this->load->view($this->viewDir . "pay_list/listing", $this->data);
//	}

    function view() {

        $org_det = $this->admin->fetch('org');
        $this->data['det'] = $org_det;
        $this->get_include();
        $this->load->view($this->viewDir . "pay_list/month_org", $this->data);
    }

    function res() {
        
        $month = $this->input->post('month');
        $org_id = $this->input->post('org');

//        $cond4 = "AND status!='5' AND org_id = {$org}";
//        $total = $this->admin->fetch('ins_stu_map', $cond4);

        $sql = "select map.*,stu.*,tbl_event.event_name,"
                ."`tbl_event`.start_date,`tbl_event`.end_date,"
                . "ins.fname as instructor_first_name,"
                . "ins.lname as instructor_last_name,"
                . "`tbl_venue`.ven_name from tbl_event_stu_map as map "
                . "inner join tbl_user as stu on map.stu_id=stu.id "
                . "inner join tbl_event on tbl_event.ev_seq_no=map.ev_id "
                . "inner join tbl_user as ins  on ins.id=map.ins_id "
                . "inner join tbl_venue on tbl_venue.ven_seq_no=`tbl_event`.ven_id "
                . "where map.org_id=$org_id AND map.lat!='' AND stu.appcode!='' AND DATE_FORMAT(`tbl_event`.start_date,'%m')='$month'";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();
//        t($row1);
//        exit;
        


        $this->data['det'] = $row1;
//        t($this->data['det']);
//        exit;
//        
        $this->get_include();
        $this->load->view($this->viewDir . "pay_list/listing", $this->data);
    }

}
