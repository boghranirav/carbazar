<?php
	include("connection.php");
	$id=$_GET['sid'];
	$sql="delete from car_sell where saler_id=$id";
	mysql_query($sql);
	header("location:used_car_info.php");
?>