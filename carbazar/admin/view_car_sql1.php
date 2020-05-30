
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='trans_view' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_transmission where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_transmission_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Transmission Type</td>";
				echo "<td>".$row['transmission_type']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Gear Box</td>";			
				echo "<td>".$row['gear_box']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Drive Type</td>";
				echo "<td>".$row['drive_type']."</td>";
	echo "</tr>";
    echo "</table>";
	
}


?>
