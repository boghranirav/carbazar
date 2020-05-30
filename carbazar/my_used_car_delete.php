<?php
$s_id=$_GET['sid'];
	include("connection.php");
	
	$sql="delete from car_sell where saler_id='$s_id'";
	$res=mysql_query($sql);
	header("location:my_used_car.php");
	
?>