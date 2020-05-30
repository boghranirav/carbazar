<?php
	include("master1.php");
?>

<link href="button.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />


<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
				
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
							url:"version_sql.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
								
							}
						});
					}
				
				});
				
				
					$("#m_id").change(function(){
					//alert("a");
					var id1 = $(this).val();	
					//alert(id1);
					if(id1 == "0")
					{	
					
					}
					else
					{
						//alert(id);
						$.ajax({
							url:"version_sql.php",
							type:"post",
							data:{m_id:id1},
							success:function(result){
								//alert(result);
								$("#v_id").html(result);
								
							}
						});
					}
				
				});
			
			});	
	</script>

<title>On-road Price</title>
<?php
	include("master2.php");
?>

<?php
	if(isset($_POST['submit'])){
		$b=$_POST['b_id'];
		$m=$_POST['m_id'];
		$v=$_POST['v_id'];
		$c=$_POST['city'];
		
		if(($b==0) || ($m==0) || ($v==0) || ($c==0)){
			$errmsg="*Select Every Thing.";
		}
		else
		{
			header("location:on_road_price_2.php?v=$v&c=$c&m=$m");
		}
	}
?>

<hr color="lightgrey" size="1">
<br>

<div class="wrap">

<h4 class="title">    		  
Check Instant On-road Price 

</h4>

<div class="main">

<center>
<font color="darkorange">
On-road Price = Ex-showroom Price + RTO + Insurance
</font>
<br><br>
				<div style="width:550px;height:320px;background:lightgrey;">
				<br>
				<div class="login-title">
	           		<h4 class="title">Provide Car Details</h4>
					<div id="loginbox" class="loginbox">
				
					<form method="post" action="on_road_price.php"> 
						<table>
						<tr>
							<td width="120">
							<br>
							Select Brand
							</td>
							<td>
							<br>
												<select name="b_id"  id="b_id" class="tb">
												    
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
							Select Model
							</td>
							<td>
							<br>
												<select name="m_id" id="m_id" class="tb">
												    
                                                    <option value="0">--Select Model--</option>
                                                   
                                                </select>
							</td>
						</tr>
						
						<tr>
							<td>
							<br>
							Select Version
							</td>
												
							<td>
							<br>
												<select name="v_id" id="v_id" class="tb">
												<option value="0">--Select Version--</option>
                                                </select>
							</td>
						</tr>
						
						<tr>
							<td><br>Select City</td>
							<td><br>
										<select name="city" id="city" class="tb">
										<option name="0">--Select City--</option>
											<?php
												include("connection.php");
													$sql=mysql_query("select * from city1 order by cityname");
													while($row=mysql_fetch_array($sql)){
														$cid=$row['city_id'];
														$s=$row['sid'];
														$city_name=$row['cityname'];
													echo "<option value=$cid>".$city_name."</option>";
													}
											?>
										</select>
							</td>
						</tr>
						
						<tr>
						<td></td>
						<td><br>
						<button class="grey" id="reg" name="submit">Show On-Road Price</button>
						</td>
						</tr>
						
						<tr>
						<td></td>
						<td>
						<font color="red">
						<?php
						if(isset($_POST['submit'])){
							echo $errmsg;
						}
						?>
						</font>
						</td>
						</tr>
						
					</table>
					</form>

	
					</div>
			    </div>
				</div>
</center>
				
					
</div>

</div>
	<div class="clear"></div>		


<?php
	include("master3.php");
?>

