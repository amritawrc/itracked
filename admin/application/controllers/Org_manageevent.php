<?php

class Org_manageevent extends MY_OrgController {

    function __construct() {
        parent::__construct();
       $this->checkSessionForUser(); ///////for login check(refer my controller)/////
        $this->load->model('org');
    }

    public function index() {
       
        $org_id = $this->data['org_id'];
        //echo $org_id; die();
//        $userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $details = $this->org->fetch('event', $cond3);

       
        foreach ($details as $key => $value) {
            $org_id = $value['org_id'];
            $cond4 = "AND org_seq_no = '$org_id' and status!='5'";
            $name = $this->org->fetch('org', $cond4);

            $id = $value['ven_id'];
            $cond = "AND ven_seq_no=$id and status!='5'";
            $ven_details = $this->org->fetch('venue', $cond);
            //t($ven_details,1)  ;
//            $ven = $ven_details[0]['add_seq_no'];
//            $cond = "AND id=$ven and status!='5'";
//            $org_details = $this->org->fetch('address', $cond);

            // $details[$key]['email'] = $org_details[0]['email'];
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
            $details[$key]['ven_name'] = $ven_details[0]['ven_name'];
            $details[$key]['house_name_number'] = $ven_details[0]['house_name_number'];
            $details[$key]['street_name'] = $ven_details[0]['street_name'];

            $ev_seq_no = $value['ev_seq_no'];
            $select = "count(id) as total_student";
            $cond3 = "AND status!='5' AND `eve_id`='{$ev_seq_no}' AND status=1";
            $total_student = $this->org->fetch('tbl_org_eve_grp_ins', $cond3, $select);
            $details[$key]['total_student'] = $total_student[0]['total_student'];
        }
        $this->data['det'] = $details;
        $this->get_include();
        $this->load->view($this->viewDir . "manage_event/listing", $this->data);
    }

    function detail($id) {
        $org_id = $this->data['org_id'];
        $id = base64_decode($id);
        $userSession = $this->session->userdata;
        $cond3 = "AND status!='5' AND `org_id`='$org_id' AND type='i'";
        $details = $this->org->fetch('user', $cond3);
        $this->data['ins'] = $details;
         $cond = "AND status!='5' AND `org_id`='$org_id'"; 
        $ven = $this->org->fetch('venue', $cond);
        $this->data['ven'] = $ven;
        $cond3 = "AND status!='5' and ev_seq_no='$id'";
        $details = $this->org->fetch('event', $cond3);

        $this->data['det'] = $details;
        //t($this->data['det'],1);

        $this->get_include();
        $this->load->view($this->viewDir . "manage_event/details", $this->data);
    }

    function view() {
       
        
        $org_id = $this->data['org_id'];
       // echo $org_id; die();
//        $details = $this->org->fetch('codes');
//        $this->data['det'] = $details;
//        $details = $this->org->fetch('city');
//        $this->data['dets'] = $details;
//        $userSession = $this->session->userdata;
//
//        $cond3 = "AND status!='5' AND `org_id`= 1 AND type='i'";
//        $details = $this->org->fetch('user', $cond3);
//        //t($details,1);
//
//        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
//        $details = $this->org->fetch('instructor', $cond3);

            $cond3 = "AND status<5 AND `org_id`='$org_id' AND type='i'";
        $details = $this->org->fetch('user', $cond3);
//        echo $this->db->last_query();
//        t($details);
//        exit;
        $this->data['ins'] = $details;

//        $stu = $this->org->fetch('student', $cond3);
//        $this->data['stu'] = $stu;
        $cond3 = "AND status!='5' AND `org_id`= '$org_id'  AND type='s'";
        $stu = $this->org->fetch('user', $cond3);
        $this->data['stu'] = $stu;

        $cond3 = "AND status!='5' AND `org_id`='$org_id' AND type='s'";
        $stu = $this->org->fetch('user', $cond3);
        $this->data['stu'] = $stu;

        $cond3 = "AND status!='5' AND `org_id`='$org_id'";
        $ven = $this->org->fetch('venue', $cond3);
        $this->data['ven'] = $ven;
        
          $cond = "AND status!='5' AND `org_id`='$org_id'";
        $grp = $this->org->fetch('group', $cond);
        $this->data['grp'] = $grp;


        $this->get_include();
        $this->load->view($this->viewDir . "manage_event/add", $this->data);
    }

    public function add() {
        //echo "Hi";
        $arr = array();
        $arrra = array();
        
        $org_id = $this->data['org_id'];
        $event_name = $this->input->post('event_name');
        $venue_name = $this->input->post('venue_name');
        //$grp_name = $this->input->post('grp');
       
        //$orgid = $this->input->post('orgid');
        // $org_id = base64_decode($orgid);
        //$org_id = 1;
        //$aapcode= substr(uniqid(), 0, 10);
//        $county = $this->input->post('county');
//        $city = $this->input->post('city');
//        $phno = $this->input->post('phno');
//        $mobno = $this->input->post('mobno');
//        $email = $this->input->post('email');
//        $house = $this->input->post('house');
//        $street = $this->input->post('street');
//        $postal = $this->input->post('postal');
        //$stud = $this->input->post('stud');
        //t($stud,1);
        
        
       // $ins = $this->input->post('ins');
        $start_date = $this->input->post('start_date');
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = $this->input->post('end_date');
        $end_date = date('Y-m-d', strtotime($end_date));
        $cost = $this->input->post('cost');
        $dis = $this->input->post('dis');
        $discount = $this->input->post('discount');
        $max_age = $this->input->post('maxage');
        $min_age = $this->input->post('minage');
        $remarks = $this->input->post('remarks');
        $smeeting = $this->input->post('smeeting');
        $emeeting = $this->input->post('emeeting');
        $status1 = $this->input->post('status');

//        $arr['city'] = $city;
//        $arr['county'] = $county;
//        $arr['phone'] = $phno;
//        $arr['mobile_cell'] = $mobno;
//        $arr['email'] = $email;
//        $arr['postal_code'] = $postal;
//       
//        $arr['remarks_notes'] = $remarks;
//        $arr['created_date'] = date('Y-m-d H:i:s');
//        $arr['status'] = 1;


        $arra['event_name'] = $event_name;
        $arra['ven_id'] = $venue_name;
        $arra['org_id'] = $org_id;
        
//        $arra['house_name_number'] = $house;
//        $arra['street_name'] = $street;
        //$arra['ins_id'] = $ins;
        $arra['start_date'] = $start_date;
        $arra['end_date'] = $end_date;
        $arra['cost'] = $cost;
        $arra['allow'] = $dis;
        $arra['discount'] = $discount;
        $arra['max_age'] = $max_age;
        $arra['min_age'] = $min_age;
        $arra['remarks'] = $remarks;
        $arra['created_date'] = date('Y-m-d H:i:s');
        $arra['status'] = 1;
        $arra['start_meeting_point'] = $smeeting;
        $arra['end_meeting_point'] = $emeeting;
        $arra['status1'] = $status1;



        //t($arra);
        //t($stud,1);
        if ($ev_id = $this->org->add('event', $arra)) {


//            $data=array(
//                'current_event_id' => $ev_id
//            );
//            $cond1 = " AND ins_seq_no=$ins ";
//            $this->org->edit_cond('instructor', $data,$cond1);

//            $data = array(
//                'current_event_id' => $ev_id
//            );
//            $cond1 = " AND ins_seq_no=$ins ";
//            $this->org->edit_cond('instructor', $data, $cond1);
//
//            $data = array(
//                'current_event_id' => $ev_id
//            );
//            $cond1 = " AND id=$ins ";
//            $this->org->edit_cond('user', $data, $cond1);

//             $id = $this->org->add('address', $arr);
//            $arra['add_seq_no'] = $id;
//                    $data = array();
//               foreach($stud as $key => $value){
//                 
//                 $data['org_id'] = $org_id; 
//                 $data['ev_id']=$ev_id;
//                 $data['ins_id']=$ins;
//                  $data['stu_id']=$value;
//                  $this->org->add('ins_stu_map', $data);
//                  
//               }


//            $arr['ins_id'] = $ins;
//            
//            $arr['org_id'] = $org_id;
//            $arr['eve_id'] = $ev_id;
//            $arr['added_date'] = date('Y-m-d H:i:s');
//            $arr['status'] = 1;
//
//            //t($arr,1); 
//
//            $this->org->add('tbl_org_eve_grp_ins', $arr);
            
            
//             foreach($grp_name as $key => $value){
//                 
//                 $arr['org_id'] = $org_id; 
//                 $arr['eve_id']=$ev_id;
//                 $arr['ins_id']=$ins;
//                 $arr['grp_id']=$value;
//                 $arr['status']=1;
//                 $arr['added_date']=time(); 
//                  $this->org->add('tbl_org_eve_grp_ins', $arr);
//                  
//               }

            $this->session->set_flashdata('suc_message', 'Event Added Successfully');
            redirect('org/manageevent/index');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
            $this->get_include();
            $this->load->view($this->viewDir . "manageevent/add", $this->data);
        }
    }

    public function edit($id) {

        $org_id = $this->data['org_id'];
        $id = base64_decode($id);
        $org = base64_decode($org);
        
       // $org_id=1;
        //echo $id; die();
        $arr = array();
        $arrra = array();

        if (isset($_POST['event_name'])) {

            $idd = $this->input->post('org');
            $org = $this->input->post('idd');
            $idd = base64_decode($idd);
            $org = base64_decode($org);
            $event_name = $this->input->post('event_name');
            $venue_name = $this->input->post('venue_name');
           // $grp_name = $this->input->post('grp');
            
//         $county = $this->input->post('county');
//        $city = $this->input->post('city');
//        $phno = $this->input->post('phno');
//        $mobno = $this->input->post('mobno');
//        $email = $this->input->post('email');
//        $house = $this->input->post('house');
//        $street = $this->input->post('street');
//        $postal = $this->input->post('postal');

            //$ins = $this->input->post('ins');
            $start_date = $this->input->post('start_date');
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = $this->input->post('end_date');
            $end_date = date('Y-m-d', strtotime($end_date));
            $cost = $this->input->post('cost');
            $dis = $this->input->post('dis');
            $discount = $this->input->post('discount');
            $max_age = $this->input->post('maxage');
            $min_age = $this->input->post('minage');
            $remarks = $this->input->post('remarks');
            $smeeting = $this->input->post('smeeting');
            $emeeting = $this->input->post('emeeting');
            $status1 = $this->input->post('status');

//        $arr['city'] = $city;
//        $arr['county'] = $county;
//        $arr['phone'] = $phno;
//        $arr['mobile_cell'] = $mobno;
//        $arr['email'] = $email;
//        $arr['postal_code'] = $postal;
//       
//        $arr['remarks_notes'] = $remarks;
//        $arr['updated_date'] = date('Y-m-d H:i:s');
//        $arr['status'] = 1;


            $arra['event_name'] = $event_name;
            $arra['ven_id'] = $venue_name;


            //$arra['ins_id'] = $ins;
            $arra['start_date'] = $start_date;
            $arra['end_date'] = $end_date;
            $arra['cost'] = $cost;
            $arra['allow'] = $dis;
            $arra['discount'] = $discount;
            $arra['max_age'] = $max_age;
            $arra['min_age'] = $min_age;
            $arra['remarks'] = $remarks;
            $arra['updated_date'] = date('Y-m-d H:i:s');
            $arra['status'] = 1;
            $arra['start_meeting_point'] = $smeeting;
            $arra['end_meeting_point'] = $emeeting;
            $arra['status1'] = $status1;

            // t($arra,1);
//            $cond = " AND `status`!=5 AND `id`='{$idd}'";
//            $this->org->edit_cond('address', $arr, $cond) ;
            // t($cond,1); 

            $cond1 = " AND `status`!=5 AND `ev_seq_no`='{$id}'";
            $chk1 = $this->org->edit_cond('event', $arra, $cond1);

//            $cond1 = "AND eve_id=$id";
//            $map_data = $this->org->fetch('org_eve_grp_ins', $cond1);
//            $this->db->last_query(); die();
          
            if ($chk1) {
//                $sql = "update tbl_event_stu_map set status=$status1 where ev_id=$id";
//                $query = $this->db->query($sql);
                
                // $sql = "delete from tbl_org_eve_grp_ins where eve_id=$id";
               // $query = $this->db->query($sql);
                //$row1 = $query->result_array();
                //echo $sql; die();
//                foreach($grp_name as $key => $value){
//                 
//                 $arr['org_id'] = $org_id; 
//                 $arr['eve_id']=$id;
//                 $arr['ins_id']=$ins;
//                 $arr['grp_id']=$value;
//                 $arr['status']=1;
//                 $arr['added_date']=time(); 
//                 $this->org->add('tbl_org_eve_grp_ins', $arr);
//                  
//               }
                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
            }
            
            else {
                $this->session->set_flashdata('err_message', 'Error Please try again.');
            }

//            if ($chk1) {
//
////                $data = array(
////                    'current_event_id' => $id
////                );
////                $cond1 = " AND id=$ins ";
////                $this->org->edit_cond('user', $data, $cond1);
//
//                $this->session->set_flashdata('suc_message', 'Edited Sucessfully');
//            } 
            redirect('org/manageevent/index');
        } else {

            //$userSession = $this->session->userdata;
            $cond3 = "AND status!='5' AND type='i' AND `org_id`='$org_id'";
            $details = $this->org->fetch('user', $cond3);
            $this->data['ins'] = $details;
            // t($this->data['ins']);
            $cond = "AND status!='5' AND `org_id`='$org_id'";
            $ven = $this->org->fetch('venue', $cond);
            $this->data['ven'] = $ven;
            $cond3 = "AND status!='5' and ev_seq_no='$id'";
            $details = $this->org->fetch('event', $cond3);
             $cond = "AND status!='5' AND `org_id`='$org_id'";
            $grp = $this->org->fetch('group', $cond);
           $this->data['grp'] = $grp;
            
            //t($details,1);
//            foreach ($details as $key => $value) {
//                $id = $value['add_seq_no'];
//                $cond = "AND id=$id and status!='5' and id='$org'";
//                $org_details = $this->org->fetch('address', $cond);
//                 //t($org_details,1);
//                $details[$key]['email'] = $org_details[0]['email'];
//                $details[$key]['phone'] = $org_details[0]['phone'];
//                $details[$key]['mobile_cell'] = $org_details[0]['mobile_cell'];
//                $details[$key]['postal_code'] = $org_details[0]['postal_code'];
//                $details[$key]['website_url'] = $org_details[0]['website_url'];
//                $details[$key]['remarks_notes'] = $org_details[0]['remarks_notes'];
//                $city = $org_details[0]['city'];
//                $county = $org_details[0]['county'];
//                $cond1 = "AND id=$city";
//                $cond2 = "AND id=$county";
//                $city_details = $this->org->fetch('city', $cond1);
//                $county_details = $this->org->fetch('county', $cond2);
//                $details[$key]['city'] = $city_details[0]['city_name'];
//                $details[$key]['county'] = $county_details[0]['county_name'];
//            }
            $this->data['det'] = $details;
           // t($this->data['det'],1);
            $this->get_include();
            $this->load->view($this->viewDir . "manage_event/edit", $this->data);
        }
    }

    function delete($id, $orig) {
       $org_id = $this->data['org_id'];
        //$org_id=1;
        if (!empty($id)) {
            $arr = array();
            $id = base64_decode($id);
            $org = base64_decode($orig);

            $arr['status'] = 5;

            $cond = " and ev_seq_no='{$id}'";
            $this->org->edit_cond('event', $arr, $cond);

           // $cond1 = " and eve_id='{$id}'";
           // $this->org->edit_cond('org_eve_grp_ins', $arr, $cond1);
//            $cond1 = " and id='{$org}'";
//            $this->org->edit_cond('address', $arr, $cond1);

            $this->session->set_flashdata('suc_message', 'Deleted Sucessfully');
        } else {
            $this->session->set_flashdata('err_message', 'Error Please try again.');
        }

        redirect('org/manageevent/index');
    }

    function event_map($id) {

        $id = base64_decode($id);

        $org_id = $this->data['org_id'];

        $sql = "select map.*,stu.*,tbl_event.event_name,"
                . "ins.fname as instructor_first_name,"
                . "ins.lname as instructor_last_name "
                . "from tbl_event_stu_map as map "
                . "inner join tbl_user as stu on map.stu_id=stu.id "
                . "inner join tbl_event on tbl_event.ev_seq_no=map.ev_id "
                . "inner join tbl_user ins on ins.id=map.ins_id "
                . "where map.org_id=$org_id AND map.lat!='' AND map.ev_id=$id AND map.status=1";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();

//        echo $this->db->last_query();
//        t($row1);
//        exit;

        $this->data['details'] = $row1;
        $this->data['eve_id'] = $id;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_event/student_location", $this->data);
    }

    function event_map1($id) {

        $org_id = $this->data['org_id'];

          $sql = "select map.*,stu.*,tbl_event.event_name,"
                . "ins.fname as instructor_first_name,"
                . "ins.lname as instructor_last_name "
                . "from tbl_event_stu_map as map "
                . "inner join tbl_user as stu on map.stu_id=stu.id "
                . "inner join tbl_event on tbl_event.ev_seq_no=map.ev_id "
                . "inner join tbl_user ins on ins.id=map.ins_id "
                . "where map.org_id=$org_id AND map.lat!='' AND map.ev_id=$id AND map.status=1";
        $query = $this->db->query($sql);
        $row1 = $query->result_array();
        echo json_encode($row1);
    }
    function ajax_student_listing(){       
      
        $data = array();
        $ev_seq_no = $this->input->post('ev_seq_no');
        $org_id = $this->input->post('org_id');

        $sql = "SELECT user.*, det.profile_photo as image, event.ev_seq_no, event.event_name, org.org_seq_no, org.org_name FROM tbl_user as user "
                ."LEFT JOIN tbl_org as org ON org.org_seq_no = user.org_id "
                ."LEFT JOIN tbl_event as event ON event.org_id = org.org_seq_no "
                ."LEFT JOIN tbl_user_details as det ON det.user_id = user.id "
//                . "LEFT JOIN tbl_group as group ON group.event_id = event.ev_seq_no "
                ."WHERE user.type = 's' AND event.ev_seq_no = '" . $ev_seq_no . "' "
                ."AND user.org_id = '" . $org_id . "' ";
        $query = $this->db->query($sql);
        $student_details_for_an_event = $query->result_array();
        $data['student_details_for_an_event'] = $student_details_for_an_event;
        $data['base_url'] = base_url();
    //  echo $this->db->last_query();
    //     t($data['student_details_for_an_event']); exit;

        $this->get_include();
        $this->load->view($this->viewDir . "manage_event/ajax_listing", $data);
    }
   function auto_payment($code = ''){
      $org_id = $this->data['org_id'];
      $event_seq_no = base64_decode($code);
        // exit;
        $sql_event = "SELECT eve.*, org.org_name, org.org_seq_no, org.house_name_number, org.street_name, org.username " 
                        ."FROM tbl_event as eve "
                        ."LEFT JOIN tbl_org as org ON org.org_seq_no = eve.org_id "
                        ."WHERE eve.org_id = '" . $org_id . "' AND eve.ev_seq_no = '" . $event_seq_no . "' ";
        $query_event = $this->db->query($sql_event);
        $all_event_in_an_org = $query_event->result_array();
        // echo $this->db->last_query();
        // t($all_event_in_an_org); exit;
        foreach($all_event_in_an_org as $key => $value){
            $start_date = $value['start_date'];
            $end_date = $value['end_date'];
            $event_seq_no = $value['ev_seq_no'];
           
        $sql_student = "SELECT usr.fname, usr.lname, usr.type, tevs.stu_id, eve.ev_seq_no, DATEDIFF('$end_date', '$start_date') as duration "
                ."FROM tbl_user as usr "
                ."LEFT JOIN tbl_event_stu_map as tevs ON usr.id = tevs.stu_id "
                ."LEFT JOIN tbl_event as eve ON eve.ev_seq_no = tevs.ev_id "
                ."WHERE eve.ev_seq_no = '" . $event_seq_no . "' ";
        $query_student = $this->db->query($sql_student);
        $all_student_in_an_event = $query_student->result_array();
        
        $duration = $all_student_in_an_event[0]['duration'];
            
        } 

     $no_of_student_in_an_event = count($all_student_in_an_event);
     
     $all_price_list = $this->org->fetch('pricing');

 $all_price_list = $this->org->fetch('pricing');
    $single_user_array = array($all_price_list[0]);
    $one_day_user = $single_user_array[0]['one_day_user'];
    $seven_day_user = $single_user_array[0]['seven_day_user'];
    $nine_day_user = $single_user_array[0]['nine_day_user'];
    $thirty_days_user = $single_user_array[0]['30_days_user'];
    $one_year_days_user = $single_user_array[0]['365_days_user'];
    // t($single_user_array); exit;
     
    //  t($pricing); exit;
     $this->data['all_event_in_an_org'] = $all_event_in_an_org;
     $this->data['no_of_student_in_an_event'] = $no_of_student_in_an_event;
     $this->data['all_student_in_an_event'] = $all_student_in_an_event;
    //  $this->data['single_user_array'] = $single_user_array;
     $this->data['duration'] = $duration;
     $this->data['one_day_user'] = $one_day_user;
     $this->data['seven_day_user'] = $seven_day_user;
     $this->data['nine_day_user'] = $nine_day_user;
     $this->data['thirty_days_user'] = $thirty_days_user;
     $this->data['one_year_days_user'] = $one_year_days_user;
     
     
    
    //   exit;   
       $this->get_include();
       $this->load->view($this->viewDir . "invoice/invoice");
       
       
   }
}
