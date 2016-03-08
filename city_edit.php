<?php 
include_once('common_tools.php');
$getuid=$_REQUEST['uid'];
?>

<?php
$sqlxz="SELECT `id`, `state_id`, `city`,`status` FROM `master_city` WHERE `id`= $getuid";
$mysqlresult = $mysqldblink->query($sqlxz);
$mysqlrow = $mysqlresult->fetch_array();
// print_r($mysqlrow);
$id=$mysqlrow['id'];
$state=$mysqlrow['state_id'];
$city=$mysqlrow['city'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$state=trim($_POST['state']);
$city=trim($_POST['city']);
$status=trim($_POST['status']);

$sqlx="UPDATE `master_city` SET `state_id`='$state',`city`='$city',`modified_date`=NOW(),`status`='$status' WHERE `id` ='$getuid'";
$mysqlresult = $mysqldblink->query($sqlx);
if($mysqlresult){
header('location:city.php');
}else {  die('Error: ' . mysql_error()); }
}
?>

<?php
include 'header.php';
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update City <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">State:
<select class="form-control" name="state">
<option value=""> Choose State </option>
<?php
$sqlx="SELECT `id`, `state`, `status` FROM `master_state` WHERE `status`='1' ORDER BY state ASC";
$mysqlresult = $mysqldblink->query($sqlx);
while($mysqlrow = $mysqlresult->fetch_array())
{
$getid=$mysqlrow['id'];
$getState=$mysqlrow['state'];
if($getid==$state)
{
echo "<option selected='selected' value='$getid'>$getState</option>";
}	else	{
echo "<option value='".$getid ."'>$getState</option>";
}}
?>
</select>

</div>
<div class="col-md-4">
City:<input type="text" class="form-control" name="city" value="<?php echo $city; ?>"/>
</div>
<div class="col-md-4">
Status :<select class="form-control" name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savecourse" value="Save Details" onclick="save_course(); return false;">
<i class="icon-save"></i>&nbsp;Add City</button>
</form>        
</div>