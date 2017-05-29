<?php

require_once('db.conf.php');

//$org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
//$child_seq_no = (isset($_POST['child_seq_no'])) ? $_POST['child_seq_no'] : '';

//$add_seq_no = (isset($_POST['add_seq_no'])) ? $_POST['add_seq_no'] : '';

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$first_name = (isset($_POST['first_name'])) ? $_POST['first_name'] : '';
$last_name = (isset($_POST['last_name'])) ? $_POST['last_name'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';

//check email is exist or not in database
$res = $res1 = mysqli_query($con, "select email from tbl_student where 1 and email = '" . $email . "' and stu_seq_no!='".$student_id."'");
$mnr = mysqli_num_rows($res1);
if ($mnr > 0) {
    $a['code'] = "300";
    $a['msg'] = "Email already exist";
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

//$reg_end_date = time();
$updated_by = 1;
$updated_date = time();
$status = 1;

$res0 = mysqli_query($con, "Insert into `tbl_student` (`org_id`,`child_seq_no`, `add_seq_no`, `appcode`,`first_name`,`last_name`,`email`,`din_settings`, `gender`, `dob`, `house_name_number`, `street_name`, `age_on_return_to_uk`, `shoe_size`, `height`,`weight`,`medical`,`dietary`,`ski`,`emergency_contact_name`,`emergency_contact_primary_no`,`emergency_contact_secondary_no`,`emergency_contact_tertiary_no`,`reg_start_date`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`,`imei_no`) "
        . "values('$org_id','$child_seq_no','$add_seq_no','$appcode','$first_name','$last_name','$email','$din_settings','$gender','$dob','$house_name_number','$street_name', '$age_on_return_to_uk', '$shoe_size','$height','$weight','$medical','$dietary','$ski','$emergency_contact_name','$emergency_contact_primary_no','$emergency_contact_secondary_no','$emergency_contact_tertiary_no','$reg_start_date','$created_by','$created_date','$updated_by','$updated_date','$status','$imei_no')");
 
$res0 = mysqli_query($con,
          "update `tbl_student` set first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', din_settings = '".$din_settings."', gender = '".$gender."', dob = '".$dob."', house_name_number = '".$house_name_number."'"
        . ", street_name = '".$street_name."', age_on_return_to_uk = '".$age_on_return_to_uk."', shoe_size = '".$shoe_size."'"
        . ", height = '".$height."', weight = '".$weight."', medical = '".$medical."'"
        . ", dietary = '".$dietary."', ski = '".$ski."', emergency_contact_name = '".$emergency_contact_name."'"
        . ", emergency_contact_primary_no = '".$emergency_contact_primary_no."', emergency_contact_secondary_no = '".$emergency_contact_secondary_no."', emergency_contact_tertiary_no = '".$emergency_contact_tertiary_no."'"
        . ", updated_by = '".$updated_by."', updated_date = '".$updated_date."', status = '".$status."'"
        . " WHERE `stu_seq_no` = '" . $student_id . "'");
//echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//exit;

if ($res0) {
    $a['code'] = "100";
    $a['student_id'] = $student_id;
    $a['msg'] = "Update successfully";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Something went wrong";
    echo json_encode($a);
}
?>