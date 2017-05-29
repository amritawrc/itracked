<?php

require_once('db.conf.php');

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';

$res = $res1 = mysqli_query($con, "select profile_picture from `tbl_instructor` where ins_seq_no = '" . $instructor_id . "'");

$row = mysqli_fetch_assoc($res);

$old_pic = $row['profile_picture'];

//exit;

$profile_picture = (isset($_POST['img'])) ? $_POST['img'] : '';

$profile_upload_to = $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/upload/instructor_image/';
 //$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/instructor_image/';

//

//$ext = explode('.', $profile_picture['name']);

$abc = time() . '_' . rand(0,9999999).".png";

$pic_name = $profile_upload_to . $abc;

//

if ($profile_picture != '' && isset($profile_picture)) {

    # code...

   // if (move_uploaded_file($profile_picture['tmp_name'], $pic_name)) {

        $data = base64_decode($profile_picture);
        file_put_contents($pic_name, $data);

        $res0 = mysqli_query($con, "update `tbl_instructor` set profile_picture = '" . $abc . "' WHERE `ins_seq_no` = '" . $instructor_id . "'");

        $user_mli = mysqli_insert_id($con);



        if ($res0) {

            if ($old_pic) {

                //unlink the old image

                $old_pic = $profile_upload_to . $old_pic;

                unlink($old_pic); // correct

            }



            $a['code'] = "100";

            $a['msg'] = "Image upload successfully ";

            $a['instructor_id'] = $instructor_id;
            $a['profile_picture'] = $abc;
            echo json_encode($a);

        }

    //} 

} else {

    $a['code'] = "300";

    $a['msg'] = "Please select a image";

    echo json_encode($a);

}

?>