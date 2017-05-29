<?php

require_once('db.conf.php');

$parent_id = (isset($_POST['parent_id'])) ? $_POST['parent_id'] : '';

//$profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/itracked/assets/upload/parent_image/';
$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/parent_image/';

$res = $res1 = mysqli_query($con, "select * from tbl_parent where par_seq_no = '" . $parent_id . "'");
$mnr = mysqli_num_rows($res1);
$row = mysqli_fetch_assoc($res);
$row['path'] = $profile_upload_to;
$row['image'] = $profile_upload_to.$row['profile_picture'];

if ($mnr > 0) {
    $a['code']   = "100";
    $a['msg']    = "Parent data successfully fetched";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code']   = "300";
    $a['msg']    = "Unable to fetch parent data";
    echo json_encode($a);
}
?>
