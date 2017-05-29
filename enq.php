<?php
require_once('db.conf.php');
//print_r($_POST); exit();
$name = (isset($_POST['name'])) ? $_POST['name'] : '';
//$org_name = (isset($_POST['org_name'])) ? $_POST['org_name'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$message = (isset($_POST['message'])) ? $_POST['message'] : '';


        
     $sub = "Enquiry";
     $headers = 'From: noreply@itracked.com' . "\r\n" .
            'Reply-To: noreply@itracked.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
     
     if(mail($email, $sub, $message,$headers))
        {
            echo "Thank You.We will get back to you soon...";
            header('location: enquiry.php');
        }




?>