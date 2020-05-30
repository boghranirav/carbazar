
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='entertainment' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_entertainment where v_id=".$_POST['v_id'];
		 
		 $res=mysql_query($sql);
		 
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 		 		 
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_entertainment_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Cassette Player</td>";
				echo "<td>".$row['cassette_player']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>CD Player</td>";			
				echo "<td>".$row['cd_player']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>CD Charger</td>";			
				echo "<td>".$row['cd_charger']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>DVD Player</td>";			
				echo "<td>".$row['dvd_player']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Radio</td>";			
				echo "<td>".$row['radio']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Audio System Remote Control</td>";			
				echo "<td>".$row['audio_system_remote_control']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Speakers Front</td>";			
				echo "<td>".$row['speakers_front']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Speakers Rear</td>";			
				echo "<td>".$row['speakers_rear']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Integrated 2DIN Audio</td>";			
				echo "<td>".$row['integrated_2din_audio']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>Bluetooth Connectivity</td>";			
				echo "<td>".$row['bluetooth_connectivity']."</td>";
	echo "</tr>";

		echo "<tr>";
				echo "<td>USB & Auxiliary Input</td>";			
				echo "<td>".$row['usb_input']."</td>";
	echo "</tr>";
echo "<tr>";
				echo "<td>Touch Screen</td>";			
				echo "<td>".$row['touch_screen']."</td>";
	echo "</tr>";

	

    echo "</table>";
	
}


?>
