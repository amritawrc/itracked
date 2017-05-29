<?php 

function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = curl_init($yql_query_url);
    curl_setopt($yql_session, CURLOPT_RETURNTRANSFER,true);
    $yqlexec = curl_exec($yql_session);
    $yql_json =  json_decode($yqlexec,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

    return $currency_output;
}


// Create connection
$dbhost = '192.232.198.102';
$dbuser = 'itritrac_ituser';
$dbpass = 'R~@q+VS,F*zu';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('itritrac_itracked1',$conn );
if(! $conn ) {
  die('Could not connect: ' . mysql_error());
}



$retval = mysql_query('SELECT ev_seq_no,start_date FROM tbl_event');

if(! $retval ) {
  die('Could not get data: ' . mysql_error());
}

if(mysql_num_rows($retval))
{	
	while($row = mysql_fetch_assoc($retval))
	{
		$row['start_date']; 
		$currency_input = 1;
		$currency_from = "GBP";
		if(strtotime($row['start_date'])<strtotime(date('Y-m-d')) && $row['event_billing']!=1)
		{
			$currency_to_us_dollar = currencyConverter($currency_from,"USD",$currency_input);
            $currency_to_euro_eu = currencyConverter($currency_from,"EUR",$currency_input);
            $date = date('Y-m-d h:i:s');
            $current_date = strtotime($date); 
            $insq=mysql_query("INSERT INTO tbl_exchange_rate(us_dollar, euro_eu,created_date) VALUES ($currency_to_us_dollar,$currency_to_euro_eu, $current_date)");
            //echo "Successfully added";
          
           exit();
		}
		
		
	  
	} 
}else{
	echo "No fetched data available\n";
}

mysql_close($conn);
?>