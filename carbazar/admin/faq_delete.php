<?php
	$fid=$_GET['faqid'];
	include("connection.php");
	$sql="delete from faqs where faq_id=$fid";
	mysql_query($sql);
	header("location:view_faq.php");
?>