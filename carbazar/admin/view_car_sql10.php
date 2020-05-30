
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='comfort' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_comfort_1 where v_id=".$_POST['v_id'];
		  $sql2="select * from car_comfort_2 where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		  $res2=mysql_query($sql2);
		 $row=mysql_fetch_array($res);
		 $row2=mysql_fetch_array($res2);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_comfort_convenience_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Power Window-Front</td>";
				echo "<td>".$row['power_windows_front']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Power Window-Rear</td>";			
				echo "<td>".$row['power_windows_read']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Automatic Climate Control</td>";			
				echo "<td>".$row['auto_climate_control']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Air Quality Control</td>";			
				echo "<td>".$row['air_quality_control']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Remote Trunk Opener</td>";			
				echo "<td>".$row['remote_trunk_opener']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Remote Fuel Lid Opener</td>";			
				echo "<td>".$row['remote_fuel_lid_opener']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Low Fuel Warning Light</td>";			
				echo "<td>".$row['low_fuel_warning_light']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Accessory Power Outlet</td>";			
				echo "<td>".$row['accessory_power_outlet']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Trunk Light</td>";			
				echo "<td>".$row['trunk_light']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Vanity Mirror</td>";			
				echo "<td>".$row['vanity_mirror']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Reading Lamp</td>";			
				echo "<td>".$row['rear_reading_lamp']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Seat Headrest</td>";			
				echo "<td>".$row['rear_seat_headrest']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Seat Centre Arm Reat</td>";			
				echo "<td>".$row['rear_seat_center_arm_rest']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Height Adjustable Front Seat Belts</td>";			
				echo "<td>".$row['height_adjustable_front_seat_belts']."</td>";
	echo "</tr>";
	
	
	echo "<tr>";
				echo "<td>Cup Holders(Front)</td>";			
				echo "<td>".$row2['cup_holder_front']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Cup Holders(Rear)</td>";			
				echo "<td>".$row2['cup_holder_read']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear A/C Vents</td>";			
				echo "<td>".$row2['rear_ac_vents']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Heated Seats(Front)</td>";			
				echo "<td>".$row2['heated_seat_front']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Heated Seats(Rear)</td>";			
				echo "<td>".$row2['heated_seat_read']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Seat Lumbar Support</td>";			
				echo "<td>".$row2['seat_lumbar_support']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Cruise Control</td>";			
				echo "<td>".$row2['cruise_control']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Parking Sensors</td>";			
				echo "<td>".$row2['parking_sensor']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Navigation System</td>";			
				echo "<td>".$row2['navigation_system']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Foldable Rear Seat</td>";			
				echo "<td>".$row2['foldable_rear_seat']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Smart Access Control Entry</td>";			
				echo "<td>".$row2['smart_access_card_entry']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Engine Start/Stop Button</td>";			
				echo "<td>".$row2['engine_start_stop_button']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td> Glove Box Cooling</td>";			
				echo "<td>".$row2['glove_box_cooling']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Bottle Holder</td>";			
				echo "<td>".$row2['bottle_holder']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Voice Control</td>";			
				echo "<td>".$row2['voice_control']."</td>";
	echo "</tr>";
	

    echo "</table>";
	
}


?>
