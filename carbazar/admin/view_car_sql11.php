
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='comfort' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_interior where v_id=".$_POST['v_id'];
		 
		 $res=mysql_query($sql);
		 
		 $row=mysql_fetch_array($res);
		 		$id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_interior_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Air Conditioner</td>";
				echo "<td>".$row['ac']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Heater</td>";			
				echo "<td>".$row['heater']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Adjustable Steering Column</td>";			
				echo "<td>".$row['adjustable_steering_column']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Techometer</td>";			
				echo "<td>".$row['techometer']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Electronic Multi-Tripmeter</td>";			
				echo "<td>".$row['electronic_multi_tripmeter']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Leather Seats</td>";			
				echo "<td>".$row['leather_seats']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Fabric Upholstery</td>";			
				echo "<td>".$row['fabric_upholstery']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Leather Steering Wheel</td>";			
				echo "<td>".$row['leather_steering_wheel']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Glove Compartment</td>";			
				echo "<td>".$row['glove_compartment']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Digital Clock</td>";			
				echo "<td>".$row['digital_clock']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Outside Temperature Display</td>";			
				echo "<td>".$row['outside_temprature_display']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Cigarette Lighter</td>";			
				echo "<td>".$row['cigarette_lighter']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Digital Odometer</td>";			
				echo "<td>".$row['digital_odometer']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Electric Adjustable Seat</td>";			
				echo "<td>".$row['electric_adjustable_seats']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Foldable Table in the Rear</td>";			
				echo "<td>".$row['folding_table_in_rear']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Driving Experience Control Eco</td>";			
				echo "<td>".$row['driving_experience_control_eco']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Height Adjustable Driving Seat</td>";			
				echo "<td>".$row['height_adjustable_driving_seat']."</td>";
	echo "</tr>";
	

    echo "</table>";
	
}


?>
