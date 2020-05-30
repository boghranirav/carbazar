<?php
if(isset($_POST['c_id'])){
	?>
	
	
				<select style="height:40px;width:280px;font-size:20px" name="car_model" id="car_model">
				<option value="0">--Select Model--</option>
				<?php
						$id=$_POST['c_id'];
							include("connection.php");
							$sql=mysql_query("select * from car_model where brand_id=$id and status='launched'");
							while($row=mysql_fetch_array($sql)){
							$cid=$row['car_id'];
							$car_name=$row['car_name'];
							echo "<option value=$cid>".$car_name."</option>";
							}
				?>
				
		</select>
		
<?php

}
?>


