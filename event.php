<?php
          require_once('db.conf.php');          
       $org_id = (isset($_POST['org_id'])) ? $_POST['org_id'] : '';
        
         $query1 = "SELECT * FROM `tbl_event` where org_id = $org_id";
         $result1 =  mysqli_query($con,$query1);
         
         $opt = '<option value="">Enter Event</option>';
          while($data = mysqli_fetch_array($result1)){
                $displayData = $data['ev_seq_no'];
                $displayData1 = $data['event_name'];
        
       
            $opt .= '<option value="' . $displayData . '">' . $displayData1 . '</option>';
        }
        echo $opt;
   
?>