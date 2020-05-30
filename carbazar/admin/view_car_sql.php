<?php
include("connection.php");

if(isset($_POST['b_id'])){
	echo "<select name='m_id' id='m_id' class='validate[required] form-control'>";
												    
                                                    echo "<option value='0'>--Select a Model--</option>";
													include("connection.php");
													$sql="select * from car_model where status='launched' and brand_id=".$_POST['b_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$mid=$row['car_id'];
														$car_name=$row['car_name'];
													echo "<option value=$mid>".$car_name."</option>";
													}
	echo "</select>";
}

if(isset($_POST['m_id'])){
	echo "<select name='v_id' id='v_id' class='validate[required] form-control' >";
                                                    echo "<option value='0'>--Select a Version--</option>";
                                                  
													include("connection.php");
													$sql="select * from car_version where car_id=".$_POST['m_id'];
													$sql1=mysql_query($sql);
													while($row=mysql_fetch_array($sql1)){
														$vid=$row['v_id'];
														$car_ver=$row['version_name'];
													echo "<option value=$vid>".$car_ver."</option>";
													}
									
                                               echo "</select>";
}

if(isset($_POST['v_id'])){
	
	echo "<table id='comf_view' class='table table-striped table-bordered table-hover'>";
         include("connection.php");
		 $sql="select * from car_engine where v_id=".$_POST['v_id'];
		 $res=mysql_query($sql);
		 $row=mysql_fetch_array($res);
		 $id=$row['v_id'];
		   echo "<tr>";
	
			echo "<td colspan='2'><center><a href='car_engine_edit.php?vid=$id'><b><font size='4'>Edit</font></b></a><center></td>";
		 echo "</tr>";
		 echo "<tr>";
			echo "<td width='50%'>Engine Type</td>";
			echo "<td>".$row['engine_type']."</td>";
		 echo "</tr>";
		 echo "<tr>";
			echo "<td>Engine Description</td>";
			echo "<td>".$row['engine_description']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Engine Displacement</td>";
			echo "<td>".$row['engine_displacement']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Number Of Cylinders</td>";
			echo "<td>".$row['no_cylinders']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Maximum Power</td>";
			echo "<td>".$row['maximum_power']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Maximum Torque</td>";
			echo "<td>".$row['maximum_torque']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Valves Per Cylinder</td>";
			echo "<td>".$row['valves_per_cylinder']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Valve Configuration</td>";
			echo "<td>".$row['valve_configuration']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Fuel Supply System</td>";
			echo "<td>".$row['fuel_supply_system']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Bore X Stroke</td>";
			echo "<td>".$row['bore_x_stroke']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Compression Ratio</td>";
			echo "<td>".$row['compression_ratio']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Turbo Charge</td>";
			echo "<td>".$row['turbo_charger']."</td>";
		 echo "</tr>";
		  echo "<tr>";
			echo "<td>Super Charge</td>";
			echo "<td>".$row['super_charger']."</td>";
		 echo "</tr>";
					
    echo "</table>";
	
	
}





?>
