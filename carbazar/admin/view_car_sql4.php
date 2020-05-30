
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='brake' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_brake_system where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_brake_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Front Brake Type</td>";
				echo "<td>".$row['front_brake_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Rear Brake Type</td>";			
				echo "<td>".$row['rear_brake_type']."</td>";
	echo "</tr>";


    echo "</table>";
	
}


?>
