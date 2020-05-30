<?php
	include("master1.php");
?>
<link href="css/select.css" rel="stylesheet" type="text/css" media="all" />
<link href="button.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />



<title>New Car Dealers</title>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
		//alert("hello");
			$(document).ready(function(){
				//alert("hello");
				
				$("#bid").change(function(){
					//alert("a");
					var id = $(this).val();	
					//alert(id);
					if(id == "0")
					{	
					
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"dealer_ajex.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#c_id").html(result);
								
							}
						});
					}
				
				});
			});
</script>


<?php
	include("master2.php");
?>

<hr color="lightgrey" size="1">
<br>

<div class="wrap">
	<h4 class="title">    		  
			New Car Dealers
	</h4>
	
	<div style="width:800px;height:75px;" align="center">
		<form method="post" action="">
		<?php
			if(isset($_POST['submit'])){
				 
				 $bid1=$_POST['bid'];
				 $cid1=$_POST['c_id'];
				 $errmsg="";
				 
				 if(($bid1=="null") && ($cid1=="null")){
					 $errmsg="*Please Select Brand And City.";
				 }else
					 if($bid1=="null"){
						 $errmsg="*Please Select Brand.";
					 }
					 else
						 if($cid1=="null"){
							 $errmsg="*Please Select City.";
						 }
					 
			}
		?>
			<table >
				<tr>
					<td>
						<br>
						<select class="select-btn" id="bid" name="bid">
						<option value="null">--Select Brand--</option>
						<?php
							include("connection.php");
							$sql="select * from car_make";
							$res=mysql_query($sql);
							while($row=mysql_fetch_array($res)){
								$b_id=$row['brand_id'];
						?>	
							<option value="<?php echo $b_id;?>" <?php if(isset($_POST['submit'])){if($b_id==$bid1) echo "selected";} ?>><?php echo $row['car_company']; ?> </option>;
						<?php
							}
						?>
						</select>
					</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<br>
						<select class="select-btn" id="c_id" name="c_id">
						<option  value="null">--Select City--</option>
						
						</select>
					</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>
						<br>
						<button class="grey"  name="submit">Submit</button>
					</td>
				</tr>
			</table>
		</form>
		<br>
		
	</div>
	<font color="red" style="margin-left: 0.7cm">
		<?php
			if(isset($_POST['submit']))
			echo $errmsg;
		?>
		</font>
	<?php
			if((isset($_POST['submit'])) && ($errmsg=="")){
				 
				 $brandid=$_POST['bid'];
				 $cityid=$_POST['c_id'];
				 
				 $bsql="select * from car_dealers where brand_id=$brandid and city_id=$cityid";
				 $res=mysql_query($bsql);
				 ?>
		
				 <?php
				 $sql3="select * from car_make where brand_id=$brandid";
				 $res3=mysql_query($sql3);
				 $row3=mysql_fetch_array($res3);
				 
				 $sql4="select * from city1 where city_id=$cityid";
				 $res4=mysql_query($sql4);
				 $row4=mysql_fetch_array($res4);
				
				 echo "<h3 style='padding-left:30px;font-size: 1.3em;color:#399FB8;text-transform:uppercase;margin-bottom: 4%;'>".$row3['car_company']." Dealers In ".$row4['cityname']."</h3>";
				 
				 while($row=mysql_fetch_array($res)){
					 echo "<div style='border: thin solid #4cb1ca;width:750px;margin-left:30px'>";
					 echo "<table>";
					 echo "<tr>";
					 echo "<td width='150' style='padding-left:10px'>";
					  echo "<br>";
					 echo  "<font size='4'><h4 style='font-weight: bold;font-size: 1em;'>Dealers Name</h4>" ;
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo "<h4 style='font-weight: bold;font-size: 1em;'>".$row['dealer_name']."</h4></font>";
					 echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td style='padding-left:10px'>";
					  echo "<br>";
					 echo "Address";
					 echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['address'];
						echo "</td>";
					 echo "</tr>";
					 
					 echo "<tr>";
					 echo "<td style='padding-left:10px'>";
					  echo "<br>";
					 echo "Contact Number";
					  echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['phone_no'];
					 echo "</td>";
					 echo "</tr>";
					
					 if($row['email']==" "){
					 }
					 else
					 {
					 echo "<tr>";
					 echo "<td style='padding-left:10px'>";
					  echo "<br>";
					 echo "E-mail Id";
					  echo "</td>";
					 echo "<td>";
					  echo "<br>";
					 echo $row['email'];
					 echo "</td>";
					 echo "</tr>";
					 }
					 echo "</table>";
					 echo "<br>";
					 echo "<br>";
					 echo "</div>";
					 
				 }
				 
			}
		?>
		<br>
</div>
<br>
<div class="clear"></div>		

<?php
	include("master3.php");
?>