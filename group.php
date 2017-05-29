<?php
          require_once('db.conf.php');          
       $event_id = (isset($_POST['event_id'])) ? $_POST['event_id'] : '';
        
         $query1 = "SELECT * FROM `tbl_group` where event_id = $event_id";
         $result1 =  mysqli_query($con,$query1);
         
         $opt = '<option value="">Enter Group</option>';
          while($data = mysqli_fetch_array($result1)){
                $displayData = $data['group_seq_no'];
                $displayData1 = $data['group_name'];
        
       
            $opt .= '<option value="' . $displayData . '">' . $displayData1 . '</option>';
        }
        echo $opt;
   
?>