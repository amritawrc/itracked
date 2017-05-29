<?php
require_once('db.conf.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$instructor_id = (isset($_POST['instructor_id'])) ? $_POST['instructor_id'] : '';

$res = $res1 = mysqli_query($con, "select distinct grp_id from tbl_ins_stu_map where ins_id=$instructor_id and grp_id!=0" );
$mnr = mysqli_num_rows($res1);

 $row = array();
	while ($row1 = mysqli_fetch_assoc($res)) {
            $res1 = mysqli_query($con, "SELECT * FROM `tbl_group` WHERE group_seq_no='".$row1['grp_id']."' ");
//            $row3=array();
            $row2 = mysqli_fetch_assoc($res1);
//            while ($row2 = mysqli_fetch_assoc($res1)) {
//                   $row3[]=$row2;
//                }
                if(count($row2)>0){
                    $row1['groups'] = $row2;
                }else{
                    $row1['groups'] = '';
                }
		$row[] = $row1;
	}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Instructor groups fetched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Instructor groups not fetched ";
    echo json_encode($a);
}