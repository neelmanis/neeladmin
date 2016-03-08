<?php
session_start();
$msg='';
$appname="My Organizer";
include 'dbconfig.php';
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
 $loginnow=$_POST['loginnow'];
 if($loginnow=='yes')
 { 
$login_name=trim($_POST['login_name']);
$login_pass=trim($_POST['login_pass']);
$remember=$_POST['appsrem'];
$login_name = mysqli_real_escape_string($mysqldblink, $login_name);
$login_name=str_replace(" ","",$login_name);
$login_pass=str_replace(" ","",$login_pass);

if(empty($login_name) || empty($login_pass)) {
$msg = "<span style='color: red'>***Username or Password is Missing.</span>";
}else
{
$queri = "SELECT uid,login_name,login_pass FROM app_login_info WHERE login_name='$login_name' AND login_pass='$login_pass' && `login_active` =1";
$mysqlresults = $mysqldblink->query($queri); 
$match=mysqli_num_rows($mysqlresults); 		
if($match>=1){
$mysqlrow = $mysqlresults->fetch_array();
$_SESSION['uid']=$mysqlrow['uid'];
$_SESSION['login_name']=$mysqlrow['login_name'];
header("Location: dashboard.php"); 
}else{	 
$msg= "<span style='color: red'>*** Username or Password is Invalid.</span>";
}}}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin : <?php echo $appname ?></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <form class="form-signin" role="adminform" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h2 class="form-signin-heading">Please sign in</h2><br>
		<span><?php echo $msg; ?></span>
<input type="hidden" name="loginnow" value="yes">
<input type="text" class="form-control" placeholder="Username" name="login_name" value="<?php $login_name;?>"  autofocus><br>        
<input type="password" class="form-control" placeholder="Password" name="login_pass" value="" >
<div class="checkbox">
<label><input type="checkbox" name="appsrem" value="remember-me"> Remember me</label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>		
</form>
</div>
</body>
</html>