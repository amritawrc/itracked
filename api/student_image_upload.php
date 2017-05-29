<?php

require_once('db.conf.php');

$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';

$res = $res1 = mysqli_query($con, "select profile_picture from `tbl_student` where stu_seq_no = '" . $student_id . "'");
$row = mysqli_fetch_assoc($res);
$old_pic = $row['profile_picture'];
//exit;

$profile_picture = (isset($_FILES['profile_picture'])) ? $_FILES['profile_picture'] : '';

$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_image/';

//
$ext = explode('.', $profile_picture['name']);
$abc = time() . '_' . $profile_picture['name'];
$pic_name = $profile_upload_to . $abc;
//
if ($profile_picture['name'] != '' && isset($profile_picture['name'])) {
    # code...
    if (move_uploaded_file($profile_picture['tmp_name'], $pic_name)) {

        $res0 = mysqli_query($con, "update `tbl_student` set profile_picture = '" . $abc . "' WHERE `stu_seq_no` = '" . $student_id . "'");
        $user_mli = mysqli_insert_id($con);

        if ($res0) {
            if ($old_pic) {
                //unlink the old image
                $old_pic = $profile_upload_to . $old_pic;
                unlink($old_pic); // correct
            }

            $a['code'] = "100";
            $a['msg'] = "Image upload successfully ";
            $a['student_id'] = $student_id;
            echo json_encode($a);
        }
    } else {
        $a['code'] = "300";
        $a['msg'] = "Image upload failed";
        echo json_encode($a);
    }
} else {
    $a['code'] = "300";
    $a['msg'] = "Please select a image";
    echo json_encode($a);
}
?>