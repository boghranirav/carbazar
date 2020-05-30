
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='tyre' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_tyres where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_tyres_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Tyre Size</td>";
				echo "<td>".$row['tyre_size']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Tyre Type</td>";			
				echo "<td>".$row['tyre_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Wheel Size</td>";			
				echo "<td>".$row['wheel_size']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Alloy Wheel Size</td>";			
				echo "<td>".$row['alloy_wheel_size']."</td>";
	echo "</tr>";
	

    echo "</table>";
	
}


?>
