<?php
include("connection.php");

if(isset($_POST['b_id'])){
	echo "<select name='mid' id='mid'>";
												    
                                                    echo "<option value='0'>--Select Model--</option>";
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



if(isset($_POST['mid'])){
	echo "<select name='vid' id='vid'>";
                                                    echo "<option value='0'>--Select Version--</option>";
                                                  
													include("connection.php");
													$sql="select * from car_version where car_id=".$_POST['mid'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$vid=$row['v_id'];
														$car_ver=$row['version_name'];
													echo "<option value=$vid>".$car_ver."</option>";
													}
									
                                               echo "</select>";

		}
if(isset($_POST['b_id2'])){
	echo "<select name='mid2' id='mid2'>";
												    
                                                    echo "<option value='0'>--Select Model--</option>";
													include("connection.php");
													$sql="select * from car_model where status='launched' and brand_id=".$_POST['b_id2'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$mid=$row['car_id'];
														$car_name=$row['car_name'];
													echo "<option value=$mid>".$car_name."</option>";
													}
	echo "</select>";
}



if(isset($_POST['mid2'])){
	echo "<select name='vid2' id='vid2'>";
                                                    echo "<option value='0'>--Select Version--</option>";
                                                  
													include("connection.php");
													$sql="select * from car_version where car_id=".$_POST['mid2'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$vid=$row['v_id'];
														$car_ver=$row['version_name'];
													echo "<option value=$vid>".$car_ver."</option>";
													}
									
                                               echo "</select>";

		}

?>