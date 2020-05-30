
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='performance' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_performance where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_performance_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Top Speed</td>";
				echo "<td>".$row['top_speed']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Acceleration(0-100 kmph)</td>";			
				echo "<td>".$row['acceleration']."</td>";
	echo "</tr>";


    echo "</table>";
	
}


?>
