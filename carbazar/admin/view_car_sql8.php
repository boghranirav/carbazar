
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='other' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_other_spec where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_other_spe_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Seating Capacity</td>";
				echo "<td>".$row['seating_capacity']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Number Of Doors</td>";			
				echo "<td>".$row['no_of_door']."</td>";
	echo "</tr>";
	
	echo "<tr>";
				echo "<td>Cargo Volume</td>";			
				echo "<td>".$row['cargo_volume']."</td>";
	echo "</tr>";
	

    echo "</table>";
	
}


?>
