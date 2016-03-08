<?php 
include_once('common_tools.php');
$countryid=$_GET['country'];
?>

<div class="container">
<div class="row">
<div class="col-md-4">
<select name="state_id" class="form-control">
<option value="">Select  State </option>
<?php
$sqlx="SELECT * FROM  master_state where country_id='$countryid' order by state asc";
$mysqlresult = $mysqldblink->query($sqlx);
while($mysqlrow = $mysqlresult->fetch_array()){ ?>
<option value="<?php echo $mysqlrow['id'];?>" <?php if($mysqlrow['id']==$state_id) { echo 'selected'; } ?>><?php echo $mysqlrow['state'];?></option>
<?php } ?>
</select>
</div></div>
</div>