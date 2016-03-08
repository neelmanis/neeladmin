<?php include 'dbconfig.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">
<title>User Dashboard</title>
<meta name="generator" content="Bootply" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>

<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css" rel="stylesheet">

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head> 
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">                            
<thead>
<tr>
<th>UID</th><th>Username</th><th>Password</th><th>Email</th><th>Contact</th><th>Role</th><th>Action</th></tr>
</thead>
<tbody>
<?php
								  $sqlx="select * from app_login_info";
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