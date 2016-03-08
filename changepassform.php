<?
$submoduleid=0;
include_once('common_tools.php');

if($userlogin==1){html_header_to_show();}
$accessokformodule=1;
if($userlogin==1 && $accessokformodule==1)
{
//echo $userloginname;

//$mysqlx="SELECT `uid`, `login_pass` FROM `app_login_info` where `login_name` = ".$userloginname;
//$mysqlx="SELECT `uid`, `login_pass`  FROM `app_login_info` WHERE `login_name` LIKE 'deepen.dhulla'";  
$mysqlx="SELECT uid  FROM app_login_info  WHERE login_name =$userloginname";
//print $mysqlx;
$mysqlresult = $mysqldblink->query($mysqlx);
while($mysqlrow = $mysqlresult->fetch_assoc()){

print_r($mysqlrow);
}
//while($mysqlrow = $mysqlresult->fetch_array()){
//print_r($mysqlrow);
//$gotuidx=$mysqlrow['uid'];
//}
?>


<div class="container">
<h4 class="page-header">Change Password for <?=$userloginname?></h4>
<form action=""  method="post" name="mypass" id="mypass">
<input type="hidden" name="savefun" value="savedetails">

<div class="row">
<div class="col-md-4">
Old Password : <input type="password" class="form-control" name="oldpass">
</div>
<div class="col-md-4">
New Password : <input type="password" class="form-control" name="newpass">
</div>
<div class="col-md-4">
Confirm Password : <input type="password" class="form-control" name="confpass">
</div>
</div><br/>
<button type="button" name="saveusers" value="Change Password" class="btn btn-default" onclick="document.myform.submit();return false;"><span>Change password</span></button>
</form>

</div>

<?
}
html_footer_to_show();
?>
