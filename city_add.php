<?php 
include_once('common_tools.php');
include 'header.php'; 
?>

<?php
@$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$state=trim(strtoupper($_POST['state']));
$city=trim($_POST['city']);
$status=trim($_POST['status']);

if(empty($state) && $state==0)
{$signup_error= "Please Choose State";}
elseif(empty($city))
{$signup_error="Please Enter City";}
else{
$sqlx="INSERT INTO `master_city`(`id`, `post_date`, `state_id`, `city`, `status`) VALUES ('',NOW(),'$state','$city','$status')"; 
$mysqlresults = $mysqldblink->query($sqlx);
if($mysqlresults)
{
header('location:city.php');
}else {  die('Error: ' . mysql_error()); }
?>
<?php
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add City <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">State:
<select class="form-control" name="state">
<option value=""> Choose State </option>
<?php
$sqlx="SELECT `id`, `state` FROM `master_state` WHERE `status`='1' ORDER BY state ASC";
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
<?php include('footer.php') ?>