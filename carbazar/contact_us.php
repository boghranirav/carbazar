<?php
	include("master1.php");
?>


<title>Contact Us|CarBazar</title>
<?php
	include("master2.php");
?>


<?php
		if(isset($_POST['submit'])){
			$fn=$_POST['f_name'];
			$fe=$_POST['f_email'];
			$fb=$_POST['f_back'];
			
			$errmsg['name']="";
			$errmsg['email']="";
			$errmsg['feedback']="";
			
			if($fn==""){
				$errmsg['name']="*Enter Name.";
			}
			
			if($fe==""){
				$errmsg['email']="*Enter Email Id.";
			}else
			if(!filter_var($fe, FILTER_VALIDATE_EMAIL)){
				$errmsg['email']="*In-Valid Email Id.";
			}
			
			if($fb==""){
				$errmsg['feedback']="*Enter Feedback.";
			}else
				if(is_numeric($fb)){
					$errmsg['feedback']="*Enter Proper Feedback.";
				}
			
			if($errmsg['name']=="" && $errmsg['email']=="" && $errmsg['feedback']==""){
				include("connection.php");
				$sql="insert into feedback(c_name,c_email,comment) values('$fn','$fe','$fb')";
				$res=mysql_query($sql);
				if($res){
					echo "<script>";
						echo "var v1=confirm('Your Feedback Is Submited To Us.');";
						echo "if(v1==true){";
						echo "window.location.assign('index.php');";
						echo "}";
						echo "</script>";
					
				}
			}
			
		}
?>


<hr color="lightgrey" size="1">
<br>

<div class="wrap">



<div class="main">


				<div style="width:600px;background:#F8F8FF;">
				
				 <ul class="breadcrumb breadcrumb__t" style="height:30px"><font size="4pt"><b style="font-weight:bold">Contact Us</b></font><hr></ul>
				
				<div style="margin-left:0.5cm;text-align:justify;width:570px">
				
				<br>
				<b style="font-weight: bold;">Address :</b> &nbsp;&nbsp;2nd  floor,Gajanand Park,vibhag-1, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Yogi chowk varachha,surat-395006
				<br>
				<br>
				<b style="font-weight: bold;">Contact Number :</b>8141217890
				<br>
				<br>
				<p>
				In case of any inquiry, feedback or request, please use the form below to contact us. We will get back to you as soon as possible.</p>
				<br>
				
				<div id="loginbox" class="loginbox">
				
						<form action="contact_us.php" method="post">
						
						  <fieldset class="input">
						  <font size="4cm">
						      Your Name 
							  <br>
							  <input type="text" name="f_name" value="<?php if(isset($_POST['submit'])){echo $fn;}?>" style="width:480px;height:22px;font-size:14pt">
							  <br>
							  <font color="red">
							  <?php
								if(isset($_POST['submit'])){
									echo $errmsg['name'];
								}
							  ?>
							  </font>
							  <br>
							  Email Address 
							  <br>
							  <input type="text" name="f_email" value="<?php if(isset($_POST['submit'])){echo $fe;}?>" style="width:480px;height:22px;font-size:14pt">
							  <br>
							   <font color="red">
							  <?php
								if(isset($_POST['submit'])){
									echo $errmsg['email'];
								}
							  ?>
							  </font>
							  <br>
							  Comments 
							  <br>
							  <textarea style="width:480px;font-size:14pt" rows="4" maxlength="199" name="f_back"><?php if(isset($_POST['submit'])){echo $fb;}?></textarea>
							  <br>
							  <font color="red">
							  <?php
								if(isset($_POST['submit'])){
									echo $errmsg['feedback'];
								}
							  ?>
							  </font>
							  <br>
							 </font>
							
						    <div class="remember" style="margin-right:2.2cm">
							    <input type="submit" name="submit" class="button" value="Submit">
								<div class="clear"></div>
							 </div>
					
						 </fieldset>
						 </form>
						 							 

					</div>
				
				
				
				</div>
				<br>
				</div>
				
					
</div>

</div>
	<div class="clear"></div>		

<br>
<?php
	include("master3.php");
?>

