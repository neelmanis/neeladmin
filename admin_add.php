<?php 
include_once('common_tools.php');
?>

<?php
@$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$u_name=trim($_POST['u_name']);
$u_pass=trim($_POST['u_pass']);
$u_mail=trim($_POST['u_mail']);
$f_name=trim($_POST['f_name']);
$mob=trim($_POST['mob']);
$user_type=trim($_POST['user_type']);
$user_status=trim($_POST['user_status']);

if(empty($u_name))
{$signup_error="Please Enter User Name";}
elseif(empty($u_pass))
{$signup_error="Please Enter Password";}
elseif(empty($u_mail))
{$signup_error="Please Enter Email";}
elseif(empty($f_name))
{$signup_error="Please Enter Full Name";}
elseif(empty($mob))
{ $signup_error="Please Enter 10 digit Mobile No.";}
elseif(is_numeric($mob) == false)
{ $signup_error= "Please Enter Valid Mobile Number";  }
elseif (strlen($mob)>10 || strlen($mob)<10)
{ $signup_error="Mobile Number should be 10 digits.";  }
else{
//$donexx=0;
echo $sqlx="INSERT INTO `app_login_info`(`uid`, `create_on_date`, `login_name`, `login_pass`, `email`, `login_fullname`, `login_contact`,`login_active`, `user_type`) VALUES ('',NOW(),'$u_name','$u_pass','$u_mail','$f_name','$mob','$user_status','$user_type')";
$mysqlresults = $mysqldblink->query($sqlx);

if($mysqlresults){
header('location:admin.php');
?>
<?php
}}}
?>
<?php
include 'header.php';
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Admin User <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
User Name:<input type="text" class="form-control" name="u_name" value="<?php echo $u_name; ?>"/>
</div>
<div class="col-md-4">
Password:<input type="text" class="form-control" name="u_pass" value="<?php echo $u_pass; ?>"/>
</div>
<div class="col-md-4">
Email:<input type="text" class="form-control" name="u_mail" value="<?php echo $u_mail; ?>"/>
</div>
</div>
<div class="row">
<div class="col-md-4">
Full Name:<input type="text" class="form-control" name="f_name" value="<?php echo $f_name; ?>"/>
</div>
<div class="col-md-4">
Mob:<input type="text" class="form-control" name="mob" value="<?php echo $mob; ?>"/>
</div>
<div class="col-md-4">
User Type :<select class="form-control" name="user_type">
<option value="superadmin">Superadmin</option>
<option value="admin">Admin</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-4">
Status :<select class="form-control" name="user_status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveuser" value="Save Details" onclick="save_user(); return false;">
<i class="icon-save"></i>&nbsp;Add User</button>
</form>        
</div>
<?php //} ?>
