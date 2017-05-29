<?php

class Pricing extends MY_AdminController
{
	function __construct()
	{
		parent::__construct();
			$this->checkSessionForUser(); ///////for login check(refer my controller)/////

                $this->load->model('admin');
    }
    function index(){
        // $cond3 = "AND status < '5'";
        $details = $this->admin->fetch('pricing', $cond3);
// 	t($details , 1);

        $this->data['det'] = $details;
        //t($this->data['det'],1);
        $this->get_include();
        $this->load->view($this->viewDir . "pricing_plan/listing", $this->data);
    }
    function auto_payment($code = ''){
        $org_id = base64_decode($code);
        // exit;
        $sql_event = "SELECT eve.*  FROM tbl_event as eve WHERE eve.org_id = '" . $org_id . "' ";
        $query_event = $this->db->query($sql_event);
        $all_event_in_an_org = $query_event->result_array();
        // $start_date =  $all_event_in_an_org[0]['start_date'];
        // $end_date = $all_event_in_an_org[0]['end_date'];
        // t($all_event_in_an_org); exit;
        foreach($all_event_in_an_org as $key => $value){
            $start_date = $value['start_date'];
            $end_date = $value['end_date'];
            $event_seq_no = $value['ev_seq_no'];
           
$sql_student = "SELECT usr.fname, usr.lname, usr.type, tevs.stu_id, DATEDIFF('$end_date', '$start_date') as duration "
                ."FROM tbl_user as usr "
                ."LEFT JOIN tbl_event_stu_map as tevs ON usr.id = tevs.stu_id "
                ."LEFT JOIN tbl_event as eve ON eve.ev_seq_no = tevs.ev_id "
                ."WHERE eve.ev_seq_no = '" . $event_seq_no . "' ";
        $query_student = $this->db->query($sql_student);
        $all_student_in_an_event = $query_student->result_array();
        // echo $this->db->last_query();
        // t($all_student_in_an_event);
            
        } 
        // exit;

        
       $this->get_include();
       $this->load->view($this->viewDir . "invoice/invoice");
    }
}