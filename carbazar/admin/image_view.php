<?php
		include("connection.php");
		$adid=$_SESSION['admin_id'];
		
		$sql_p="select * from login where userid='$adid'";
		$res_p=mysql_query($sql_p);
		$row_p=mysql_fetch_array($res_p);
		$myimg=$row_p['image_src'];		
?>