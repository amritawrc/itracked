<?php

/**
 * The Below class is used for admin section so please check this correctly.
 */
class MY_AdminController extends CI_Controller {

    public $data = array();
    public $viewDir;

    function __construct() {

        parent::__construct();
        //t($this);
//        if ($this->router->fetch_class() != 'admin_login') {
//            $this->checkSessionForUser();
//        }


        $this->data['class'] = $this->router->fetch_class();
        $this->viewDir = "backend/";

        # Setting The Base Url And other
        $baseUrl = $this->config->item('base_url');
//        $this->data['base_url'] = $baseUrl . "admin/";
        $this->data['base_url'] = $baseUrl;
        $this->data['css_path'] = $baseUrl;
        $this->data['js_path'] = $baseUrl;
        $this->data['images_path'] = $baseUrl;
        $this->data['page_title'] = 'Itracked - Admin';


        //$this->data['images_path'] = $baseUrl . $this->config->item('admin_images_path');
        $this->data['upload_path'] = $baseUrl . $this->config->item('admin_upload_path');
        $this->data['email_template_path'] = $baseUrl . 'assets/email/';

       //  $all_admin_session = $this->session->userdata('admin_session_data');
       //  // t($all_admin_session);
       //  // exit;
       // $admin_id = $admin_all_session['admin_id'];
    }

    function get_include() {
        $this->data['header'] = $this->load->view($this->viewDir . "template/header", $this->data, true);
        $this->data['footer'] = $this->load->view($this->viewDir . "template/footer", $this->data, true);
        $this->data['leftmenu'] = $this->load->view($this->viewDir . "template/leftmenu", $this->data, true);
    }
    // function ifLoggedin(){
    //     $admin_id = $this->data['admin_id'];
    //    // exit;

    //     if($admin_id){

    //     }
    //     else{
    //         // echo 123; exit;
    //         redirect($base_url . 'login');
    //     }
    // }

    function checkSessionForUser() {
        $userSession = $this->session->userdata;
        //t($userSession,1);
        if (isset($userSession['admin_data'][0]['email'])) {
            // return $userSession['admin_data'][0]['admin_id'];
        } else {
            redirect("login");
        }
    }

    function getUserSessionId() {
        $userSession = $this->session->userdata;
        if (isset($userSession['admin_data'][0]['email'])) {
            return $userSession['admin_data'][0]['admin_id'];
        } else {
            return 0;
        }
    }

   public function email_send($to, $subject, $message, $from = 0, $smtp = 0) {
        $this->load->library('email');
        $email_det = $this->getEmailSettings();
        if ($from == 0) {
            $noreply_email = $email_det['sender_email'];
        } else {
            $noreply_email = $from;
        }

        if ($_SERVER['HTTP_HOST'] == 'www.itrackedltd.com' || $_SERVER['HTTP_HOST'] == 'itrackedltd.com') {
            $smtp = 0;
        } else {
            $smtp = 1;
        }

        if ($smtp != 0) {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://www.itrackedltd.com';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user'] = 'mintu@itrackedltd.com';
            $config['smtp_pass'] = 'grass1=!';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            //$config['validation']   = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);
        } else {
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $this->email->initialize($config);
        }


        $this->email->from($noreply_email, $email_det['sender_name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $sendEmail = $this->email->send();
        //$this->email->print_debugger(); # to check the email for any error.
        return $sendEmail;
    }

    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    function getEmailSettings() {
        $this->load->model('email_settings');
        $cond = " and id=1";
        $email_settings = $this->email_settings->fetch('email_settings', $cond);
        return $email_settings[0];
    }

    function keyword_generate($keywords) {
        $tot = array();
        preg_match_all('/"([\w]+)"|"([\w]+ [\w]+)"/', $keywords, $output1);
        t($output1, 1);
        $text = preg_replace('/"[^"]*"/s', ",", $keywords);
        $result = explode(',', $text);
        $final_output = array_merge($output1[0], $result);
        if (!empty($final_output)) {
            foreach ($final_output as $k => $v) {
                if ($v != ' ' && !empty($v)) {
                    $tot[] = trim($v, '"');
                }
            }
        }
        return $tot;
    }

    function generate_link($ad_id) {
        $this->load->model('category');
        $cat = "";
        $search_link = "";
        $all_search_query = "select * from (select distinct(ad_id),cat_id,ad_title  from tbl_search where ad_id='{$ad_id}') as a";
        $query_search_results = $this->db->query($all_search_query);
        $all_search_results = $query_search_results->result_array();
        if (!empty($all_search_results)) {
            $cond = " and cat_id='{$all_search_results[0]['cat_id']}'";
            $cat = $this->category->fetch('category', $cond, 'cat_name');
            $category = (!empty($cat) ? $cat[0]['cat_name'] : "");
            $category = strtolower($category);
            $adtitle = strtolower($all_search_results[0]['ad_title']);
            $search_link = base_url() . 'listing/' . seoUrl($category) . '/' . $ad_id . '/' . seoUrl($adtitle);
        }
        return $search_link;
    }

}

class MY_OrgController extends CI_Controller {

    public $data = array();
    public $viewDir;

    function __construct() {

        parent::__construct();
        // echo "ok"; die();
        //t($this);
//        if ($this->router->fetch_class() != 'admin_login') {
//            $this->checkSessionForUser();
//        }
        $this->data['class'] = $this->router->fetch_class();

        $this->viewDir = "org/";

        # Setting The Base Url And other
        $baseUrl = $this->config->item('base_url');
        $this->data['main_base_url'] = $baseUrl;
        $this->data['base_url'] = $baseUrl . "org/";
        $this->data['css_path'] = $baseUrl;
        $this->data['js_path'] = $baseUrl;
        $this->data['images_path'] = $baseUrl;
        $this->data['page_title'] = 'Organization - Admin';

        //$this->data['images_path'] = $baseUrl . $this->config->item('admin_images_path');
        $this->data['upload_path'] = $baseUrl . $this->config->item('admin_upload_path');
        $this->data['email_template_path'] = $baseUrl . 'assets/frontend/email/';

        $admin_all_session = $this->session->userdata('admin_data');
//                t($admin_all_session);
//                exit;
        //$userSession = $this->session->userdata;
        $org_id = $admin_all_session['admin_id'];
        $this->data['org_id'] = $org_id;
//        exit;
//        t($userSession['admin_data']);
//        exit;
//        $sql = "select count(id) as panic from tbl_ins_stu_map where org_id=$org_id AND panic=1 and seen=0";
//        $query = $this->db->query($sql);
//        $panic = $query->result_array();
//        $this->data['panic'] = $panic[0]['panic'];

        if ($org_id) {
            $sql = "select count(id) as panic from tbl_event_stu_map where org_id=$org_id AND panic=1 and seen=0";
            $query = $this->db->query($sql);
            $panic = $query->result_array();
            $this->data['panic'] = $panic[0]['panic'];
        }
    }

    function get_include() {
        $this->data['header'] = $this->load->view($this->viewDir . "template/header", $this->data, true);
        $this->data['footer'] = $this->load->view($this->viewDir . "template/footer", $this->data, true);
        $this->data['leftmenu'] = $this->load->view($this->viewDir . "template/leftmenu", $this->data, true);
    }

    function checkSessionForUser() {

        $userSession = $this->session->userdata;
        $admin_all_session = $this->session->userdata('admin_data');
        $org_id = $admin_all_session['admin_id'];

        //t($userSession,1);
        if ($org_id) {
            return $org_id;
        } else {
            redirect("org/login");
        }
    }

    function getUserSessionId() {
        $userSession = $this->session->userdata;
        if (isset($userSession['admin_data'][0]['username'])) {
            return $userSession['admin_data'][0]['org_seq_no'];
        } else {
            return 0;
        }
    }

    public function email_send($to, $subject, $message, $from = 0, $smtp = 0) {
        $this->load->library('email');
        $email_det = $this->getEmailSettings();
        if ($from == 0) {
            $noreply_email = $email_det['sender_email'];
        } else {
            $noreply_email = $from;
        }

        if ($_SERVER['HTTP_HOST'] == 'www.itrackedltd.com' || $_SERVER['HTTP_HOST'] == 'itrackedltd.com') {
            $smtp = 0;
        } else {
            $smtp = 1;
        }

        if ($smtp != 0) {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://www.itrackedltd.com';
            $config['smtp_port'] = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user'] = 'mintu@itrackedltd.com';
            $config['smtp_pass'] = 'grass1=!';
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            //$config['validation']   = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);
        } else {
            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $this->email->initialize($config);
        }


        $this->email->from($noreply_email, $email_det['sender_name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $sendEmail = $this->email->send();
        //$this->email->print_debugger(); # to check the email for any error.
        return $sendEmail;
    }

    function seoUrl($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    function getEmailSettings() {
        $this->load->model('email_settings');
        $cond = " and id=1";
        $email_settings = $this->email_settings->fetch('email_settings', $cond);
        return $email_settings[0];
    }

    function keyword_generate($keywords) {
        $tot = array();
        preg_match_all('/"([\w]+)"|"([\w]+ [\w]+)"/', $keywords, $output1);
        t($output1, 1);
        $text = preg_replace('/"[^"]*"/s', ",", $keywords);
        $result = explode(',', $text);
        $final_output = array_merge($output1[0], $result);
        if (!empty($final_output)) {
            foreach ($final_output as $k => $v) {
                if ($v != ' ' && !empty($v)) {
                    $tot[] = trim($v, '"');
                }
            }
        }
        return $tot;
    }

    function generate_link($ad_id) {
        $this->load->model('category');
        $cat = "";
        $search_link = "";
        $all_search_query = "select * from (select distinct(ad_id),cat_id,ad_title  from tbl_search where ad_id='{$ad_id}') as a";
        $query_search_results = $this->db->query($all_search_query);
        $all_search_results = $query_search_results->result_array();
        if (!empty($all_search_results)) {
            $cond = " and cat_id='{$all_search_results[0]['cat_id']}'";
            $cat = $this->category->fetch('category', $cond, 'cat_name');
            $category = (!empty($cat) ? $cat[0]['cat_name'] : "");
            $category = strtolower($category);
            $adtitle = strtolower($all_search_results[0]['ad_title']);
            $search_link = base_url() . 'listing/' . seoUrl($category) . '/' . $ad_id . '/' . seoUrl($adtitle);
        }
        return $search_link;
    }

}
