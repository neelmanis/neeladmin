

<!-- Insert json data into mysql
http://www.kodingmadesimple.com/2014/12/how-to-insert-json-data-into-mysql-php.html -->
<?php
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="neeladmin";
    
    @$server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT * FROM `app_login_info` ";
    $query = mysql_query($myquery);
  /*  
    $data = array();
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    echo json_encode($data);     
*/

$json_response = array();

while ($row = mysql_fetch_array($query)) {
$row_array['uid'] = $row['uid'];  
$row_array['login_name'] = $row['login_name'];  
$row_array['login_pass'] = $row['login_pass'];  
$row_array['email'] = $row['email'];  
$row_array['login_fullname'] = $row['login_fullname'];  
$row_array['login_contact'] = $row['login_contact'];  
$row_array['login_active'] = $row['login_active'];  
$row_array['user_type'] = $row['user_type'];  

//push the values in the array
   array_push($json_response,$row_array);
}
$json= json_encode($json_response);
//echo $json;

// START If you  want to insert json values into DB then start from here to fetch values from json to decode into php array
//convert json object to php associative array
//$json_a=json_decode($json,true);
//print_r( $json_a);


?>

