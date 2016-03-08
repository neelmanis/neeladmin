<?php
include_once('header.php');
//echo "--->".$login_name.$gotuid;
?>
<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

function getStateName($getid)
{
	global $mysqldblink;
    $sqlz = "SELECT  state FROM  master_state where id='$getid'";
	$mysqlresults = $mysqldblink->query($sqlz);
	$results = $mysqlresults->fetch_array();
    $state=$results['state'];
	return 	$state;				
}

if (($action=='del') && ($getid!=''))
{
	$sqlu="delete from master_city where id='$getid'";
	$del_result = $mysqldblink->query($sqlu);	
	if($del_result)
	{ header('location:city.php'); } else {  die('Error: ' . mysql_error()); }
}
if (($action=='active') && ($getid!=''))
{	
	$sqly="UPDATE `master_city` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
	$active_result = $mysqldblink->query($sqly);
	if($active_result)
	{ header('location:city.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span2">			     
<a href="city_add.php" ><i class="glyphicon glyphicon-plus"></i>&nbsp;<strong>Add City</strong></a>	</div>
<div class="span10">					
<table cellpadding="0" cellspacing="0" border="1" width="80px;" class="table table-striped table-hover table-bordered" class="display responsive" id="example">                            
<thead>
<tr>
<th>UID</th><th>State</th><th>City</th><th>Action</th>
</tr>
</thead>
<tbody>								 
<?php
$sqlx="select * from master_city";
$mysqlresult = $mysqldblink->query($sqlx);
while($row = $mysqlresult->fetch_array()){
$id=$row['id'];
$city=$row['city'];
$state_id=getStateName($row['state_id']);
$status=$row['status'];
?>
<tr>
<td><?php echo $id; ?></td> 
<td><?php echo $state_id; ?></td>
<td><?php echo $city; ?></td> 
								
<td width="300">
<a title="Edit" href="city_edit.php?uid=<?php echo $id; ?>" class="btn btn-info">EDIT</a>

<?php if($status == 1) { ?> <a href="city.php?id=<?php echo $id; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="city.php?id=<?php echo $id; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
								 
<a href="city.php?action=del&id=<?php echo $id; ?>" onClick="return(window.confirm('Are you sure you want to delete?'));" class="btn btn-danger"><i class="icon-trash icon-large">Delete</i></a>		
</td>							
</tr>
<?php } ?>                           
</tbody>
</table>
</div>		
</div>
</div>
</div>
</body>
</html>