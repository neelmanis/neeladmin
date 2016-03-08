<?php 
include_once('header.php');
$getuid=$_REQUEST['uid'];
?>

<?php
$sqlxz="SELECT code,course,status FROM `master_course` Where `id`= $getuid";
$mysqlresult = $mysqldblink->query($sqlxz);
$mysqlrow = $mysqlresult->fetch_array();
 //print_r($mysqlrow);
$code=$mysqlrow['code'];
$course=$mysqlrow['course'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$code=trim(strtoupper($_POST['code']));
$course=trim(strtoupper($_POST['course']));
$status=trim($_POST['status']);

$sqlx="UPDATE `master_course` SET `modified_date`=NOW(),`code`='$code',`course`='$course',`status`='$status' WHERE `id` ='$getuid' " ;
$mysqlresult = $mysqldblink->query($sqlx);
if($mysqlresult)
header('location:course.php');
}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Course <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
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
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="savecourse" value="Save Details" onclick="save_course(); return false;">
<i class="icon-save"></i>&nbsp;Save</button>
</form>        
</div>
<?php include('footer.php') ?>