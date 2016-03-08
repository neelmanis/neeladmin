<?php
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="neeladmin";
    
    @$server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
	include 'fetch.php';
	$json_a=json_decode($json,true);
//print_r( $json_a);
foreach($json_a as $item) {
//print_r($item);
$id=$item['uid'];
$name=$item['login_name'];
$pass=$item['login_pass'];
$mail=$item['email'];
$contact=$item['login_contact'];
$status=$item['login_active'];
$role=$item['user_type'];
	//echo "---->ID".$id.$name.$pass.$mail.$contact.$status.$role. "<br/>";
}
	//echo "---->ID".$id.$name.$pass.$mail.$contact.$status.$role. "<br/>";
	?>