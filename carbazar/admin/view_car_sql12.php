
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='exterior' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_exterior_1 where v_id=".$_POST['v_id'];
		 $sql2="select * from car_exterior_2 where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $res2=mysql_query($sql2);
		 $row=mysql_fetch_array($res);
		 $row2=mysql_fetch_array($res2);
		 		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_exterior_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Adjustable Headlights</td>";
				echo "<td>".$row['adjustable_headlights']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Fog Lights(Front)</td>";			
				echo "<td>".$row['fog_lights_front']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Fog Lights(Rear)</td>";			
				echo "<td>".$row['fog_light_rear']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Power Adjustable Exterior Rear-View Mirror</td>";			
				echo "<td>".$row['power_adjust_rear_view']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Manually Adjustable Exterior Rear-View Mirror</td>";			
				echo "<td>".$row['manually_adjust_rear_view']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Electric Folding Rear View Mirror</td>";			
				echo "<td>".$row['electric_folding_rear']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rain Sensing Wiper</td>";			
				echo "<td>".$row['rain_sensing_wiper']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Window Wiper</td>";			
				echo "<td>".$row['rear_window_wiper']."</td>";
	echo "</tr>";	
	echo "<tr>";
				echo "<td>Rear Window Washer</td>";			
				echo "<td>".$row['rear_window_washer']."</td>";
	echo "</tr>";	

	echo "<tr>";
				echo "<td>Rear Window Defogger</td>";			
				echo "<td>".$row['rear_window_defogger']."</td>";
	echo "</tr>";	

	echo "<tr>";
				echo "<td>Wheel Covers</td>";			
				echo "<td>".$row['wheel_cover']."</td>";
	echo "</tr>";	
	echo "<tr>";
				echo "<td>Alloy Wheel</td>";			
				echo "<td>".$row['alloy_wheel']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Power Antenna</td>";			
				echo "<td>".$row['power_antenna']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Tinted Glass</td>";			
				echo "<td>".$row2['tinted_glass']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Spoiler</td>";			
				echo "<td>".$row2['rear_spoiler']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Removable/Convertible Top</td>";			
				echo "<td>".$row2['convertible_top']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Roof Carrier</td>";			
				echo "<td>".$row2['roof_carrier']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Sun Roof</td>";			
				echo "<td>".$row2['sun_roof']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Moon Roof</td>";			
				echo "<td>".$row2['moon_roof']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Side Stepper</td>";			
				echo "<td>".$row2['side_stepper']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Outside Rear View Mirror Turn Indicators</td>";			
				echo "<td>".$row2['outside_rear_mirror_indicator']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Integrated Antenna</td>";			
				echo "<td>".$row2['integrated_antenna']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Chrome Grille</td>";			
				echo "<td>".$row2['chrome_grille']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Chrome Garnish</td>";			
				echo "<td>".$row2['chrome_garnish']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Smoke Headlamps</td>";			
				echo "<td>".$row2['smoke_headlamps']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Roof Rail</td>";			
				echo "<td>".$row2['roof_rail']."</td>";
	echo "</tr>";
	
	


    echo "</table>";
	
}


?>
