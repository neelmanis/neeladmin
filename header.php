<?php include_once('common_tools.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">
<title>User Dashboard</title>
<meta name="generator" content="Bootply" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">					
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>			
<script src="js/bootstrap.min.js"></script>		
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
		
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav "> 
		<li><a href="dashboard.php" class=""><i class="glyphicon glyphicon-home"></i></a></li> 
		<?php if ($user_type == 'superadmin'){ ?>	
		<li><a href="admin.php">Admin</a></li>
		<li><a href="course.php">Course</a></li>
		<li><a href="#contact">Subject</a></li>
		<li><a href="students.php">Students</a></li>
		<li><a href="events.php">Events</a></li>
		<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">CMS <b class="caret"></b></a>
			  <ul class="dropdown-menu">
			  <li><a href="country.php">&nbsp;Manage Country</a></li>
			  <li><a href="state.php">&nbsp;Manage State</a></li>
			  <li><a href="city.php">&nbsp;Manage City</a></li>
			  <li><a href="#">&nbsp;Manage Results</a></li>
		      </ul>
        </li>
		<?php }elseif ($user_type == 'admin'){ ?>        
		<li><a href="course.php">Course</a></li>
		<li><a href="#contact">Subject</a></li>
		<li><a href="students.php">Students</a></li>
		<li><a href="events.php">Events</a></li>	
		<?php }else{ ?>	
		<li><a href="course.php">Course</a></li>
		<li><a href="#contact">Subject</a></li>
		<li><a href="students.php">Students</a></li>
		<?php }?>        
		
		<li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['login_name']; ?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>