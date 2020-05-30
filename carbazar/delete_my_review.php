<?php
	$rid=$_GET['rid'];
	include("connection.php");
	$sql="delete from car_review where rid=$rid";
	$res=mysql_query($sql);
	header("location:my_review.php");
?>