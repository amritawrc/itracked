<?php

class Invoice extends MY_AdminController
{
	function __construct()
	{
		parent::__construct();
			$this->checkSessionForUser(); ///////for login check(refer my controller)/////


                $this->load->model('admin');
    }
    function index(){
        $cond3 = "AND status < '5'";
        $details = $this->admin->fetch('org', $cond3);
// 	t($details , 1);
        foreach ($details as $key => $value) {
            $id = $value['add_seq_no'];
            $cond = "AND id=$id and status < '5'";
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
        $this->load->view($this->viewDir . "invoice/listing", $this->data);
    }
    function all_events_of_org($code = ''){
        $org_id = base64_decode($code);
    // exit; 
    
     $sql_event = "SELECT eve.*  FROM tbl_event as eve WHERE eve.org_id = '" . $org_id . "' ";
        $query_event = $this->db->query($sql_event);
        $all_event_in_an_org = $query_event->result_array();
        
        foreach($all_event_in_an_org as $key => $value){
            $venue_seq_no = $value['ven_id'];
            $cond = "AND ven_seq_no={$venue_seq_no} AND status!='5' ";
            $ven_details = $this->admin->fetch('venue', $cond);
            $all_event_in_an_org[$key]['ven_id'] = $ven_details[0]['ven_name'];
        }
        // t($all_event_in_an_org); exit;
        $this->data['all_event_in_an_org'] = $all_event_in_an_org;
        // t($this->data['all_event_in_an_org']); exit;
        $this->get_include();
       $this->load->view($this->viewDir . "invoice/event_listing", $this->data);
    }
        
    
    function auto_payment($org_id = ''){

        $org_id = base64_decode($org_id);

        $sql_event = "SELECT eve.*, org.org_name, org.house_name_number, org.street_name, org.username, org.currency, org.postal " 
                        ."FROM tbl_event as eve "
                        ."LEFT JOIN tbl_org as org ON org.org_seq_no = eve.org_id "
                        ."WHERE eve.org_id = '" . $org_id . "' AND eve.start_date < '" . date('Y-m-d', strtotime('next monday')) . "' AND eve.event_billing = '0' ";
                       
        $query_event = $this->db->query($sql_event);
        $all_event_in_an_org = $query_event->result_array();

            // t($all_event_in_an_org); exit;
    foreach($all_event_in_an_org as $key => $value){
        
        

            $start_date = $value['start_date'];
            $end_date = $value['end_date'];
            $event_seq_no = $value['ev_seq_no'];
            $billing_flag = $value['event_billing'];
            $date_1 = strtotime($start_date);
            $date_2 = strtotime($end_date);
            $duration = ($date_2 - $date_1);
            $no_of_days = floor($duration / (60*60*24));
            $next_monday_1 = date('Y-m-d', strtotime('next monday'));
            $next_monday = strtotime($next_monday_1);
            $org_currency = $value['currency'];
    /*************Inserting data into tbl_exchange_rate for testing purpose only. Please comment this section and the 
                function currencyConverter out, once the whole auto-billing system is up and running. - BEGIN **********/ 
            $currency_input = 1;
            $currency_from = "GBP";
            $currency_to_us_dollar = currencyConverter($currency_from,"USD",$currency_input);
            $currency_to_euro_eu = currencyConverter($currency_from,"EUR",$currency_input);

            $sql_exchange = "INSERT INTO tbl_exchange_rate(us_dollar, euro_eu,created_date) VALUES ($currency_to_us_dollar,$currency_to_euro_eu, $current_date)";
            $query_exchange = $this->db->query($sql_exchange);



/*************Inserting data into tbl_exchange_rate for testing purpose only. Please comment this section and the 
                function currencyConverter out, once the whole auto-billing system is up and running. - END **********/ 

         $sql_student = "SELECT usr.fname, usr.lname, usr.type, tevs.stu_id, eve.ev_seq_no, DATEDIFF('$end_date', '$start_date') as duration "
                ."FROM tbl_user as usr "
                ."LEFT JOIN tbl_event_stu_map as tevs ON usr.id = tevs.stu_id "
                ."LEFT JOIN tbl_event as eve ON eve.ev_seq_no = tevs.ev_id "
                ."WHERE eve.ev_seq_no = '" . $event_seq_no . "' AND eve.event_billing = '1'";
        $query_student = $this->db->query($sql_student);
        $all_student_in_an_event = $query_student->result_array();
        
        $no_of_student_in_an_event = count($all_student_in_an_event);
        
        $all_price_list = $this->admin->fetch('pricing');

    $all_price_list = $this->admin->fetch('pricing');
    $single_user_array = array($all_price_list[0]);
     $one_day_user = $single_user_array[0]['one_day_user'];
    
    $currency_sql = "SELECT * FROM `tbl_exchange_rate` WHERE `created_date` BETWEEN '" . $date_1 ."' AND  '" . $next_monday. "' ";
    $query_currency = $this->db->query($currency_sql);
    $res_currency = $query_currency->result_array();
    // t($res_currency); exit;

   $usd_exchange_rate = $res_currency[0]['us_dollar'];
   $euro_exchange_rate = $res_currency[0]['euro_eu'];
// exit;
        
        
        if($billing_flag == '0'){
        // echo 'devosmita'; exit;
    if($org_currency == 'USD'){
       $data_invoice = array(
            'org_id' => $org_id,
            'event_id' => $event_seq_no,
            'no_of_students' => $no_of_student_in_an_event,
            'tariff' => $one_day_user,
            'duration' => $duration,
            'exchange_currency' => $org_currency,
            'exchange_rate' => $usd_exchange_rate,
            'created_date' => time()
            ); 
    } else if($org_currency == 'EUR'){
        $data_invoice = array(
            'org_id' => $org_id,
            'event_id' => $event_seq_no,
            'no_of_students' => $no_of_student_in_an_event,
            'tariff' => $one_day_user,
            'duration' => $duration,
            'exchange_currency' => $org_currency,
            'exchange_rate' => $euro_exchange_rate,
            'created_date' => time()
            );  
    } else if($org_currency == 'GBP'){
         $data_invoice = array(
            'org_id' => $org_id,
            'event_id' => $event_seq_no,
            'no_of_students' => $no_of_student_in_an_event,
            'tariff' => $one_day_user,
            'duration' => $duration,
            'exchange_currency' => $org_currency,
            'exchange_rate' => '1',
            'created_date' => time()
            );  
    }
        
        $insert_invoice = $this->admin->add('invoice', $data_invoice);
        $where = "AND invoice_id = {$insert_invoice}";
        $invoice_number = '0000000' . $insert_invoice . '/' .  date('Y', strtotime('+1 year'));
        $data_edit = array('invoice_number' => $invoice_number);
        $edit_insert = $this->admin->edit_cond('invoice', $data_edit, $where);
        
        if($insert_invoice){
            // echo 123; exit;
            $where = " AND ev_seq_no = {$event_seq_no}";
            $data_event_billing = array('event_billing' => '1');
            $insert_status = $this->admin->edit_cond('event', $data_event_billing, $where);  
        $this->get_include();
        $this->load->view($this->viewDir . "invoice/invoice");
        } else{
     $this->data['all_event_in_an_org'] = $all_event_in_an_org;
     $this->data['no_of_student_in_an_event'] = $no_of_student_in_an_event;
     $this->data['all_student_in_an_event'] = $all_student_in_an_event;
     $this->data['duration'] = $duration;
     $this->data['one_day_user'] = $one_day_user;

     $this->data['event_name'] = $all_event_in_an_org[0]['event_name'];
     $this->data['org_name'] = $all_event_in_an_org[0]['org_name'];
     $this->data['house_name_number'] = $all_event_in_an_org[0]['house_name_number'];
     $this->data['street_name'] = $all_event_in_an_org[0]['street_name'];
     $exchange_currency = $all_event_in_an_org[0]['currency'];
     $this->data['postal'] = $all_event_in_an_org[0]['postal'];
    // exit;
    $billing_flag = $all_event_in_an_org[0]['event_billing'];

    $this->data['usd_exchange_rate'] = $usd_exchange_rate;
    $this->data['euro_exchange_rate'] = $euro_exchange_rate;

        }
        
    }
    
 }
 // return true;

    $this->get_include();
    $this->load->view($this->viewDir . "invoice/invoice", $this->data);
} 
    
    function view_invoice($org_id = ''){
        
        $org_id = base64_decode($org_id);
        
        $sql = "SELECT eve.*, inv.*, org.org_name, org.house_name_number, org.street_name, org.currency, org.postal 
        FROM tbl_invoice as inv 
        LEFT JOIN tbl_event as eve ON eve.ev_seq_no = inv.event_id 
        LEFT JOIN tbl_org as org ON org.org_seq_no = inv.org_id WHERE inv.org_id = '" . $org_id . "' ";
        $query = $this->db->query($sql);
        $all_events_billed = $query->result_array();

        $event_seq_no = $all_events_billed[0]['ev_seq_no'];

    $start_date = $all_events_billed[0]['start_date'];
    $end_date = $all_events_billed[0]['end_date'];
    $date_1 = strtotime($start_date);
    $next_monday_1 = date('Y-m-d', strtotime('next monday'));
    $next_monday = strtotime($next_monday_1);
    
    $currency_sql = "SELECT * FROM `tbl_exchange_rate` WHERE `created_date` BETWEEN '" . $date_1 ."' AND  '" . $next_monday. "' ";
    $query_currency = $this->db->query($currency_sql);
    $res_currency = $query_currency->result_array();

    $all_student = array();
    foreach($all_events_billed as $key => $value){

         $sql_student = "SELECT usr.fname, usr.lname, usr.type, tevs.stu_id, eve.ev_seq_no, DATEDIFF('$end_date', '$start_date') as duration "
                ."FROM tbl_user as usr "
                ."LEFT JOIN tbl_event_stu_map as tevs ON usr.id = tevs.stu_id "
                ."LEFT JOIN tbl_event as eve ON eve.ev_seq_no = tevs.ev_id "
                ."WHERE eve.ev_seq_no = '" . $event_seq_no . "' AND eve.event_billing = '1'";
        $query_student = $this->db->query($sql_student);
        $all_student_in_an_event = $query_student->result_array();

        

        $all_student = count($all_student_in_an_event);
        $no_of_students[] = $all_student;

    }

   $usd_exchange_rate = $res_currency[0]['us_dollar'];
   $euro_exchange_rate = $res_currency[0]['euro_eu'];
    $invoice_number = $all_events_invoiced[0]['invoice_number'];
    $this->data['invoice_number'] = $invoice_number;
    $this->data['org_name'] = $all_events_invoiced[0]['org_name'];
    $this->data['house_name_number'] = $all_events_invoiced[0]['house_name_number'];
    $this->data['street_name'] = $all_events_invoiced[0]['street_name'];
    $this->data['postal'] = !empty($all_events_invoiced[0]['postal']) ? $all_events_invoiced[0]['postal'] : 'N/A' ;
    $this->data['currency'] = $all_events_invoiced[0]['currency'];
    $this->data['usd_exchange_rate'] = $res_currency[0]['us_dollar'];
    $this->data['euro_exchange_rate'] = $res_currency[0]['euro_eu'];

//   exit;  
    
        $this->data['all_events_invoiced'] = $all_events_invoiced;
        $this->get_include();
        $html=$this->load->view($this->viewDir . "invoice/invoice", $this->data,true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf');

       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = curl_init($yql_query_url);
    curl_setopt($yql_session, CURLOPT_RETURNTRANSFER,true);
    $yqlexec = curl_exec($yql_session);
    $yql_json =  json_decode($yqlexec,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

    return $currency_output;
}     
    
}