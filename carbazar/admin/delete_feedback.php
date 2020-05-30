<?php
	$fid=$_GET['fid'];
	include("connection.php");
	$sql="delete from feedback where f_id='$fid'";
	mysql_query($sql);
	header("location:view_feedback.php");
?>