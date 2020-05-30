<?php

include("connection.php");
$sql = "select * from login where userid='".$_POST['uname']."'";
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