<?php
	if(!isset($_GET['cid']) || ($_GET['cid']==null))
	{
		header("location:car_model_view.php");
	}
include("form_master.php");
?>
<title>
Add Model
</title>
<?php
include("form_master1.php");
?>
<?php
$id=$_GET['cid'];

include("connection.php");

$olddata=mysql_query("select *from car_model where car_id='$id'");
if(mysql_num_rows($olddata)<=0){
		header("location:car_model_view.php");
}

while($row=mysql_fetch_array($olddata))
{

$ocn=$row['car_name'];    
$ost=$row['status'];  
$obd=$row['body_type'];  
}											
	




if(isset($_POST['submit']))
{
	
	$cname=$_POST['cname'];
	$status=$_POST['optionsRadiosInline'];
	$btype=$_POST['body_type'];
	$errmsg="";
	if($cname==""){
		$errmsg="*Enter Valid Name.";
	}
	else
	{
include("connection.php");

$sql=mysql_query("update car_model set car_name='$cname',status='$status',body_type='$btype' where car_id='$id'");
if($sql){

header("location:car_model_view.php");
}
else
{
	$errmsg="Data Not Edited.";
}
	}
}
?>
                    <h1 class="page-header">Model Form</h1>
										<br>
					<form method="post" action="#">
					<table>
					
					<tr>
						<td> 
									<label>Car Name  </label>
						</td>
                        <td>
									
									<input class="form-control" placeholder="Enter Car Name" name="cname" size="25" value="<?php echo $ocn; ?>">
									
						</td>
						<td><br>&nbsp;&nbsp;
							<font color="red">
								<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg."</label>";
						}
						?>
							</font>
						</td>
					</tr>
					<tr>
						<td> 
									<label>Status  </label>
						</td>
                        <td>
									<br>
									<div class="form-group">
                                                
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="launched" <?php if($ost=="launched") echo "checked"; ?> />
												<label>Launched</label>
                                         
											<br>
                                       
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="upcoming" <?php if($ost=="upcoming") echo "checked"; ?>/>
												<label>Upcoming</label>
                                         
                                           
                                        </div>	
									
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					<tr>
						<td> 
									<label>Body Type  </label>
						</td>
                        <td>
									
								<div class="col-lg-15">
                                                <select name="body_type"  class="validate[required] form-control">
												    
                                                    <option value="0">Choose a Body Type</option>
                                                    <option value="hatchback" <?php if($obd=="hatchback") echo "selected=selected";?>>Hatchback</option>
													<option value="sedan" <?php if($obd=="sedan") echo "selected=selected";?>>Sedan</option>
													<option value="suv" <?php if($obd=="suv") echo "selected=selected";?>>SUV</option>
													<option value="van" <?php if($obd=="van") echo "selected=selected";?>>Van</option>
													<option value="muv" <?php if($obd=="muv") echo "selected=selected";?>>MUV</option>
													<option value="luxury" <?php if($obd=="luxury") echo "selected=selected";?>>Luxury</option>												
													<option value="coupe" <?php if($obd=="coupe") echo "selected=selected";?>>Coupe</option>
													<option value="hybrid" <?php if($obd=="hybrid") echo "selected=selected";?>>Hybrid</option>
													<option value="convertible" <?php if($obd=="convertible") echo "selected=selected";?>>Convertible</option>
																									
                                                </select>
                                            </div>
									
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					<tr>
					<td></td>
						<td>
						<br>			
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Car">
					&nbsp;&nbsp;&nbsp;
									<a href="car_model_view.php" class="btn btn-primary">Cancel</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					</form>
					
               <?php
include("form_master2.php");
?>