<?php

session_start();
$_SESSION['message'] = '';

require_once('db.conf.php');
//print_r($_POST); exit();
//$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
$org_id = 1;
$_SESSION['org_id'] = $org_id;
//$org_name = (isset($_POST['org_name'])) ? $_POST['org_name'] : '';
$phno = (isset($_POST['phno'])) ? $_POST['phno'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';

$house = (isset($_POST['house'])) ? $_POST['house'] : '';
$street = (isset($_POST['street'])) ? $_POST['street'] : '';
$f_first_name = (isset($_POST['f_first_name'])) ? $_POST['f_first_name'] : '';
$f_last_name = (isset($_POST['f_last_name'])) ? $_POST['f_last_name'] : '';


//check email is exist or not in database
$res = mysqli_query($con, "select email from tbl_parent where 1 and email = '" . $email . "'");
//echo "select email from tbl_student where 1 and email = '" . $email . "'"; 
$mnr = mysqli_num_rows($res);
if ($mnr > 0) {
    $msg = "Email already exist!";
    $_SESSION['message'] = $msg;
    header('location: par_registration.php');
} else {
    $arr = array();
    $child_appcodes = array();
    $postal = (isset($_POST['postal'])) ? $_POST['postal'] : '';

    $chil = (isset($_POST['chil'])) ? $_POST['chil'] : '';
//$stud = (isset($_POST['stud'])) ? $_POST['stud'] : '';
    $chname = (isset($_POST['chname'])) ? $_POST['chname'] : '';
    $chphno = (isset($_POST['chphno'])) ? $_POST['chphno'] : '';
   $plan_id = (isset($_POST['plan_id'])) ? $_POST['plan_id'] : '';
  
    $_SESSION['plan_id'] = $plan_id;
    
     $current_time = time();
    
    $created_date = $current_time;
    $reg_start_date = $current_time;

    $query4 = "SELECT valid FROM `tbl_plan` WHERE id=$plan_id";
    $result4 = mysqli_query($con, $query4);
    $row1 = mysqli_fetch_assoc($result4);
    $valid = $row1['valid'];
   
    $current_time = $current_time + (60 * 60 * 24 * $valid);

    $reg_end_date = $current_time;
//$updated_by = 1;
    $created_by = 1;
    $status = 5;//mean delete condition
    $type = 2;//means child



    $query = "Insert into `tbl_parent` (`org_id`,`phno`,`email`,`postal`,`house_name_number`,`street_name`,`fath_first_name`,`fath_last_name`,`no_child`,`created_by`,`created_date`,`plan_id`,`status`,`reg_start_date`,`reg_end_date`) "
            . "values('$org_id','$phno','$email','$postal','$house','$street','$f_first_name','$f_last_name','$chil','$created_by','$created_date','$plan_id','$status','$reg_start_date','$reg_end_date')";
    //echo $query; die();
    $res2 = mysqli_query($con, $query);
    //print_r($chname); die();
    $last_id = $con->insert_id;
    $_SESSION['par_id'] = $last_id;

    foreach ($chname as $key => $value) {

        $query2 = "Insert into `tbl_student` (`first_name`,`mobile`,`status`,`type`) "
                . "values('$value','$chphno[$key]','$status','$type')";
        mysqli_query($con, $query2);
        $last_idd = $con->insert_id;

        $arr[$key] = $last_idd;
//        $child_appcodes[$key] = $ch_appcode;
    }

    $_SESSION['stu_id'] = implode(',', $arr);


    $_SESSION['message'] = 'Registered successfully';
    header('location: parent_registartion_payment_view.php');
    // echo "Registered successfully";
}
?>