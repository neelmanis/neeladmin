<?php
session_start();
include_once('common_tools.php');
$gotuid=$_SESSION['uid'];
//echo $gotuid;
?>
<?php
$mysql="SELECT `uid`,`login_name`,`login_fullname`, `login_contact`,`profile_img` FROM `app_login_info` WHERE `uid` = ".$gotuid;
$mysqlresult = $mysqldblink->query($mysql);
while($mysqlrow = $mysqlresult->fetch_array()){
//print_r($mysqlrow);
$login_fullname=$mysqlrow['login_fullname'];
$login_name=$mysqlrow['login_name'];
$login_contact=$mysqlrow['login_contact'];
$mylogo=$mysqlrow['profile_img'];
}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='save_profile')
{
$login_fullname=$_POST['login_fullname'];
$login_name=$_POST['login_name'];
$login_contact=$_POST['login_contact'];

if (!empty($_FILES["uploadedimage"]["name"])) {
  $stype = $_FILES["uploadedimage"]["type"];
  $pname = $_FILES["uploadedimage"]["name"];
  $tname = $_FILES["uploadedimage"]["tmp_name"];
  $fsize = $_FILES["uploadedimage"]["size"];

$uploads_dir = "profile_img/".rand().$pname;

if(move_uploaded_file($tname, $uploads_dir)){

$sqly="UPDATE `app_login_info` SET `login_fullname`='$login_fullname',`login_name`='$login_name',`login_contact`='$login_contact',`profile_img` = '$uploads_dir' WHERE `uid` =' ".$gotuid."' " ;
$mysqlresult=$mysqldblink->query($sqly);
if($mysqlresult){
	header("Location:profile.php");
	exit;
   $success="<div class='alert alert-success'> Your User Details Updated Successfully. </div>";
	} else{ 
	$failure="<div class='alert alert-danger'>User Already Exist.</div>";
}
}
}
}
         
////////////// Logo End here //////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>User Dashboard</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	       
 </head> 
 <body>
        
        <!-- Header -->
<?php include 'navbar.php';?>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-user"></i> Profile </h3>
      <hr>      
        <div>
		<?php if (isset($mylogo) && !empty($mylogo)) {?>
		<img src="<?php echo $mylogo; ?>" align="center" height=100 width=100>
		<?php } else {?>
		<img src="profile_img/default.png" align="center" height=100 width=100>	
		<?php
		}
		?>
		</div>
	  
  	</div><!-- /span-3 -->
    <div class="col-sm-9">      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard 
	<i>   <?php
        $Today = date('d:m:y');
        $new = date('l, F d, Y', strtotime($Today));
        echo $new; ?></i>
		</h3>              
       <hr>      
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			
			<div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-wrench pull-right"></i><h4>Profile</h4><?php echo $success;?><?php echo $failure;?></div>
            <div class="panel-body">   
			
            <form class="form form-vertical" method="POST" action="" enctype="multipart/form-data">
            <div class="control-group">
			<input type="hidden" name="savedetails" value="save_profile">
            <label>Name</label>
            <div class="controls">
            <input type="text" class="form-control" name="login_fullname" value="<?php echo $login_fullname; ?>">
            </div>
			<label>User Name</label>
            <div class="controls">
            <input type="text" class="form-control" name="login_name" value="<?php echo $login_name; ?>">
            </div>
			<label>Mobile</label>
            <div class="controls">
            <input type="text" class="form-control" name="login_contact" value="<?php echo $login_contact; ?>">
            </div>
			<label>Change Profile Picture</label>
            <div class="controls">
            <input type="file" name="uploadedimage" id="uploadedimage">	
            </div>					
			<div class="control-group">
              <label></label>
            <div class="controls">
			<button type="submit" name="saveusers" value="Save Details" class="btn btn-primary">Update</button>
            </div>
            </div>               
          </form>
            </div> 
            </div><!--/spanel-body-->
            </div><!--/panel--> 
			  
              <hr>              
             	</div><!--/col-->
         
       </div><!--/row-->
	   
  	</div><!--/col-span-9-->    
  </div><!--/row-->
  <!-- /upper section -->  
  <!-- lower section -->
 </body>
</html>