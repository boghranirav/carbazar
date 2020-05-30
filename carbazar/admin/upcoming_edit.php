<?php
		if((!isset($_GET['vid'])) || ($_GET['vid']==null)){
		header("location:upcoming_view.php");
		}
include("master.php");
?>
<title>
Add Version
</title>
<?php
include("master1.php");
?>

<?php
		$id=$_GET['vid'];
		include("connection.php");
		$sql3="select * from upcoming where u_id=$id";
		$res3=mysql_query($sql3);
		if(mysql_num_rows($res3)<=0){
			header("location:upcoming_view.php");
		}
		$row3=mysql_fetch_array($res3);
		$vn=$row3['car_name'];
		$p=$row3['price'];
		$ld=$row3['l_date'];
	?>
	
	
	<?php
	$id=$_GET['vid'];
	if(isset($_POST['submit'])){
		
	
		$vname=$_POST['vname'];
		
		$price=$_POST['vprice'];
		$ldate=$_POST['ldate'];
		
	
		
		if(($mid == 0) && ($vname == ""))
		{
			$errmsg="Invalid Data";
		}
		else
		{
		include("connection.php");
		
		$sql="update upcoming set car_name='$vname',price='$price',l_date='$ldate' where u_id=$id";
		
		$sql1=mysql_query($sql);
		
		if($sql1){
			$errmsg="";
			header("location:upcoming_view.php");
		}
		else{
			$errmsg="Data Not Added";
		}
		}
		
		
	}
	?>
	
	
	
                                    <h1 class="page-header"> Add Upcoming Car </h1>
			
			
			<form action="" method="post" id="select_version" name="select_version">
			
			<table width="70%" border="0" >
			
				
				<tr id="vname">
				<td>
				<label>Enter Car Name :</label>
				</td>
				<td>
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Name" name="vname" value="<?php echo $vn;?>">
				</div>
				</td>
				<td></td>
				</tr>
				
				
				<tr id="price">
				<td>
				<label>Price :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Version Price" name="vprice" value="<?php echo $p;?>">
				</div>
				</td>
				<td></td>
				</tr>
				
				
				<tr id="date">
				<td>
				<label>Date :</label>
				</td>
				<td>
				
				<div class="col-lg-10">
				<input class="form-control" placeholder="Enter Launch Date" name="ldate" value="<?php echo $ld;?>">
				</div>
				</td>
				<td></td>
				</tr>
				
				
				
				<tr id="subm">
				<td>
				</td>
				<td>
				&nbsp;&nbsp;&nbsp; 
					<input type="submit" class="btn btn-primary" name="submit" value="Add Version">
				</td>
				<td></td>
				<tr>
				
				
		</table>
</form>								
									
									
<?php
include("master2.php");
?>