<?php 
include_once('common_tools.php');
?>

<?php
@$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$country=trim($_POST['country']);
$state=trim(strtoupper($_POST['state']));
$status=trim($_POST['status']);

if(empty($country) && $country==0)
{$signup_error= "Please Choose Country";}
elseif(empty($state))
{$signup_error="Please Enter State";}
else{
$sqlx="INSERT INTO `master_state`(`id`, `post_date`, `country_id`, `state`, `status`) VALUES ('',NOW(),'$country','$state','$status')"; 
$mysqlresults = $mysqldblink->query($sqlx);
if($mysqlresults)
{
header('location:state.php');
}else {  die('Error: ' . mysql_error()); }
?>
<?php
}}
?>
<?php include 'header.php'; ?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add State <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">Country:
<select class="form-control" name="country">
<option value=""> Choose Country </option>
<?php
$sqlx="SELECT `id`, `country` FROM `master_country` WHERE `status`='1' ORDER BY country ASC";
$mysqlresult = $mysqldblink->query($sqlx);
while($mysqlrow = $mysqlresult->fetch_array())
{
$getid=$mysqlrow['id'];
$getCountry=$mysqlrow['country'];
if($getid==$country)
{
echo "<option selected='selected' value='$getid'>$getCountry</option>";
}	else	{
echo "<option value='".$getid ."'>$getCountry</option>";
}}
?>
</select>

</div>
<div class="col-md-4">
State:<input type="text" class="form-control" name="state" value="<?php echo $state; ?>"/>
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
<i class="icon-save"></i>&nbsp;Add State</button>
</form>        
</div>