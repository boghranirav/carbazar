<?php
include("connection.php");

if(isset($_POST['s_id'])){
	echo "<select name='c_id' id='c_id' class='validate[required] form-control'>";
												    
                                                    echo "<option value='0'>--Select a City--</option>";
													include("connection.php");
													$sql="select * from city1 where sid=".$_POST['s_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$cid=$row['city_id'];
														$city_name=$row['cityname'];
													echo "<option value=$cid>".$city_name."</option>";
													}
	echo "</select>";
}

?>