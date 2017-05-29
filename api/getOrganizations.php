<?php

require_once('db.conf.php');

$res = $res1 = mysqli_query($con, "select org_seq_no,org_name from tbl_org");
$mnr = mysqli_num_rows($res1);

        $row = array();
	while ($row1 = mysqli_fetch_assoc($res)) {
            $res1 = mysqli_query($con, "SELECT `ev_seq_no`, `event_name` FROM `tbl_event` WHERE org_id='".$row1['org_seq_no']."' ");
            $row3=array();
            while ($row2 = mysqli_fetch_assoc($res1)) {
                
                $res2 = mysqli_query($con, "SELECT `group_seq_no`, `group_name` FROM `tbl_group` WHERE event_id='".$row2['ev_seq_no']."' ");
                $row4 = array();
                while ($row5 = mysqli_fetch_assoc($res2)) {
                     $row4[]=$row5;
                }
                 if(count($row4)>0){
                    $row2['group'] = $row4;
                }else{
                    $row2['group'] = '';
                }
                   $row3[]=$row2;
                }
                if(count($row3)>0){
                    $row1['events'] = $row3;
                }else{
                    $row1['events'] = '';
                }
		$row[] = $row1;
	}

if ($mnr > 0) {
    $a['code'] = "100";
    $a['msg'] = "Organizations feched successfully";
    $a['result'] = $row;
    echo json_encode($a);
} else {
    $a['code'] = "300";
    $a['msg'] = "Organizations not fetched";
    echo json_encode($a);
}
?>