<?php 
include 'header.php'; 
?>

<script language="javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}		 	
		return xmlhttp;
	}
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;	
						//alert(document.getElementById('citydiv').innerHTML);					
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}				
	}
</script>

<?php
@$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$state=trim(strtoupper($_POST['state_id']));
$city=trim($_POST['city']);
$status=trim($_POST['status']);

if(empty($state) && $state==0)
{$signup_error= "Please Choose State";}
elseif(empty($city))
{$signup_error="Please Enter City";}
else{
$sqlx="INSERT INTO `d_master_city`(`id`, `post_date`, `state_id`, `city`, `status`) VALUES ('',NOW(),'$state','$city','$status')"; 
$mysqlresults = $mysqldblink->query($sqlx);
if($mysqlresults)
{
header('location:d_city.php');
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
<div class="col-md-4">Country:
<select class="form-control" name="country" onChange="getCity('getstate.php?country='+this.value)">
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

<div class="col-md-4">State:
<div id="citydiv">
<select class="form-control" name="state" name="state">
<option>Select State</option>
</select>
</div>
</div>

<div class="col-md-4">
City:<input type="text" class="form-control" name="city" value="<?php echo $city; ?>"/>
</div>
</div>
<div class="row">
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