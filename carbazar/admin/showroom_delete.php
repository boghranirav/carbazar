<?php
$id=$_GET['id'];
include("connection.php");
mysql_query("delete from car_dealers where d_id=$id");
header("location:view_showroominfo.php");
?>