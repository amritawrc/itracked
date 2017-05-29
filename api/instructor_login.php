<?php

require_once('db.conf.php');

$appcode = (isset($_POST['appcode'])) ? $_POST['appcode'] : '';

$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/instructor_image/';
$profile_upload_to1 = 'http://itrackedltd.com/admin/assets/upload/parent_image/';

$res = mysqli_query($con, "select * from tbl_instructor where appcode = '" . $appcode . "'");
$mnr = mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);

if ($mnr > 0) {
    $row['path'] = $profile_upload_to;
    $row['image'] = $profile_upload_to . $row['profile_picture'];
    if ($mnr > 0) {
        $a['code'] = "100";
        $a['type'] = "instructor";
        $a['msg'] = "Welcome " . $row['first_name'] . ' ' . $row['last_name'];
        $a['result'] = $row;
        echo json_encode($a);
    } else {
        $a['code'] = "300";
        $a['msg'] = "Wrong app code";
        echo json_encode($a);
    }
} else {
    
    $res1 = mysqli_query($con, "select * from tbl_parent where appcode = '" . $appcode . "'");
    $mnr = mysqli_num_rows($res1);
    $row = mysqli_fetch_assoc($res1);
    
    $row['path'] = $profile_upload_to1;
    $row['image'] = $profile_upload_to1 . $row['profile_picture'];
    
    if ($mnr > 0) {
        $a['code'] = "100";
        $a['type'] ='parent';
        $a['msg'] = "Welcome " . $row['fath_first_name'] . ' ' . $row['fath_last_name'];
        $a['result'] = $row;
        echo json_encode($a);
    } else {
        $a['code'] = "300";
        $a['msg'] = "Wrong app code";
        echo json_encode($a);
    }
}
?>