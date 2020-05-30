<?php
include("connection.php");

if(isset($_POST['b_id'])){
	echo "<select name='m_id' id='m_id' class='validate[required] form-control'>";
												    
                                                    echo "<option value='0'>Choose a Model</option>";
													include("connection.php");
													$sql="select * from car_model where status='launched' and brand_id=".$_POST['b_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$mid=$row['car_id'];
														$car_name=$row['car_name'];
													echo "<option value=$mid>".$car_name."</option>";
													}
													$sql="select * from car_model where status='upcoming' and brand_id=".$_POST['b_id'];
													$sql1=mysql_query($sql);
													if(mysql_num_rows($sql1)){
															echo "<option disabled>--Upcoming Cars--</option>";
												
													while($row=mysql_fetch_array($sql1)){
														$mid=$row['car_id'];
														$car_name=$row['car_name'];
													echo "<option value=$mid>".$car_name."</option>";
													}
													}
	echo "</select>";
}

if(isset($_POST['m_id'])){
	echo "<center>";
	echo "<table id='dis_version'  border='0%'>";
					
	include("connection.php");
								$sql="select * from photos where car_id=".$_POST['m_id'];
								
								$sql1=mysql_query($sql);
								while($row=mysql_fetch_array($sql1)){
									
									$id=$row['photo_id'];
									$pho=$row['name'];
									echo "<td><div class='image'><img src='upload_car/image/".$pho."' width='150' height='150'><a href='photo_delete.php?pid=$id'><div>Delete</div></a></div></td>";
										
									
								}
								
								echo "</table>";
		echo "</center>";
}
?>