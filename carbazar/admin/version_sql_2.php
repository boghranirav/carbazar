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
	echo "<select name='v_id' id='v_id' class='validate[required] form-control' >";
                                                    echo "<option value='0'>--Select a Version--</option>";
                                                  
													include("connection.php");
													$sql="select * from car_version where car_id=".$_POST['m_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$vid=$row['v_id'];
														$car_ver=$row['version_name'];
													echo "<option value=$vid>".$car_ver."</option>";
													}
									
                                               echo "</select>";
}
?>