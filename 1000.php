<?php
include_once('dbconfig.php');
for($i=0;$i<10000;$i++)
{
$a=$i;

$fname="192.168.0.1".$a;
$pass="11111".$a;
$name='name'.$a;
$mob='2222'.$a;
$mail='name@abc.com'.$a;
$regx="INSERT INTO `app_login_info`(`uid`, `create_on_date`, `login_name`, `login_pass`, `email`, `login_fullname`, `login_contact`, `login_active`, `user_type`) VALUES ('',NOW(),'$name','$pass','$mail','$fname','$mob','1','admin')";
print "\n   $i --> ".$regx;
$mysqlresult = $mysqldblink->query($regx);
$gotuidx=mysqli_insert_id($mysqldblink);
}
?>