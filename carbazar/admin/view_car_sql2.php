
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='suspension' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_suspension where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_suspension_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Front Suspension</td>";
				echo "<td>".$row['front_suspension']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Suspension</td>";			
				echo "<td>".$row['rear_suspension']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Shock Absorbers Type</td>";
				echo "<td>".$row['shock_absorbers_type']."</td>";
	echo "</tr>";
    echo "</table>";
	
}


?>
