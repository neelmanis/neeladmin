<?php include_once('header.php'); ?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$code=trim(strtoupper($_POST['code']));
$course=trim(strtoupper($_POST['course']));
$status=trim($_POST['status']);

if(empty($code))
{$signup_error="Please Enter Code";}
elseif(empty($course))
{$signup_error="Please Enter Course Name";}
else{

$sqlx="INSERT INTO `master_course`(`id`, `post_date`, `code`, `course`, `status`) VALUES ('',NOW(),'$code','$course','$status')";
$mysqlresults = $mysqldblink->query($sqlx);
if($mysqlresults)
header('location:course.php');
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Course <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
Code:<input type="text" class="form-control" name="code" value="<?php echo $code; ?>"/>
</div>
<div class="col-md-4">
Course Name:<input type="text" class="form-control" name="course" value="<?php echo $course; ?>"/>
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
<i class="icon-save"></i>&nbsp;Add Course</button>
</form>        
</div>