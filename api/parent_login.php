<?php

require_once('db.conf.php');

$appcode = (isset($_POST['appcode'])) ? $_POST['appcode'] : '';

//$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/parent_image/';

$res = $res1 = mysqli_query($con, "select * from tbl_parent where appcode = '" . $appcode . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);
//$row['path'] = $profile_upload_to;
//$row['image'] = $profile_upload_to.$row['profile_picture'];

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Welcome " . $row['fath_first_name'].' '.$row['fath_last_name'];
    $a['parent_id'] = $row['par_seq_no'];
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Wrong app code";
    echo json_encode($a);
}
?>