<?php

require_once('db.conf.php');

$appcode = (isset($_POST['appcode'])) ? $_POST['appcode'] : '';

$profile_upload_to =  'http://itrackedltd.com/admin/assets/upload/student_image/';

$res = $res1 = mysqli_query($con, "select * from tbl_student where appcode = '" . $appcode . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);
$row['path'] = $profile_upload_to;
$row['image'] = $profile_upload_to.$row['profile_picture'];

$type=$row['type'];
if($type==1){
    $type_name = 'student';
}else{
    $type_name = 'child';
}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['type'] = $type_name;
    $a['msg'] = "Welcome " . $row['first_name'].' '.$row['last_name'];
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Wrong app code";
    echo json_encode($a);
}
?>