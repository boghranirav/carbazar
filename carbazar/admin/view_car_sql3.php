
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='steering' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_steering where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		  $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_steering_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Steering Type</td>";
				echo "<td>".$row['steering_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Steering Column</td>";			
				echo "<td>".$row['steering_column']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Steering Gear Type</td>";
				echo "<td>".$row['steering_gear_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Turning Radius</td>";
				echo "<td>".$row['turning_radious']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Power Steering</td>";
				echo "<td>".$row['power_steering']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Multi Function Steering</td>";
				echo "<td>".$row['multifunction_steering']."</td>";
	echo "</tr>";
    echo "</table>";
	
}


?>
