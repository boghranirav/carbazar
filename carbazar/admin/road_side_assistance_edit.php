<?php
$id=$_GET['cid'];
include("connection.php");
$sql="SELECT * FROM road_side_assistance r, car_make cm  where r.brand_id=cm.brand_id and  r.assisi_id=".$id; 
 $result = mysql_query($sql);
 $row = mysql_fetch_array($result);
			$car_com=$row['car_company'];
			$ass_no=$row['assist_number'];
include("master.php");
?>
<title>
Road Side Assistance Number
</title>
<?php
include("master1.php");
?>
<?php

if(isset($_POST['submit']))
{
	$bid=$_POST['b_id'];
	$numb=$_POST['rnum'];
	
include("connection.php");
$sql=mysql_query("update road_side_assistance set brand_id = $bid , assist_number='$numb' where assisi_id=".$id);

if($sql){
	header("location:view_road_side_assistance.php");
}
else
{
	$errmsg="Data Not Updated.";
}
	}

?>
                    <h1 class="page-header">Road Side Assistance Numbers</h1>
										<br>
					<form method="post" action="#">
					<table width="50%">
					<tr>
						<td> 
									<label>Select Brand </label>
									
						</td>
                        <td>
									
									
								
									<div class="col-lg-9">
                                                <select name="b_id"  class="validate[required] form-control">
												    
                                                    <option value="0">Choose a Brand</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com1=$row['car_company'];
														?>
												
												<option value="<?php echo $bid; ?>" <?php if($car_com==$car_com1) echo "selected=selected"; ?>><?php echo $car_com1;?></option>;
												
											<?php
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
									<input class="form-control" name="rnum" size="25" value="<?php echo $ass_no;?>">
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
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Number">
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
include("master2.php");
?>