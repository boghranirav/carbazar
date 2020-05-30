<?php
	$p_id=$_GET['pid'];
	include("connection.php");
	$sqls="select * from sell_car_photo where photo_id=$p_id";
	$ress=mysql_query($sqls);
	$rows=mysql_fetch_array($ress);
	$imgsrc="admin/upload_car/sell/".$rows['photo_src'];
	unlink($imgsrc);
	
	$sql="delete from sell_car_photo where photo_id=$p_id";
	$res=mysql_query($sql);
	header("location:my_car_photos.php");
?>