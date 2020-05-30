<?php
$id=$_GET['pid'];

include("connection.php");

	$sql="select * from photos where photo_id=$id";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	$img=$row['name'];
	
	if($res){
		$sql1="delete from photos where photo_id=$id";
		$res2=mysql_query($sql1);
		unlink("upload_car/image/".$img);
		if($res2){
			header("location:view_photos.php");
		}
		else
	{
			echo "Photo Not Deleted.";
	}
	}
	else
	{
			echo "Photo Not Deleted.";
	}
?>