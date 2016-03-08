

<!-- Insert json data into mysql
http://www.kodingmadesimple.com/2014/12/how-to-insert-json-data-into-mysql-php.html -->
<?php
include 'dbconfig.php';

   $myquery = "SELECT * FROM `master_country` ";
	$mysqlresult = $mysqldblink->query($myquery);

$json_response = array();

while($row = $mysqlresult->fetch_array()){ // print_r($row);
$row_array['id'] = $row['id'];  
$row_array['country'] = $row['country'];  
$row_array['status'] = $row['status'];    

//push the values in the array
   array_push($json_response,$row_array);
}
$json= json_encode($json_response);
echo '--'.$json;

// START If you  want to insert json values into DB then start from here to fetch values from json to decode into php array
//convert json object to php associative array
//$json_a=json_decode($json,true);
//print_r( $json_a);


?>

