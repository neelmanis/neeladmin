<?php 
include_once('common_tools.php');
$getuid=$_REQUEST['uid'];
?>

<?php
$sqlxz="SELECT `id`, `country_id`, `state`, `status` FROM `master_state` WHERE `id`= $getuid";
$mysqlresult = $mysqldblink->query($sqlxz);
$mysqlrow = $mysqlresult->fetch_array();
// print_r($mysqlrow);
$id=$mysqlrow['id'];
$country=$mysqlrow['country_id'];
$state=$mysqlrow['state'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$country=trim($_POST['country']);
$state=trim(strtoupper($_POST['state']));
$status=trim($_POST['status']);

$sqlx="UPDATE `master_state` SET `modified_date`=NOW(),`country_id`='$country',`state`='$state',`status`='$status' WHERE `id` ='$getuid'";
$mysqlresult = $mysqldblink->query($sqlx);
if($mysqlresult){
header('location:state.php');
}else {  die('Error: ' . mysql_error()); }
}
?>

<?php
include 'header.php';
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Country <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
Country:
<select class="form-control" name="country">
<option value=""> Choose Country </option>
<?php
$sqlx="SELECT `id`, `country` FROM `master_country` WHERE `status`='1'";
$mysqlresult = $mysqldblink->query($sqlx);
while($mysqlrow = $mysqlresult->fetch_array())
{
$getid=$mysqlrow['id'];
$getCountry=$mysqlrow['country'];
if($getid==$country)
{
echo "<option selected='selected' value='$id'>$getCountry</option>";
}	else	{
echo "<option value='".$getid ."'>$getCountry</option>";
}}
?>

</select>
<!--<option value="<?php echo $mysqlrow['id'];?>"<?php if($mysqlrow['id']==$sub_id){?> selected="selected"<?php }?>><?php echo $mysqlrow['subject'];?></option>-->
</div>
<div class="col-md-4">
State:<input type="text" class="form-control" name="state" value="<?php echo $state; ?>"/>
</div>
<div class="col-md-4">
Status :<select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savecountry" value="Save Details" onclick="save_country(); return false;">
<i class="icon-save"></i>&nbsp;Save</button>
</form>        
</div>
<?php include('footer.php') ?>