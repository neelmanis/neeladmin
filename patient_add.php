<?php
include_once('dbconfig.php');
error_reporting(E_ALL ^ E_NOTICE);
$getuid=$_REQUEST['gotuid'];
?>
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<?php /*
if(isset($_POST['savesip']))
{
$login_name=$_POST['login_name'];
if(empty($login_name))
{
$error_code="Please Enter Login Name.";
}
else{
$sqlxy = "SELECT login_name FROM app_login_info  WHERE login_name =$login_name";
//print $sqlxy;
$mysqlresultx = $mysqldblink->query($sqlxy);
if(mysqli_num_rows($mysqlresultx) >= 1){
 echo $login_name."Login Name already exist \n";
 //$error_code="Login Name already exist";
}
else
{
$error_code="Already Exist login name.";
}}}

 */
?> 
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
//$signup_error = ""; //Initialize errors
$user_full_name=trim($_POST['user_full_name']);
$user_name=trim($_POST['user_name']);
$user_mobile=trim($_POST['user_mobile']);
$user_email=trim($_POST['user_email']);
$user_pass=trim($_POST['user_pass']);
$gender=trim($_POST['gender']);
$user_reg_active=trim($_POST['user_reg_active']);

if(empty($user_full_name))
{$signup_error="Please Enter Patient Name";}
elseif(!preg_match('/^[a-z\d_ ]{3,12}$/i', $user_full_name)) 
{$signup_error= 'Patient Name is not valid';}

elseif(empty($user_name))
{ $signup_error="Please Enter User Name";}
elseif(empty($user_mobile))
{ $signup_error="Please Enter 10 digit Mobile No.";}
elseif(is_numeric($user_mobile) == false)
{ $signup_error= "Please Enter Valid Mobile Number";  }
elseif (strlen($user_mobile)>10 || strlen($user_mobile)<10)
{ $signup_error="Mobile Number should be 10 digits.";  }

elseif(empty($user_email))
{ $signup_error="Please Enter valid Email"; }
else{
$donexx=0;
$sqlx="INSERT INTO `patient_info` (`uid`, `create_on_date`, `user_full_name`, `user_name`, `user_password`, 
`user_mobile`, `user_email`, `user_gender`,  `user_reg_active`, `user_activaton_datetime`) VALUES (NULL, NOW(), '$user_full_name',
 '$user_name', '$user_pass','$user_mobile', '$user_email', '$gender', '$user_reg_active', NOW())";
 $mysqlresults = $mysqldblink->query($sqlx);
 //print $sqlx;
if($mysqlresults){
$donexx=1;
?>
<br/><div class="alert alert-success"><strong>Success!</strong>New Patient Added Successfully.</div>
<?php
}}}
if($donexx==0)
{
?>
<body>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Patient <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
Patient Full Name:<input type="text" class="form-control" name="user_full_name" value="<?php echo $user_full_name;?>"/></div>
<div class="col-md-4">
User Name:<input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>" /></div>
<div class="col-md-4">
Mobile:<input type="number" class="form-control" name="user_mobile" value="<?php echo $user_mobile;?>" /></div>
</div>
<div class="row">
<div class="col-md-4">
Email:<input type="text"  class="form-control" name="user_email" value="<?php echo $user_email;?>" /></div>
<div class="col-md-4">
Password:<input type="text"  class="form-control" name="user_pass" value="<?php echo $user_pass;?>" /></div>
<div class="col-md-4">Gender :<select class="form-control" name="gender">
<option value="male" <?php echo $male;?> >Male</option>
<option value="female"  <?php echo $female;?> >Female</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-4">Status :<select class="form-control" name="user_reg_active">
<option value="1" <?php echo $active;?> >Active</option>
<option value="0"  <?php echo $inactive;?> >Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success icon-save" name="savesip" value="Save Details" onclick="save_sip_user(); return false;"><i class="glyphicon glyphicon-plus"></i>Add Patient</button>
</form>        
</div>
<?php } ?>
</body>
</html>