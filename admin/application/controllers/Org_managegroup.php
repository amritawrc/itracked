<?php

class Org_managegroup extends MY_OrgController {

    function __construct() {
        parent::__construct();
        $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {
        
         $org_id = $this->data['org_id'];
       //$userSession = $this->session->userdata;
        $cond = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('group', $cond);
        foreach ($details as $key => $value) {
            $id = $value['event_id'];
            $cond3 = "AND status!='5' AND `ev_seq_no`='{$id}'";
            $dettt = $this->org->fetch('event', $cond3);
            //t($dettt,1);
            $details[$key]['event_name'] = $dettt[0]['event_name'];

//            $group_seq_no = $value['group_seq_no'];
//            $select = "count(id) as total_student";
//            $cond3 = "AND status!='5' AND `grp_id`='{$group_seq_no}' AND lat!='' AND status=1";
//            $total_student = $this->org->fetch('tbl_ins_stu_map', $cond3, $select);
//            $details[$key]['total_student'] = $total_student[0]['total_student'];
        }

        $this->data['det'] = $details;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/listing", $this->data);
    }

    function view() {
          $org_id = $this->data['org_id'];
        //$userSession = $this->session->userdata;
        $cond = "AND status!='5' AND `org_id`='$org_id'";
        $event = $this->org->fetch('event', $cond);
        $this->data['det'] = $event;
        $cond3 = "AND status!=5 AND `org_id`='$org_id' AND type='i'";
        $details = $this->org->fetch('user', $cond3);
        $this->data['ins'] = $details;
       // t($this->data['ins'],1);
        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/add", $this->data);
    }

    function addstu($grp) {
         $org_id = $this->data['org_id'];
        //$userSession = $this->session->userdata;
        $cond = "AND status!='5' AND `org_id`='$org_id'";
        $stu = $this->org->fetch('student', $cond);
        $this->data['stu'] = $stu;
        $this->data['grp'] = base64_decode($grp);
        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/addstu", $this->data);
    }

    function addstugrp() {
         $org_id = $this->data['org_id'];
        //$orgid = $this->input->post('orgid');
        //$org_id = base64_decode($orgid);
        $stud = $this->input->post('stud');
        $grpid = $this->input->post('grpid');

        $arra = array();
        $arr = array();
        foreach ($stud as $key => $value) {
            $arra['org_id'] = $org_id;
            $arra['grp_id'] = $grpid;
            $arra['stu_id'] = $value;
            $arra['status'] = '1';
            $this->org->add('grp_stu_map', $arra);
        }

        $arr['map'] = '1';
        $arr['status'] = '1';
        $cond1 = " AND `status`!=5 AND `group_seq_no`='{$grpid}'";
        $this->org->edit_cond('group', $arr, $cond1);

        $this->session->set_flashdata('suc_message', 'Students are added under a group');
        redirect('org/managegroup/index');
    }

    function addev($grp) {
        //$userSession = $this->session->userdata;
        $org_id = $this->data['org_id'];
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('event', $cond3);
        $this->data['dets'] = $details;
        $this->data['grp'] = base64_decode($grp);
        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/addev", $this->data);
    }

    function addgrpev() {

        $arra = array();
        $arr = array();
        $grpid = $this->input->post('grpid');
        $evid = $this->input->post('event');
        $arra['event_id'] = $evid;
        $arr['map1'] = '1';

        $cond1 = " AND `status`!=5 AND `grp_id`='{$grpid}'";
        $this->org->edit_cond('grp_stu_map', $arra, $cond1);

        $cond2 = " AND `status`!=5 AND `group_seq_no`='{$grpid}'";
        $this->org->edit_cond('group', $arr, $cond2);

        $this->session->set_flashdata('suc_message', 'Event is added for a group');
        redirect('org/managegroup/index');
    }

    public function add() {
    
    //t($this->input->post());exit;
        //echo "Hi";
        $arra = array();
        $arr= array();  

         $org_id = $this->data['org_id'];

        $group_name = $this->input->post('group_name');
        $group_owner = $this->input->post('owner_name');
        $evid = $this->input->post('event');
         $start_time=$this->input->post('training_time_start');
        $end_time=$this->input->post('training_time_end');
        $type_training=$this->input->post('training_for');
        $ins_id = $this->input->post('ins');
        

      //$org_id = 1;
        //$status = $this->input->post('status');

        $arra['group_name'] = $group_name;
        $arra['group_owner'] = $group_owner;
        $arra['org_id'] = $org_id;
        $arra['event_id'] = $evid;
        $arra['start_time'] = $start_time;
        $arra['end_time'] = $end_time;
        $arra['type_training'] = $type_training;
        $arra['ins_id'] = $ins_id;
        $arra['created_date'] = time();
        $arra['status'] = 1;
       
       // t($arra,1);

        if ($gr_id = $this->org->add('group', $arra)) {
            
//            $arr['grp_id'] = 1;
//            $cond= " AND `status`!=5 AND `eve_id`='{$evid}'";
//            $this->org->edit_cond('org_eve_grp_ins', $arr,$cond);
            
            $arr['org_id']= $org_id;
            $arr['eve_id']= $evid;
            $arr['ins_id'] = $ins_id;
            $arr['grp_id'] = $gr_id;
           
            $arr['status'] = 1;
            $arr['added_date'] = time(); 
            $this->org->add('org_eve_grp_ins', $arr);
            
            $this->session->set_flashdata('suc_message', 'Group Added Successfully');
            redirect('org/managegroup/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "managegroup/add", $this->data);
        }
    }

    public function edit($id) {
         $org_id = $this->data['org_id'];

        $id = base64_decode($id);


        $arrra = array();
        if (isset($_POST['group_name'])) {

            $group_name = $this->input->post('group_name');
            $group_owner = $this->input->post('owner_name');
            $status = $this->input->post('status');
            //$orgid = $this->input->post('orgid');
             $evid = $this->input->post('event');
          $ins_id = $this->input->post('ins');

            $arra['group_name'] = $group_name;
            $arra['group_owner'] = $group_owner;
            $arra['org_id'] = $org_id;
            $arra['event_id'] = $evid;
            $arra['ins_id'] = $ins_id;
            $arra['created_date'] = time();
            $arra['status'] = $status ;
            
            $arr['org_id']= $org_id;
            $arr['eve_id']= $evid;
            $arr['ins_id'] = $ins_id;
            $arr['grp_id'] = $id;
            $arr['status'] = $status ;
            $arr['added_date'] = time(); 
            
           $cond1 = " AND `status`!=5 AND `group_seq_no`='{$id}'";

            $chk1 = $this->org->edit_cond('group', $arra, $cond1);
            
            $cond2 = " AND `status`!=5 AND `grp_id`='{$id}'";

            $chk2 = $this->org->edit_cond('org_eve_grp_ins', $arr, $cond2);

            if ($chk1) {
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            } else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }
            redirect('org/managegroup/index');
        } else {


            $cond3 = "AND status!='5' and group_seq_no='$id'";
            $details = $this->org->fetch('group', $cond3);

            $this->data['det'] = $details;
            
             $cond = "AND status!='5' AND `org_id`='$org_id'";
        $event = $this->org->fetch('event', $cond);
        $this->data['det1'] = $event;
        $cond3 = "AND status!=5 AND `org_id`='$org_id' AND type='i'";
        $details = $this->org->fetch('user', $cond3);
        $this->data['ins'] = $details;
        
            //t($this->data['det'],1);
            $this->get_include();
            $this->load->view($this->viewDir . "manage_group/edit", $this->data);
        }
    }

    function delete($id) {

        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);

            $arr['status'] = 5;
            $cond = " and group_seq_no='{$id}'";
            $this->org->edit_cond('group', $arr, $cond);
             $cond1 = " and grp_id='{$id}'";
            $this->org->edit_cond('org_eve_grp_ins', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/managegroup/index');
    }

    function editstupage($grp) {
         $org_id = $this->data['org_id'];

        $grp = base64_decode($grp);

        $cond1 = " AND `status`!=5 AND `grp_id`='{$grp}'";
        $map = $this->org->fetch('grp_stu_map', $cond1);
////            t($map);
////            exit;
        $this->data['mapp'] = $map;
        $this->data['id'] = $map[0]['id'];

        //$userSession = $this->session->userdata;
        $cond = "AND status!='5' AND `org_id`='$org_id'";
        $stu = $this->org->fetch('student', $cond);
        $this->data['stu'] = $stu;

        $this->data['grp_id'] = $grp;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/editstu", $this->data);
    }

    function editstu($grp_id) {
        
        $arra = array();

        $grp_id = base64_decode($grp_id);

        $stud = $this->input->post('stud');
        $org_id = $this->data['org_id'];

        $cond1 = "AND `grp_id`='{$grp_id}'";
        $this->org->delete_cond('grp_stu_map', $cond1);
//           echo $this->db->last_query(); die(); 
        foreach ($stud as $key => $value) {
            $arra['org_id'] = $org_id;
            $arra['grp_id'] = $grp_id;
            $arra['stu_id'] = $value;
            $arra['status'] = '1';
            $this->org->add('grp_stu_map', $arra);
            
//            $this->org->add('tbl_ins_stu_map', $arra);
        }
        $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
        redirect('org/managegroup/index');
    }

    function groupMap($grp_id) {

        $grp_id = base64_decode($grp_id);

        $org_id = $this->data['org_id'];

        $sql = "select map.*,stu.*,tbl_event.event_name,"
                . "ins.fname as instructor_first_name,"
                . "ins.lname as instructor_last_name "
                . "from tbl_event_stu_map as map "
                . "inner join tbl_user as stu on map.stu_id=stu.id "
                . "inner join tbl_event on tbl_event.ev_seq_no=map.ev_id "
                . "inner join tbl_instructor ins on ins.id=map.ins_id "
                . "where map.org_id=$org_id AND map.lat!='' AND map.grp_id=$grp_id AND map.status=1";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();
        
        
//        $sql1 = "select i.*,e.event_name from tbl_group as g inner join tbl_event as e on g.ev_id=e.ev_seq_no inner join tbl_instructor as i on e.ins_id=i.ins_seq_no where g.org_id=$org_id AND g.group_seq_no=$grp_id";
//        $query1 = $this->db->query($sql1);
//        $row2 = $query1->result_array();

//        $row=  array_merge($row1,$row2);
        
//        echo $this->db->last_query();
//        t($row1);
//        t($row2);
//        t($row);
//        exit;

        $this->data['details'] = $row1;
        $this->data['grp_id'] = $grp_id;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_group/student_location", $this->data);
    }

    function groupMap1($grp_id) {

        $org_id = $this->data['org_id'];

        $sql = "select map.*,stu.*,tbl_event.event_name,"
                . "ins.fname as instructor_first_name,"
                . "ins.lname as instructor_last_name "
                . "from tbl_event_stu_map as map "
                . "inner join tbl_user as stu on map.stu_id=stu.id "
                . "inner join tbl_event on tbl_event.ev_seq_no=map.ev_id "
                . "inner join tbl_instructor ins on ins.id=map.ins_id "
                . "where map.org_id=$org_id AND map.lat!='' AND map.grp_id=$grp_id AND map.status=1";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();

//        echo $this->db->last_query();
//        t($row1);
//        exit;
        echo json_encode($row1);
    }

}
