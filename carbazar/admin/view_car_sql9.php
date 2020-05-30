
<?php
if(isset($_POST['v_id'])){
	
		echo "<table id='general' class='table table-striped table-bordered table-hover'>";
	   include("connection.php");
		 $sql="select * from car_general_details where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		 echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_general_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
    echo "<tr>";
				echo "<td width='50%'>Country Of Assembly</td>";
				echo "<td>".$row['country_of_assembly']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Country Of Manufacture</td>";			
				echo "<td>".$row['country_of_manufacture']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Introduction Date</td>";			
				echo "<td>".$row['introduction_date']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Warranty Time</td>";			
				echo "<td>".$row['warranty_time']."</td>";
	echo "</tr>";
	echo "<tr>";
				echo "<td>Warranty Distance</td>";			
				echo "<td>".$row['warranty_distance']."</td>";
	echo "</tr>";
	

    echo "</table>";
	
}


?>
