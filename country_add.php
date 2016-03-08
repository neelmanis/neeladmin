<?php 
include_once('common_tools.php');
?>

<?php
@$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$country=trim(strtoupper($_POST['country']));
$status=trim($_POST['status']);

if(empty($country))
{$signup_error="Please Enter Country";}
else{
$sqlx="INSERT INTO `master_country`(`id`, `post_date`, `country`, `status`) VALUES ('',NOW(),'$country','$status')";
$mysqlresults = $mysqldblink->query($sqlx);
if($mysqlresults)
{
header('location:country.php');
}else {  die('Error: ' . mysql_error()); }
?>
<?php
}}
?>
<?php include 'header.php'; ?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Country <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
Country:<input type="text" class="form-control" name="country" value="<?php echo $country; ?>"/>
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
<i class="icon-save"></i>&nbsp;Add Country</button>
</form>        
</div>