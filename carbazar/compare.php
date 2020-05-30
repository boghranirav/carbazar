<?php
	include("master1.php");
?>
<title>Compare</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />


<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				
				$("#b_id").change(function(){
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
							url:"compareajax.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#mid").html(result);
								//$("#model").show();
							}
						});
					}
				
				});
				
					$("#mid").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						//$("#version").hide();
						//$("#overview").hide();
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"compareajax.php",
							type:"post",
							data:{mid:id1},
							success:function(result1){
							//	alert(result1);
								$("#vid").html(result1);
							
								//$("#version").show();
								//$("#overview").show();
							}
						});
					}
				
				});
			
$("#b_id2").change(function(){
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
							url:"compareajax.php",
							type:"post",
							data:{b_id2:id},
							success:function(result){
								//alert(result);
								$("#mid2").html(result);
								
							}
						});
					}
				
				});
				
					$("#mid2").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"compareajax.php",
							type:"post",
							data:{mid2:id1},
							success:function(result1){
							//	alert(result1);
								$("#vid2").html(result1);
							
								
							}
						});
					}
				
				});
			
				
				$("#b_id3").change(function(){
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
							url:"compareajax.php",
							type:"post",
							data:{b_id2:id},
							success:function(result){
								//alert(result);
								$("#mid3").html(result);
								
							}
						});
					}
				
				});
				
				$("#mid3").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
						
						
					}
					else
					{
						//alert(id1);
						$.ajax({
							url:"compareajax.php",
							type:"post",
							data:{mid2:id1},
							success:function(result1){
							//	alert(result1);
								$("#vid3").html(result1);
							
								
							}
						});
					}
				
				});
			
			});	
	</script>

<?php
	include("master2.php");
?>


	
	
<hr size="1" color="lightgrey">
<br>

<?php
	
	if(isset($_POST['comp'])){
		$a=$_POST['vid'];
		$b=$_POST['vid2'];
		$c=$_POST['vid3'];
		$errmsg="";
		
		if(($a==0) || ($b==0)){
			$errmsg="Please Select At list First Two car for Comparison.";
		}
		else
		if(($a==$b) || ($a==$c) || ($b==$c)){
			$errmsg="Please Select Different car for Comparison.";
		}else
		if($c==0)	
		{
			header("location:compareprocess.php?vid=$a&vid2=$b");
		}
		else
		{
			header("location:compareprocess_2.php?vid=$a&vid2=$b&vid3=$c");
		}
	}
?>


 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          	<div class="wrap">
			<h4 class="title">
					Compare Cars
			</h4>
			<center>
			<form name="c1" action="compare.php" method="post">
			
				<div style="width:810px;height:300px;background:lightgrey;" align="center">
				<br>
				
             <table>
					<tr align="center">
						<td><font size="6" color="brown" face="Algerian">1</font></td>
						
						<td></td>
						<td><font size="6" color="brown" face="Algerian">2</font></td>
						<td></td>
						<td><font size="6" color="brown" face="Algerian">3</font></td>
					</tr>
                    <tr>
						
                       <td>
					   <br><select name="b_id" id="b_id" class="tb" style="height:30px">
					   <option value="0">--Select Brand--</option>
					   <?php
					   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													</select>
				        </td>
						<td>
						&nbsp;&nbsp;&nbsp;
						
						</td>
						<td>
					   <br><select name="b_id2" id="b_id2" class="tb"  style="height:30px">
					   <option value="0">--Select Brand--</option>
					   <?php
					   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													</select>
				        </td>
						<td>
						&nbsp;&nbsp;&nbsp;
						
						</td>
						<td>
					   <br><select name="b_id3" id="b_id3" class="tb"  style="height:30px">
					   <option value="0">--Select Brand--</option>
					   <?php
					   include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
													echo "<option value=$bid>".$car_com."</option>";
													}
													?>
													</select>
				        </td>
						
					</tr>
					<tr>
						<td>
						<br>
						<select name="mid" id="mid"class="tb"  style="height:30px">
						  <option value="0">--Select Model--</option>
                                                    

						</select>
						</td>
						<td>
						&nbsp;&nbsp;&nbsp;
						</td>
						<td>
						<br>
						<select name="mid2" id="mid2" class="tb" style="height:30px">
						  <option value="0">--Select Model--</option>
                                                   

						</select>
						</td>
						<td>
						&nbsp;&nbsp;&nbsp;
						</td>
						<td>
						<br>
						<select name="mid3" id="mid3" class="tb" style="height:30px">
						  <option value="0">--Select Model--</option>
                                                   

						</select>
						</td>
					</tr>	
						<tr>
						<td>
						<br>
						    <select name="vid" id="vid"  class="tb" style="height:30px">
							<option value="0">--Select Version--</option>
							
							</select>
						</td>
						<td>
						&nbsp;&nbsp;&nbsp;
						</td>
						<td>
						<br>
						    <select name="vid2" id="vid2" class="tb" style="height:30px">
							<option value="0">--Select Version--</option>
							 
							</select>
						</td>
						<td>
						&nbsp;&nbsp;&nbsp;
						</td>
						<td>
						<br>
						    <select name="vid3" id="vid3" class="tb" style="height:30px">
							<option value="0">--Select Version--</option>
							 
							</select>
						</td>
					</tr>
									
					<tr>
					      <td>
						 
						 
						  
						 
						  </td>
					</tr>
             </table>
			 <br>
			  
			

			
<center>
<table>
<tr>
<td>	
<div class="button1">
<input type="submit" value="COMPARE CARS" name="comp">
</div>
</td>
</tr>
</table>
</center>
</form>
</center>				
				&nbsp;&nbsp;
					
                   <br>
			 
				</div>
				<center>
			<?php
				if(isset($_POST['comp'])){
					echo "<font color='red'>".$errmsg."</font>";
				}
			?>
			</center>
				<br>
				<br>

			
			
		
				
				
<div class="clear"></div>

<div class="clear"></div>
		</div>
	
		

 
       <?php
	include("master3.php");
?>