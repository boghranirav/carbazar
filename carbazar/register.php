<?php
	include("master1.php");
?>
<title>title here</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script>
		
	$("document").ready(function(){
	//$("#required").hide();
		$("#reg").click(function(){
			var fname,lname,email,pass,phno;
			//var fname1=getElementById("#fname").value;
		
			email = test_email("#email","#msgemail");
			fname = test_name("#fname","#msgfname");
			lname = test_name("#lname","#msglname");
			pass = test_match("#pass","#pass","#msgpass","#msgpass1");
			phno = test_no("#phone","#msgphone");
			
			if(fname == true && lname == true && pass == true && email == true && phno == true)
			{
				return true;
			}
			else
			{
				return false;
			}
			
		});
	
	});
</script>

<script src="jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript">
$(document).ready(function()
{
	$("#email").blur(function()
	{
		if(document.getElementById("email").value !="")
		{
			
		//remove all the class add the messagebox classes and start fading
		$("#msgemail").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		//check the username exists or not from ajax
		$.post("user_availability.php",{ email:$(this).val() } ,function(data)
        {
		  if(data=='no') //if username not avaiable
		  {
			  
		  	$("#msgemail").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			
			
			  //add message and change the class of the box and start fading
			  $(this).html('This Email Id Already exists').addClass('messageboxerror').fadeTo(900,1);	   
			
			  $("#email").focus();
			  document.getElementById("email").value="";
			});		
          }
		  else
		  {
		  	$("#msgemail").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			
			  //add message and change the class of the box and start fading
			  $(this).html('Email Available to register').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
				
        });
 	}
	});
});
</script>


<script>
			$(document).ready(function(){
				//alert("hello);
							
				$("#state").change(function(){
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
								$("#city").html(result);
							}
						});
					}
				
				});
			
			});	
			$(document).ready(function(){
				//alert("hello");
							
				$("#state").val(function(){
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
								$("#city").html(result);
							}
						});
					}
				
				});
			
			});	
	</script>
<?php
	include("master2.php");
?>

<?php
	$errmsgst="";
	$errmsgct="";
	$errmsgcap="";
	if(isset($_POST['submit'])){
		$em=$_POST['email'];
		$pa=$_POST['pass'];
		$fn=$_POST['fname'];
		$ln=$_POST['lname'];
		$ph=$_POST['phone'];
		$st=$_POST['state'];
		$ct=$_POST['city'];
		
		if($st=="null"){
			$errmsgst="Select State.";
		}
		else
			if($ct=="null"){
				$errmsgct="Select City.";
			}
		else
			if( $_SESSION["security_code"]!=$_POST['captcha']){
				$errmsgcap="Invalid Captcha Code.";
			}
			else
			{
					include("connection.php");
					$pa1=md5($pa);
					$sql="insert into user_login(email,password,fname,lname,phone_no,state,city) values('$em','$pa1','$fn','$ln','$ph','$st','$ct')";
					$res=mysql_query($sql);
					if($res){
						header("location:login.php");
					}
			}
			
		
	}
?>

<hr color="lightgrey" size="1">
<br>

          	<div class="wrap">
				
    	      <h4 class="title">Create an Account</h4>
			  <br>
    		   <form method="post" action="">
    			 
				 <table>
				 <tr>
				 <td width="25%">Enter Your Email Id  </td>
				 <td><input  class="tb" type="text" placeholder="E-Mail"  id="email" name="email" value="<?php if(isset($_POST['submit'])) echo $em;?>"></td>
				 <td><span id="msgemail" style="display:none"><span></td>
				 </tr>
				 
				 <tr><td><br></td></tr>
				 
				 <tr>
				 <td>Enter Your Password </td>
				 <td><input  class="tb" type="password" placeholder="Password"  id="pass" name="pass" value="<?php if(isset($_POST['submit'])) echo $pa;?>"></td>
				 <td><span id="msgpass"><span></td>
				 </tr>
				 
				  <tr><td><br></td></tr>
				  
				 <tr>
				 <td>Enter First Name </td>
				 <td><input  class="tb" type="text" placeholder="First Name"  id="fname" name="fname" value="<?php if(isset($_POST['submit'])) echo $fn;?>"></td>
				 <td><span id="msgfname"><span></td>
				 </tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td>Enter Last Name </td>
				<td><input  class="tb" type="text" placeholder="Last Name"  id="lname" name="lname" value="<?php if(isset($_POST['submit'])) echo $ln;?>"></td>
				<td><span id="msglname"><span></td>
				</tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td>Enter Phone Number </td>
				<td><input  class="tb" type="text" placeholder="Phone Number" id="phone" name="phone" value="<?php if(isset($_POST['submit'])) echo $ph;?>"></td>
				<td><span id="msgphone"><span></td>
				</tr>
				
				 <tr><td><br></td></tr>
				 
				<tr>
				<td>Select State  </td>
				<td>
		    	<select class="tb" id="state" name="state" class="frm-field required">
		            <option value="null" >--Select a State--</option>         
		            <?php
						include("connection.php");
						$sql="select * from states order by state";
						$res=mysql_query($sql);
						while($row=mysql_fetch_array($res)){
							$s_id=$row['id'];
							?>
							<option value="<?php echo $s_id;?>" <?php if(isset($_POST['submit'])){ if($st==$s_id){ echo "selected";}}?>><?php echo $row['state'];?></option>
						<?php
						}
					?>
		         </select>
				 </td>
				 
				 <td><font color="red"><?php if(isset($_POST['submit'])) echo $errmsgst;?></font></td>
				 </tr>
				 
				  <tr><td><br></td></tr>
				  
				<tr>
				<td>Select City</td>
				<td>
		         <select class="tb" id="city" name="city" class="frm-field required">
		            <option value="null" >--Select a City--</option>         
		            
		         </select>
				</td>
				<td><font color="red"><?php if(isset($_POST['submit'])) echo $errmsgct;?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				
				<tr>
				<td></td>
				<td><img src="captcha.php"></td>
				<td></td>
				</tr>
		
				 <tr><td><br></td></tr>
				 
				<tr>
				<td>Enter Captcha Code </td>
				<td><input class="tb" type="text" placeholder="Enter Captcha Code" id="captcha" name="captcha" maxlength="5"></td>
				<td><font color="red"><?php if(isset($_POST['submit'])) echo $errmsgcap; ?></font></td>
				</tr>
				
				 <tr><td><br></td></tr>
				 
				<tr>
				<td></td>
				<td><button class="grey" id="reg" name="submit">Submit</button></td>
				<td><p class="terms">By clicking 'Create Account' you agree to the <a href="terms_conditions.php">Terms &amp; Conditions</a>.</p></td>
				</tr>
				
		       
		
			
		   </table>
		    <div class="clear"></div>
			
		    </form>
			
    	</div>
	
	<br>
<?php
	include("master3.php");
?>