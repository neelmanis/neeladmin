<?php
include_once('header.php');
?>

<?php
 $login_name=$_SESSION['login_name'];
 $date=date("F j, Y");
//echo "--->".$login_name.$gotuid;
?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
								<label><h4>FILTER by:</h4></label>
									<form  method = "POST" class="form-inline" action="sort_students.php">
									Course <select name="course" required>
									<option>Choose Course</option>
									<?php
									$sqly = "select * from course";
									$mysqlresult = $mysqldblink->query($sqly);
									while($row=$mysqlresult->fetch_array()){
									?>
									<option><?php echo $row['code']; ?></option>
									<?php  } ?>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;
									Year Level
									<select name="year_level" required>
									<option>Choose Year</option>
									<option>First Year</option>
									<option>Second Year</option>
									<option>Third Year</option>
									<option>Fourth Year</option>
									</select>
								
									<button type="submit" name="sort_students" class="btn"><i class="icon-check icon-large"></i>&nbsp;Submit</button>
								</form>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                             
								<p><a href="add_student.php" class="btn btn-success"><i class="icon-plus"></i>&nbsp;Add Student</a></p>
							
                                <thead>
                                    <tr>
                                        <th>Roll No</th>                   
                                        <th>Name</th>                                 
                                        <th>Course</th> 			
                                       <!-- <th>Photo</th>-->                                 
                                        <th>Year Level</th>                                 
                                        <th>Term</th>                                 
                                        <th>Student Status</th>                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>										
								 
                                  <?php  $sqlx="select * from students";
								  $mysqlresult = $mysqldblink->query($sqlx);
									while($row=$mysqlresult->fetch_array()){
									$id=$row['student_id'];  ?>
									<tr class="del<?php echo $id ?>">
									<td><?php echo $row['roll_no']; ?></td>                              
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>								
                                    <td width="80"><?php echo $row['course']; ?> </td> 
                                   <!-- <td width="60"><img src="<?php echo $row['photo']; ?>" width="60" height="60" class="img-circle"></td>--> 
									 <td width="80"><?php echo $row['year_level']; ?></td> 
									 <td width="80"><?php echo $row['term']; ?></td> 
									 <td width="80"><?php echo $row['student_status']; ?></td> 									
                                    <td width="150">
                                        
                                    </td>
									
                                    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
			</div>		
			</div>
		</div>
    </div>
	</body>