<?php
$id=$_GET["id1"];
 
 include("connection.php");
 
 if($id==0)
 {
	 $sql="SELECT * FROM car_model";
 }
 else
 {
	 $sql="SELECT * FROM car_model cmo, car_make cm  where cmo.brand_id='$id' and cmo.brand_id=cm.brand_id";
 }
	 $result = mysql_query($sql);
 
while($row = mysql_fetch_array($result)) {
    echo "<tr class='odd gradeX'>";
                                            echo "<td>".$row['car_id']."</td>";
                                            echo "<td>".$row['brand_id']."</td>";
											echo "<td>".$row['car_name']."</td>";
											echo "<td>".$row['body_type']."</td>";
											echo "<td>".$row['status']."</td>"; 
												$c=$row['car_id'];
											echo "<td><a href='carmodel_edit.php?cid=$c'>Edit</a></td>";
											echo "<td><a href='carmodel_delete.php?cid=$c'>Delete</a></td>";
                                       echo "</tr>";
}
 ?>