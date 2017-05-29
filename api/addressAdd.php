<?php

require_once('db.conf.php');

$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
$user_type = (isset($_POST['user_type'])) ? $_POST['user_type'] : '';

$address_line1 = (isset($_POST['address_line1'])) ? $_POST['address_line1'] : '';
$address_line2 = (isset($_POST['address_line2'])) ? $_POST['address_line2'] : '';
$address_line3 = (isset($_POST['address_line3'])) ? $_POST['address_line3'] : '';
$city = (isset($_POST['city'])) ? $_POST['city'] : '';
$state = (isset($_POST['state'])) ? $_POST['state'] : '';
$postal_code = (isset($_POST['postal_code'])) ? $_POST['postal_code'] : '';
$country = (isset($_POST['country'])) ? $_POST['country'] : '';
$county = (isset($_POST['county'])) ? $_POST['county'] : '';
$email = (isset($_POST['gender'])) ? $_POST['email'] : '';
$phone = (isset($_POST['dob'])) ? $_POST['phone'] : '';
$mobile_cell = (isset($_POST['mobile_cell'])) ? $_POST['mobile_cell'] : '';
$website_url = (isset($_POST['website_url'])) ? $_POST['website_url'] : '';
$social_media_url = (isset($_POST['social_media_url'])) ? $_POST['social_media_url'] : '';
$remarks_notes = (isset($_POST['remarks_notes'])) ? $_POST['remarks_notes'] : '';

$created_date = time();
$updated_by = $user_id;
$created_by = $user_id;
$updated_date = time();
$status = 1;

$res0 = mysqli_query($con, "Insert into `tbl_address` (`address_line1`,`address_line2`, `address_line3`, `city`,`state`,`postal_code`,`country`,`county`, `email`, `phone`, `mobile_cell`, `website_url`, `social_media_url`, `remarks_notes`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`) "
        . "values('$address_line1','$address_line2','$address_line3','$city','$state','$postal_code','$country','$county','$email','$phone','$mobile_cell','$website_url', '$social_media_url', '$remarks_notes','$created_by','$created_date','$updated_by','$updated_date','$status')");
$address_id = mysqli_insert_id($con);
//echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//exit;
// s= student, p=parent, i=instructor
if ($user_type == 'S') {
    $res0 = mysqli_query($con, "update `tbl_student` set add_seq_no = '" . $address_id . "' WHERE `stu_seq_no` = '" . $user_id . "'");
    $user_mli = mysqli_insert_id($con);
} elseif ($user_type == 'P') {
    $res0 = mysqli_query($con, "update `tbl_parent` set add_seq_no = '" . $address_id . "' WHERE `par_seq_no` = '" . $user_id . "'");
    $user_mli = mysqli_insert_id($con);
} elseif ($user_type == 'I') {
    $res0 = mysqli_query($con, "update `tbl_instructor` set add_seq_no = '" . $address_id . "' WHERE `ins_seq_no` = '" . $user_id . "'");
    $user_mli = mysqli_insert_id($con);
}

if ($res0) {
    $a['code'] = "100";
    $a['user_id'] = $user_id;
    $a['msg'] = "Address added successfully";
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Something went wrong";
    echo json_encode($a);
}
?>