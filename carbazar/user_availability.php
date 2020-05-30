<?php

include("connection.php");
$sql = "select * from user_login where email='".$_POST['email']."'";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0)
	{	
		echo "no";
	}
	else
	{
		echo "yes";
	}	
?>