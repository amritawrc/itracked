<?php
require_once('db.conf.php');
$student_id = (isset($_POST['student_id'])) ? $_POST['student_id'] : '';
$type = (isset($_POST['type'])) ? $_POST['type'] : ''; // type 1= student , 2= child
$status = (isset($_POST['status'])) ? $_POST['status'] : '';
$message = (isset($_POST['message'])) ? $_POST['message'] : '';
$image = (isset($_FILES['panic_image'])) ? $_FILES['panic_image'] : '';

if ($message) {
    
    if($type=='1'){
         $sql="UPDATE `tbl_ins_stu_map` SET  `panic`=1,`seen`=0,`panic_status`='$status',`message`='$message' WHERE `stu_id`=$student_id";
    }else{
         $sql="UPDATE `tbl_ins_stu_map` SET  `panic`=1,`seen`=0,`panic_status`='$status',`message`='$message' WHERE `child_id`=$student_id";
    }
   
    $res = mysqli_query($con, $sql);
  
//    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
//    exit;
    
    if ($res) {
        $a['code'] = "100";
        $a['msg'] = "Message send successfully ";
        $a['student_id'] = $student_id;
        echo json_encode($a);
    } else {
        $a['code'] = "300";
        $a['msg'] = "Message not send";
        echo json_encode($a);
    }
}

if ($image) {
    $profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_panic_image/';

    $ext = explode('.', $image['name']);
    $abc = time() . '_' . $image['name'];
    $pic_name = $profile_upload_to . $abc;

    if ($image['name'] != '' && isset($image['name'])) {
        # code...
        if (move_uploaded_file($image['tmp_name'], $pic_name)) {

            $res0 = mysqli_query($con, "UPDATE `tbl_ins_stu_map` SET  panic=1,seen=0,panic_status='$status', image = '" . $abc . "' WHERE `stu_id` = '" . $student_id . "'");
//            $user_mli = mysqli_insert_id($con);

            if ($res0) {
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
}


