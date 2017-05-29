<?php

class Org_login extends MY_OrgController {

    function __construct() {
        parent::__construct();
        
        //$this->checkSessionForUser(); ///////for login check(refer my controller)/////

        $this->load->model('org');
    }

    public function index() {
        // $userSession = $this->session->userdata;
        //$this->get_include();
        $this->load->view($this->viewDir . "login/login", $this->data);
    }

    public function submitLogin() {
        // echo "ok"; exit;

        if ($this->input->post('username')) {

            $username = $this->input->post('username');

         $password = md5($this->input->post('password'));
        // exit;

            $cond = "AND `username`='$username' AND `password`='$password' AND `status`='1'";
            $loginDataExists = $this->org->fetch('org', $cond);

           // echo 123;
           // echo $this->db->last_query();
           // t($loginDataExists);
           // exit;
            
            if (count($loginDataExists) > 0) {
//                $this->session->set_userdata('admin_data', $loginDataExists);
                $newdata = array(
                    'admin_id' => $loginDataExists[0]['org_seq_no'],
                    'org_name' => $loginDataExists[0]['org_name'],
                    'username' => $loginDataExists[0]['username'],
                    'email' => $loginDataExists[0]['username'],
                );
//t($newdata);
//exit;
                $this->session->set_userdata('admin_data', $newdata);
                    $admin_all_session = $this->session->userdata('admin_data');
//                t($admin_all_session);
//                exit;

                $this->session->set_flashdata('suc_message', 'You have logged in Successfully .');
                redirect('org/dashboard/index');
            } else {
                $this->session->set_flashdata('err_message', 'The email or password you entered is wrong.');
                redirect('org/login/index');
            }
        } else {
            $this->session->set_flashdata('err_message', 'Please try Again.');
            redirect('org/login/index');
            exit();
        }
    }

    public function forgot() {
        $userSession = $this->session->userdata;

        $this->get_include();
        $this->load->view($this->viewDir . "login/forgotPassword", $this->data);
    }

    public function changepassword($code = '') {
//      $this->checkSessionForUser();
        if (isset($_POST['password'])) {
            //t($code,1);
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            $id = base64_decode($code);
            //t($id,1);
            $cond = "AND `org_seq_no`='$id' AND `status`='1'";
            $ExistsChk = $this->org->fetch('org', $cond);
            //t($ExistsChk,1);
            if (count($ExistsChk) > 0) {

                $arr['password'] = md5($password);
                //echo $arr['password']; die();
                if ($this->org->edit_cond('org', $arr, $cond)) {
                    //echo "hi"; die();
                    #$this->setSessionForConsumer($id);
                    $this->session->set_flashdata('suc_message', 'Sucessfully password changed');
                    redirect('org/dashboard/index');
                } else {
                    $this->session->set_flashdata('err_message', "Something Went Wrong Please try again.");
                    redirect('org/login/changepassword/' . $code);
                }
            } else {
                redirect('org/dashboard/index');
            }
        } else {

            $this->data['code'] = $code;
            //t($id,1);
            $this->get_include();
            $this->load->view($this->viewDir . "login/changepassword", $this->data);
        }
    }

    public function logout($param) {
        $this->session->unset_userdata('admin_data');
        //$this->session->sess_destroy();
        $this->session->set_flashdata('suc_message', 'You have logged out successfully');
        redirect('org/login');
    }

    /*
     * Forgot password email send to admin email
     */

    function forgotPassword() {

        $email = $this->input->post('email');
        $cond = " AND `status`='1' AND `username`='$email'";
        $chkData = $this->org->fetch('org', $cond);
        //echo $this->db->last_query();die();
        if (isset($_POST['email'])) {
            if (count($chkData) > 0) {
                $id = $chkData[0]['org_seq_no'];
                $fname = $chkData[0]['org_name'];
                $email = $chkData[0]['username'];

                $this->sendForgotPasswordEmail($id, $fname, $email);

                $this->session->set_flashdata('suc_message', 'Please check your email for link.');
            } else {
                $this->session->set_flashdata('err_message', "wrong username  <br> Please try again.");
            }
        }
        redirect('org/login');
    }

    /*
     * Forgot email template that is send to admin's email
     */

    function sendForgotPasswordEmail($id, $fname, $email) {
        $link_url = $this->data['base_url'] . 'login/verifyEmail/';
        $one_time_password = base64_encode($id);

        $to = $email;
        $path = $this->data['email_template_path'] . 'forgotpassword.html';

        $message_tpl = file_get_contents($path);
        $message_tpl = $this->load->view('frontend/email/forgotpassword', '', true);
        $patterns = array();

        $patterns[0] = '/!!!#fname#!!!/';
        $patterns[1] = '/!!!#link_url#!!!/';
        $patterns[2] = '/!!!#year#!!!/';

        $replacements = array();

        $replacements[0] = $fname;
        $replacements[1] = $link_url . $one_time_password;
        $replacements[2] = date("Y");
        $message_content = preg_replace($patterns, $replacements, $message_tpl);
        //t($message_content,1);
        $subject = "Forgot Password";
        $chkEmailStatus = $this->email_send($to, $subject, $message_content, 0, 1);
        if ($chkEmailStatus) {
            return 1;
        } else {
            return 0;
        }
    }

    function verifyEmail($code) {
        if (isset($_POST['password'])) {
            //t($_POST,1);
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            $id = base64_decode($code);
            //echo $id; die();
            $cond = " AND `org_seq_no`='$id' AND `status`='1'";
            $ExistsChk = $this->org->fetch('org', $cond);
            if (count($ExistsChk) > 0) {
                $arr['password'] = md5($password);
                if ($password != $cpassword) {
                    $this->session->set_flashdata('err_message', 'Password not match');
                } else {
                    if ($this->org->edit_cond('org', $arr, $cond)) {
                        //echo $this->db->last_query(); die();
                        #$this->setSessionForConsumer($id);
                        $this->session->set_userdata('admin_data', $ExistsChk);
                        $this->session->set_flashdata('suc_message', 'Sucessfully changes password');
                        redirect('org/dashboard/index');
                    } else {
                        $this->session->set_flashdata('err_message', "Something Went Wrong Please try again.");
                    }
                }
                redirect('org/login/verifyEmail/' . $code);
            } else {
                redirect('org/login');
            }
        } else {

            $this->data['code'] = $code;
            $this->get_include();
            $this->load->view($this->viewDir . 'login/forgotPasswordnew', $this->data);
        }
    }

}
