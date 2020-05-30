<?php
$id=$_GET['cid'];

echo $id;
include("connection.php");
$sql="delete from road_side_assistance where assisi_id=".$id;
mysql_query($sql);
header("location:view_road_side_assistance.php");
?>