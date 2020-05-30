<?php
include("connection.php");

if(isset($_POST['b_id'])){
	echo "<select name='m_id' id='m_id' class='validate[required] form-control'>";
												    
                                                    echo "<option value='0'>--Select a Model--</option>";
													include("connection.php");
													$sql="select * from car_model where status='launched' and brand_id=".$_POST['b_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$mid=$row['car_id'];
														$car_name=$row['car_name'];
													echo "<option value=$mid>".$car_name."</option>";
													}
	echo "</select>";
}

if(isset($_POST['m_id'])){
	echo "<table id='dis_version' class='table table-striped table-bordered table-hover'>";
					echo "<tr id='head' >";
					echo "<th width='10%'>Version Id</th>";
					echo "<th width='25%'>Version Name</th>";
					echo "<th  width='10%'>Fuel Type</th>";
					echo "<th  width='10%'>Price</th>";
					echo "<th  width='10%'>Engine</th>";
					echo "<th width='10%'>Mileage</th>";
					echo "<th width='10%'>Transmission</th>";
					echo "<th width='8%'>Edit</th>";
					echo "<th width='8%'>Delete</th>";
					echo "</tr>";
						
	include("connection.php");
								$sql="select * from car_version where car_id=".$_POST['m_id'];
								$sql1=mysql_query($sql);
								while($row=mysql_fetch_array($sql1)){
									echo "<tr>";
									echo "<td>".$row['v_id']."</td>";
									echo "<td>".$row['version_name']."</td>";
									echo "<td>".$row['f_type']."</td>";
									echo "<td>".$row['price']."</td>";
									echo "<td>".$row['engine']."</td>";
									echo "<td>".$row['mileage']."</td>";
									echo "<td>".$row['transmission']."</td>";
									$v=$row['v_id'];
									echo "<td align='center'><a href='carversion_edit.php?vid=$v'><img src='upload_car/images.jpg' alt='Edit' width='25px'></a></td>";
									echo "<td align='center'><a href='carversion_delete.php?vid=$v'><img src='upload_car/delete_edit.png' alt='Delete' width='25px'></a></td>";
									echo "</tr>";
								}
								
								echo "</table>";
}
?>