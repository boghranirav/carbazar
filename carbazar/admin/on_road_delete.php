<?php
$id=$_GET['rid'];
include("connection.php");
$sql=mysql_query("delete from on_road_price where road_id='$id'");
if($sql)
 header("location:view_on_road.php");
 else
 echo "data not deleted";
?>