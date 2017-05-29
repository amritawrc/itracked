<?php

require_once('db.conf.php');

$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
$event_id = (isset($_POST['event_id'])) ? $_POST['event_id'] : '';
$grp_id = (isset($_POST['grp_id'])) ? $_POST['grp_id'] : '';

$child_seq_no = (isset($_POST['child_seq_no'])) ? $_POST['child_seq_no'] : '';
$add_seq_no = (isset($_POST['add_seq_no'])) ? $_POST['add_seq_no'] : '';
$imei_no = (isset($_POST['imei_no'])) ? $_POST['imei_no'] : '';
$mobile = (isset($_POST['mobile'])) ? $_POST['mobile'] : '';

//$appcode = md5(uniqid(rand(), true));
//$appcode = substr($appcode, 0, 10);
//
////if somehow appcode is created which is already exist in database
//while(1){
//    $res = $res1 = mysqli_query($con, "select appcode from tbl_student where 1 and appcode = '" . $appcode . "'");
//    $mnr = mysqli_num_rows($res1);
//    if ($mnr > 0) {
//        $appcode = md5(uniqid(rand(), true));
//        $appcode = substr($appcode, 0, 10);
//    }else{
//       break;
//    }
//}


$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';

//check email is exist or not in database
$res = mysqli_query($con, "select email from tbl_student where 1 and email = '" . $email . "'");
$mnr = mysqli_num_rows($res);
if ($mnr > 0) {
    $a['code'] = "300";
    $a['msg'] = "Email already exist!";
    echo json_encode($a);
    exit;
}

$din_settings = (isset($_POST['din_settings'])) ? $_POST['din_settings'] : '';
$gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
$dob = (isset($_POST['dob'])) ? $_POST['dob'] : '';

$house_name_number = (isset($_POST['house_name_number'])) ? $_POST['house_name_number'] : '';
$street_name = (isset($_POST['street_name'])) ? $_POST['street_name'] : '';
$age_on_return_to_uk = (isset($_POST['age_on_return_to_uk'])) ? $_POST['age_on_return_to_uk'] : '';
$shoe_size = (isset($_POST['shoe_size'])) ? $_POST['shoe_size'] : '';
$height = (isset($_POST['height'])) ? $_POST['height'] : '';
$weight = (isset($_POST['weight'])) ? $_POST['weight'] : '';
$medical = (isset($_POST['medical'])) ? $_POST['medical'] : '';
$dietary = (isset($_POST['dietary'])) ? $_POST['dietary'] : '';

$ski = (isset($_POST['ski'])) ? $_POST['ski'] : '';

$emergency_contact_name = (isset($_POST['emergency_contact_name'])) ? $_POST['emergency_contact_name'] : '';
$emergency_contact_primary_no = (isset($_POST['emergency_contact_primary_no'])) ? $_POST['emergency_contact_primary_no'] : '';
$emergency_contact_secondary_no = (isset($_POST['emergency_contact_secondary_no'])) ? $_POST['emergency_contact_secondary_no'] : '';
$emergency_contact_tertiary_no = (isset($_POST['emergency_contact_tertiary_no'])) ? $_POST['emergency_contact_tertiary_no'] : '';

$reg_start_date = time();
//$reg_end_date = time();
$created_date = time();
$updated_by = 1;
$created_by = 1;
$updated_date = time();
$status = 1;

$api = 'blogmo.com/itracked/api/' . $event_id;

$res2 = mysqli_query($con, "Insert into `tbl_api` (`api`) "
        . "values('$api')");


if ($org_id) {
    $res0 = mysqli_query($con, "Insert into `tbl_student` (`org_id`,`child_seq_no`, `add_seq_no`, `appcode`,`first_name`,`last_name`,`email`,`din_settings`, `gender`, `dob`, `house_name_number`, `street_name`, `age_on_return_to_uk`, `shoe_size`, `height`,`weight`,`medical`,`dietary`,`ski`,`emergency_contact_name`,`emergency_contact_primary_no`,`emergency_contact_secondary_no`,`emergency_contact_tertiary_no`,`reg_start_date`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`,`imei_no`,`mobile`,`group_id`) "
            . "values('$org_id','$child_seq_no','$add_seq_no','$appcode','$first_name','$last_name','$email','$din_settings','$gender','$dob','$house_name_number','$street_name', '$age_on_return_to_uk', '$shoe_size','$height','$weight','$medical','$dietary','$ski','$emergency_contact_name','$emergency_contact_primary_no','$emergency_contact_secondary_no','$emergency_contact_tertiary_no','$reg_start_date','$created_by','$created_date','$updated_by','$updated_date','$status','$imei_no','$mobile','$grp_id')");
    $user_mli = mysqli_insert_id($con);
//echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//exit;
}

$res1 = mysqli_query($con, "SELECT `ins_id`,`status1` FROM `tbl_event` WHERE ev_seq_no='" . $event_id . "' ");
$row2 = mysqli_fetch_assoc($res1);
$instructor_id = $row2['ins_id'];
$status = $row2['status1'];

if ($res0) {

    if ($instructor_id) {

        $res2 = mysqli_query($con, "Insert into `tbl_ins_stu_map` (`org_id`,`grp_id`,`ev_id`, `ins_id`, `stu_id`,`status`) "
                . "values('$org_id','$grp_id','$event_id','$instructor_id','$user_mli','$status')");

        $res2 = mysqli_query($con, "Insert into `tbl_grp_stu_map` (`org_id`,`grp_id`, `stu_id`,`event_id`, `status`) "
                . "values('$org_id','$grp_id','$user_mli','$event_id','1')");
    }

    $a['code'] = "100";
    $a['student_id'] = $user_mli;
    $a['msg'] = "Registered successfully";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Something went wrong";
    echo json_encode($a);
}
?>