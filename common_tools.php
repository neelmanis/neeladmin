<?php
ob_start();
include 'dbconfig.php';
session_start();
error_reporting(E_ALL ^ E_NOTICE);
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['login_name'])) {
header('Location: login.php');
}
$gotuid=$_SESSION['uid'];
$login_name=$_SESSION['login_name'];
?>

<?php
$user_query  = "select user_type from app_login_info where uid = '$gotuid'";
$mysqlresult = $mysqldblink->query($user_query);
$row=$mysqlresult->fetch_array();
$user_type  = $row['user_type'];
?>