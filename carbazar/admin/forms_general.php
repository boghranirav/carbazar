<?php
include("form_master.php");
?>
<title>
Add Brand
</title>

<script type="text/javascript" src="js/jquery-1.10.2.js">
</script>
<script type="text/javascript" src="js/validate.js"></script>


<script>
		
	$("document").ready(function(){
	//$("#required").hide();
		$("#submit").click(function(){
			var fname;
			//var fname1=getElementById("#fname").value;
			fname = test_name("#c_model","#msgfname");
			
			
			if(fname == true)
			{
				return true;
				
			}
			else
			{
				return false;
			}
			
		});
	
	});
</script>



<?php
include("form_master1.php");
?>
<?php

if(isset($_POST['submit'])){
	
	$model=$_POST['c_model'];
if($model!=""){
include("connection.php");
$sql=mysql_query("insert into car_make(car_company) values('$model')");
if($sql){
	$add='Data Added';
	header("location:brand_view.php");
}
else
{
	$add='Data Not Added';	
}
}
else
{
	$add='Invalid Input';
}
}
?>

                    <h1 class="page-header">Brand Form</h1>
					<br>
					<form method="post" action="forms_general.php">
					<table>
					<tr>
						<td> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
						</td>
                        <td>
									<label>Enter Brand Name :</label>
									<input class="form-control" placeholder="Enter Model Name Here" name="c_model" id="c_model" size="25">
									
						</td>
						
						<td><span id="msgfname"></span></td>
						<td><br>&nbsp;&nbsp;
						<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$add."</label>";
						}
						?>
						</td>
					</tr>
					<tr>
					<td></td>
						<td>
						<br>			
									<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add Brand">
					&nbsp;&nbsp;&nbsp;
									<a href="brand_view.php" class="btn btn-primary">View Brand List</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					</form>
					
                
<?php
include("form_master2.php");
?>