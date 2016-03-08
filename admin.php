<?php
include_once('header.php');
//echo "--->".$login_name.$gotuid;
?>
<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='del') && ($getid!=''))
{
	$sqlu="delete from app_login_info where uid='$getid'";
	$del_result = $mysqldblink->query($sqlu);	
	if($del_result)
	{ header('location:admin.php'); } else {  die('Error: ' . mysql_error()); }
}
if (($action=='active') && ($getid!=''))
{	
	$sqly="update app_login_info set login_active='$status' where uid='$getid'";
	$active_result = $mysqldblink->query($sqly);
	if($active_result)
	{ header('location:admin.php'); } else {  die('Error: ' . mysql_error()); }
}

?>

<div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span2">			     
			<a href="admin_add.php" ><i class="glyphicon glyphicon-plus"></i>&nbsp;<strong>Add Admin</strong></a>
			</div>
			<div class="span10">					
<table cellpadding="0" cellspacing="0" border="1" width="80px;" 
class="table table-striped table-hover table-bordered" class="display responsive" id="example">                            
<thead>
<tr>
<th>UID</th><th>Username</th><th>Password</th><th>Email</th><th>Contact</th><th>Role</th><th>Action</th>
</tr>
</thead>
<tbody>								 
<?php
/* include 'fetch.php';
	$json_a=json_decode($json,true);
//print_r( $json_a);
foreach($json_a as $item) {
$id=$item['uid'];
$name=$item['login_name'];
$pass=$item['login_pass'];
$mail=$item['email'];
$contact=$item['login_contact'];
$status=$item['login_active'];
$role=$item['user_type']; */	
								  
$sqlx="SELECT `uid`, `login_name`, `login_pass`, `email`, `login_contact`, `login_active`, `user_type` FROM `app_login_info` WHERE 1";
$mysqlresult = $mysqldblink->query($sqlx);
while($row = $mysqlresult->fetch_array()){
									$id=$row['uid']; 
									$name=$row['login_name'];
									$pass=$row['login_pass'];
									$mail=$row['email'];
									$contact=$row['login_contact'];
									$role=$row['user_type'];
									$status=$row['login_active'];									
									?>
									<tr>
                                    <td><?php echo $id; ?></td> 
                                    <td><?php echo $name; ?></td> 
									<td><?php echo $pass; ?></td> 
									<td><?php echo $mail; ?></td> 
									<td><?php echo $contact; ?></td> 
									<td><?php echo  $role;?></td> 
                                    <td width="300">
<a href="#delete_course<?php echo $id; ?>" class="btn btn-primary"><i class="icon-trash icon-large">View</i></a>
<a href="#delete_course<?php echo $id; ?>" class="btn btn-info"><i class="icon-trash icon-large">EDIT</i></a>
							   							   
<?php if($status == 1) { ?> <a href="admin.php?id=<?php echo $id; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="admin.php?id=<?php echo $id; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
								 
<a href="admin.php?action=del&id=<?php echo $id; ?>" onClick="return(window.confirm('Are you sure you want to delete?'));" class="btn btn-danger"><i class="icon-trash icon-large">Delete</i></a>		
</td>							
</tr>
<?php } ?>                           
</tbody>
</table>
</div>		
</div>
</div>
</div>
<?php include 'footer.php'; ?>