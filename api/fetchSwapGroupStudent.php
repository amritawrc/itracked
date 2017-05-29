<?php

require_once('db.conf.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$group_id = (isset($_POST['group_id'])) ? $_POST['group_id'] : '';

$res = mysqli_query($con, "select g.group_seq_no,g.group_name from tbl_group as g inner join tbl_grp_stu_map on tbl_grp_stu_map.grp_id=g.group_seq_no where g.group_seq_no!=$group_id and g.status=1");
$mnr = mysqli_num_rows($res);

//$row1 = mysqli_fetch_assoc($res);
//echo '<pre>';
//print_r($row1);
//exit;

$profile_upload_to = 'http://itrackedltd.com/admin/assets/upload/student_image/';

$row = array();
while ($row1 = mysqli_fetch_assoc($res)) {
    $res0 = mysqli_query($con, "SELECT stu_id FROM `tbl_grp_stu_map` WHERE grp_id='" . $row1['group_seq_no'] . "' ");
    if ($res0) {
        $row4 = array();
        while ($row2 = mysqli_fetch_assoc($res0)) {
            $res1 = mysqli_query($con, "SELECT * FROM `tbl_student` WHERE stu_seq_no='" . $row2['stu_id'] . "' ");
            while ($row3 = mysqli_fetch_assoc($res1)) {
                $row3['path'] = $profile_upload_to;
                $row3['image'] = $profile_upload_to . $row3['profile_picture'];
                $row4[] = $row3;
            }
            if (count($row4) > 0) {
                $row1['student'] = $row4;
            } else {
                $row1['student'] = '';
            }
        }
        $row[] = $row1;
    }
}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Group student fetched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Group student not fetched ";
    echo json_encode($a);
}