<?php
include("master.php");
?>

<title>
Edit Car Dealer
</title>

<?php
include("master1.php");
?>

<?php
$id=$_GET['id'];
include("connection.php");
$sql="SELECT * FROM car_dealers cd,states s,city1 c,car_make b where cd.state_id=s.id and cd.city_id=c.city_id and cd.brand_id=b.brand_id and cd.d_id='$id'";

$res=mysql_query($sql);
if(mysql_num_rows($res)<=0)
{
	
	header("location:view_showroominfo.php");
}
$row=mysql_fetch_array($res);
    $st=$row['state']; 
	$cn=$row['cityname'];
	$car_c=$row['car_company'];
	$dn=$row['dealer_name'];
	$add=$row['address'];
	$pno=$row['phone_no'];  
	$em=$row['email'];   
											
	

?>

<?php

	if(isset($_POST['submit'])){
	$stateid=$_POST['s_id'];
	$cityid=$_POST['c_id'];
	$bid=$_POST['b_id'];
	$dealern=$_POST['d_name'];
    $address1=$_POST['addr'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
		$errmsg="";
	
	
	$err['sts']="";
	$err['cty']="";
	$err['brd']="";
	$err['dname']="";
	$err['dadd']="";
	$err['phno']="";
	$err['mail']="";
	if($stateid=="0")
	{
		$err['sts']="*Select State.";
		
	}
	if($cityid=="0")
	{
		$err['cty']="*Select City.";
		
	}
	if($bid=="0")
	{
		$err['brd']="*Select Brand.";
		
	}
	if($dealern==""){
		$err['dname']="*Enter Name.";
		
	}
	if(!preg_match("/^[a-zA-Z -]*$/",$dealern))
	{
		$err['dname']="*Enter Valid Name.";
	}
	if($add=="")
	{
		$err['dadd']="*Enter Valid Address.";
	}
	if($phno=="")
	{
		$err['phno']="*Enter phoneno.";
	}

	if($email=="")
	{
		$err['mail']="*Enter Valid Emailid.";
	}
	if( $err['sts']=="" && $err['cty']=="" && $err['brd']=="" && $err['dname']=="" && $err['phno']=="" && $err['mail']=="")
	{

	include("connection.php");
	$sql1="update car_dealers set state_id=$stateid,city_id=$cityid ,brand_id=$bid , dealer_name='$dealern',address='$address1',phone_no='$phno',email='$email' where d_id=$id";
	
	$res1=mysql_query($sql1);
	if($res1){
		header("location:view_showroominfo.php");
	}
	else
	{
		$errmsg="Data Not Edited..";
	}
	
	}
}
?>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
			$(document).ready(function(){
				//alert("hello);
							
				$("#s_id").change(function(){
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
							url:"view_ajaxcity.php",
							type:"post",
							data:{s_id:id},
							success:function(result){
								//alert(result);
								$("#c_id").html(result);
						
							}
						});
					}
				
				});
				
					
			
			});	
	</script>

                    <h1 class="page-header">Add Dealer Info</h1>
										<br>
					<form method="post" action="#">
					<table width="80%">
					<tr>
					<td width="15%">					
                                            <label>Select State</label>
					</td>
					<td width="40%">
					                        <div class="col-lg-9">
                                                <select name="s_id" id="s_id" class="validate[required] form-control" length="10">
                                                    <option value="0">--Select a State--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from states");
													while($row=mysql_fetch_array($sql)){
														$sid=$row['id'];
														$state_name=$row['state'];
													?>
													<option value=<?php echo $sid;?> <?php if($state_name==$st) echo "selected";?>><?php echo $state_name;?></option>
													<?php
													}
													?>
                                                </select>
                                            </div>
					</td>
					<td width="20%">
					<font color="red">
						<?php
					if(isset($_POST['submit']))
					{
						echo $err['sts'];
					}
					
					?>
					</font>
					</td>
					</tr>						
					<tr id="city">
						<td>
											<label>Select city</label>
						</td>
						<td>
					                        <div class="col-lg-9">
                                                <select name="c_id" id="c_id" class="validate[required] form-control" length="10" >
                                                    <option value="0">--Select a City--</option>
                                            
                                                </select>
                                            </div>
						</td>
						<td><font color="red">
							<?php
					if(isset($_POST['submit']))
					{
						echo $err['cty'];
					}
					
					?></font>
						</td>
					</tr>
					<tr id="brand">
					   <td>
					    <label>Select Brand</label>
					
				    	</td>
						<td>
						
			<div class="col-lg-9">
                                                <select name="b_id"  id="b_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Brand--</option>
                                                    <?php
													include("connection.php");
													$sql=mysql_query("select * from car_make");
													while($row=mysql_fetch_array($sql)){
														$bid=$row['brand_id'];
														$car_com=$row['car_company'];
														?>
														<option value='<?php echo $bid;?>' <?php if($car_com==$car_c) echo "selected";?>><?php echo $car_com;?></option>;
													<?php
													}
													?>
													
                                                </select>
            </div>
						</td>
						<td>
						<font color="red">
							<?php
					if(isset($_POST['submit']))
					{
						echo $err['brd'];
					}
					
					?></font>
						</td>
					</tr>
					<tr id="dname">
						<td> 
									<label>Enter Dealer Name </label>
									
						</td>
                        <td>
									<div class="col-lg-9">
									<input class="form-control" placeholder="Dealer Name" name="d_name" size="25" value="<?php if(isset($_POST['submit'])){ echo $dealern; }
									else{ echo $dn; }?>">
									</div>
						</td>
						<td><font color="red">
						<?php
					if(isset($_POST['submit']))
					{
						echo $err['dname'];
					}
					
					?></font>
							
						</td>
					</tr>
					<tr id="address">
						<td> 
									<label>Enter Address </label>
									
						</td>
                        <td>
									<div class="col-lg-9">
									<textarea class="form-control" rows="3" name="addr" ><?php if(isset($_POST['submit'])){ echo $address1;}else {echo $add;}?></textarea>
									</div>
						</td>
						<td><font color="red">
						<?php
					if(isset($_POST['submit']))
					{
						echo $err['dadd'];
					}
					
					?></font>
							
						</td>
					</tr>
					<tr id="phoneno">
						<td> 
									<label>Phone no</label>
						</td>
                        <td>
									<div class="col-lg-9">
									<input class="form-control" placeholder="Phone no" name="phno" size="25" value="<?php if(isset($_POST['submit'])){ echo $phno;} else{ echo $pno;}?>">
									</div>
						</td>
						<td><font color="red">
						<?php
					if(isset($_POST['submit']))
					{
						echo $err['phno'];
					}
					
					?></font>
					
						</td>
					</tr>
					
					<tr id="emailid">
						<td> 
									<label>Email</label>
						</td>
                        <td>
									<div class="col-lg-9">
									<input class="form-control" placeholder="Email" name="email"  value="<?php if(isset($_POST['submit'])){ echo $email ;} else {echo $em;}?>">
									</div>
						</td>
						<td><font color="red">
						<?php
					if(isset($_POST['submit']))
					{
						echo $err['mail'];
					}
					
					?></font>
					
						</td>
					</tr>
					
					<tr>
					<td></td>
						<td>
						<br>			
						&nbsp;&nbsp;&nbsp;
									<input type="submit" class="btn btn-primary" name="submit" value="Add Dealer">
					&nbsp;&nbsp;
									<a href="view_showroominfo.php" class="btn btn-primary">View List Of Dealer</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$errmsg."</label>";
						}
						?>
					</form>
					
               <?php
include("master2.php");
?>