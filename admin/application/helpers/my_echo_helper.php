<?php 
	function t($data, $terminate=0){
		if (isset($data) && !empty($data)) {
			if (is_array($data)) {
				echo '<pre>';
				print_r($data);
				echo '</pre>';
				if($terminate == 1) exit;
			}else{
				echo $data;
				if($terminate == 1) exit;
			}
		}else{
			echo 'No Value Present';
		}
	}
?>