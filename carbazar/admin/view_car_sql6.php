
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='fuel' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_fuel where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_fuel_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Mileage City</td>";
				echo "<td>".$row['mileage_city']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Mileage Highway</td>";			
				echo "<td>".$row['mileage_highway']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Fuel Type</td>";			
				echo "<td>".$row['fuel_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Fuel Tank Capacity</td>";			
				echo "<td>".$row['fuel_capacity']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Emission Norm Compliance</td>";			
				echo "<td>".$row['emission_norm_compliance']."</td>";
	echo "</tr>";


    echo "</table>";
	
}


?>
