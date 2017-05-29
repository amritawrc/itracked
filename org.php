<?php
session_start();
$_SESSION['message'] = '';

require_once('db.conf.php');
//print_r($_POST); exit();
//$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
$org_name = (isset($_POST['org_name'])) ? $_POST['org_name'] : '';
$phno = (isset($_POST['phno'])) ? $_POST['phno'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$website = (isset($_POST['website'])) ? $_POST['website'] : '';
$house = (isset($_POST['house'])) ? $_POST['house'] : '';
$street = (isset($_POST['street'])) ? $_POST['street'] : '';
 $pass= '12345678';
 $password = md5($pass);

//check email is exist or not in database
$res = mysqli_query($con, "select email from tbl_org where 1 and email = '" . $email . "'");
//echo "select email from tbl_student where 1 and email = '" . $email . "'"; 
$mnr = mysqli_num_rows($res);
if ($mnr > 0) {
   
   header('location: org_registration.php');
    echo "Email already exist!"; 
    
   
     
}
else {
 
$postal = (isset($_POST['postal'])) ? $_POST['postal'] : '';
$authno = (isset($_POST['authno'])) ? $_POST['authno'] : '';

$emergency_contact_name = (isset($_POST['emgname'])) ? $_POST['emgname'] : '';
$emergency_contact_primary_no = (isset($_POST['emergency_contact_primary_no'])) ? $_POST['emergency_contact_primary_no'] : '';
$emergency_contact_secondary_no = (isset($_POST['emergency_contact_secondary_no'])) ? $_POST['emergency_contact_secondary_no'] : '';
$emergency_contact_tertiary_no = (isset($_POST['emergency_contact_tertiary_no'])) ? $_POST['emergency_contact_tertiary_no'] : '';

$created_date = date('Y-m-d H:i:s');
//$updated_by = 1;
$created_by = 1;

$status = 1;


$query="Insert into `tbl_org` (`org_id`,`org_name`,`phno`,`username`,`password`,`postal`,`website`,`house_name_number`,`street_name`,`org_auth_no`,`sp_contact_name`,`sp_contact_no1`,`sp_contact_no2`,`sp_contact_no3`,`created_by`,`created_date`,`status`) "
                . "values('','$org_name','$phno','$email','$password','$postal','$website','$house','$street','$authno','$emergency_contact_name','$emergency_contact_primary_no','$emergency_contact_secondary_no','$emergency_contact_tertiary_no','$created_by','$created_date','$status')";
 //echo $query; die();
        $res2 = mysqli_query($con, $query);
        
     $sub = "Login Details";
     $message_content1 = "Your username is ".$email." Your password is ".$pass;
     if(mail($email, $sub, $message_content1))
        {
            echo "Thank You.We will get back to you soon...";
        }
    
   $_SESSION['message'] = 'Registered successfully';     
   header('location: org_registration.php');
    //echo "Registered successfully";
  
  
}


?>