<?php
include("connection.php");

if(isset($_POST['b_id'])){
	echo $_POST['b_id'];
	echo "<select name='c_id' id='c_id'>";
	$bid=$_POST['b_id'];
												    
                                                    echo "<option value='null'>--Select City--</option>";
													include("connection.php");
													$sql="select DISTINCT cd.city_id,cd.brand_id,c.cityname from city1 c,car_dealers cd where c.city_id=cd.city_id and cd.brand_id=$bid";
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$c_id=$row['city_id'];
													echo "<option value=$c_id>".$row['cityname']."</option>";
													}
	echo "</select>";
}


?>