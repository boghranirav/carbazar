<?php
include("form_master.php");
?>
<title>
Road Side Assistance Number
</title>
<?php
include("form_master1.php");
?>
<?php

if(isset($_POST['submit']))
{
	$bid=$_POST['b_id'];
	$numb=$_POST['rnum'];
	
include("connection.php");
$sql=mysql_query("insert into road_side_assistance(brand_id,assist_number) values($bid,'$numb')");
if($sql){
	header("location:view_road_side_assistance.php");
}
else
{
	$errmsg="Data Not Added.";
}
	}

?>
                    <h1 class="page-header">Road Side Assistance Numbers</h1>
										<br>
					<form method="post" action="road_side_assistance.php">
					<table width="50%">
					<tr>
						<td> 
									<label>Select Brand </label>
									
						</td>
                        <td>
									
									
								
									<div class="col-lg-9">
                                                <select name="b_id"  class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													
                                                </select>
                                            </div>
									
						</td>
						<td>&nbsp;&nbsp;
							
						</td>
					</tr>
					<tr>
						<td> 
									<label>Number  </label>
						</td>
                        <td>
									<div class="col-lg-9">
									<input class="form-control" placeholder="Enter Road Side Assistance Number" name="rnum" size="25">
									</div>
						</td>
						<td><br>&nbsp;&nbsp;
					
						</td>
					</tr>
					
					
					<tr>
					<td></td>
						<td>
						<br>			
						&nbsp;&nbsp;&nbsp;
									<input type="submit" class="btn btn-primary" name="submit" value="Add Number">
					&nbsp;&nbsp;
									<a href="view_road_side_assistance.php" class="btn btn-primary">View List Of Numbers</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg."</label>";
						}
						?>
					</form>
					
               <?php
include("form_master2.php");
?>