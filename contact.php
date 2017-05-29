<?php
session_start();
require_once('db.conf.php');
//print_r($_POST); exit();
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
//$org_name = (isset($_POST['org_name'])) ? $_POST['org_name'] : '';

 
$fromemail = (isset($_POST['email'])) ? $_POST['email'] : '';

$message = (isset($_POST['message'])) ? $_POST['message'] : '';

//email :    info@itrackedltd.com 
//password : tqce)Tv5wH3$
        
     $sub = (isset($_POST['subject'])) ? $_POST['subject'] : '';
   
     $headers = 'From:'. $fromemail . "\r\n" .
            'Reply-To:'. $fromemail. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
     $toemail='info@itrackedltd.com';
     if(mail($toemail, $sub, $message,$headers))
        {
            //echo "Thank You.We will get back to you soon...";
           // header('location: contactus.php');
             $_SESSION['message'] = '<font color="green">Thank You . We will get back to you soon...</font>';
//            echo "<script type='text/javascript'>window.location.href='contactus.php';</script>";
              header('location: contactus.php');
        }




?>