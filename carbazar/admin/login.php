<?php
session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $pass3 = mysql_real_escape_string($_POST['password']);
    $pass=md5($pass3);
   include("connection.php");
	
    $sql="SELECT * FROM login WHERE userid='$username'";
    $res=mysql_query($sql);
	$exists = mysql_num_rows($res);
	if($exists>0)
	{	
	    while($row=mysql_fetch_array($res))
    {
    	$user=$row['userid'];
		
        $passw=$row['password'];
    }
	
    if(($username==$user) && ($passw==$pass)){
    					if($pass == $passw)
				{
						$_SESSION['admin_id']=$user;
					header("location: index2.php"); 
				}
	}
  
    else
    {
    	Print '<script>alert("Incorrect USER ID Or Password..!");</script>';
			Print '<script>window.location.assign("index.php");</script>'; 
    }
	
	}
	else
	{
		Print '<script>alert("Incorrect USER ID Or Password..!");</script>';
			Print '<script>window.location.assign("index.php");</script>'; 
	
	}
    ?>