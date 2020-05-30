
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='exterior_d' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_exterior_dimension where v_id=".$_POST['v_id'];
		 
		 $res=mysql_query($sql);
		 
		 $row=mysql_fetch_array($res);
		 		 		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_exterior_d_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Length</td>";
				echo "<td>".$row['length']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Width</td>";			
				echo "<td>".$row['wiidth']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Height</td>";			
				echo "<td>".$row['height']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Ground Clearance</td>";			
				echo "<td>".$row['ground_clearance']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Wheel Base</td>";			
				echo "<td>".$row['wheel_base']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Front Tread</td>";			
				echo "<td>".$row['front_tread']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Rear Tread</td>";			
				echo "<td>".$row['rear_tread']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Kerb Weight</td>";			
				echo "<td>".$row['kerb_weight']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Gross Weight</td>";			
				echo "<td>".$row['gross_weight']."</td>";
	echo "</tr>";


	

    echo "</table>";
	
}


?>
