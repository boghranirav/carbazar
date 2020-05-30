<?php
	include("master1.php");
?>
<title>Login Page</title>
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

        <div class="login">
          	<div class="wrap">
		
		<br>
								<div class="col_1_of_login span_1_of_login" style="width:500px">
				<div class="login-title">
	           		<h4 class="title">Feedback Form</h4>
					<div id="loginbox" class="loginbox">
				
						<form action="feedback.php" method="post">
						
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
							
						    <div class="remember" >
							    <input type="submit" name="submit" class="button" value="Submit">
								<div class="clear"></div>
							 </div>
					
						 </fieldset>
						 </form>
						 							 

					</div>
			    </div>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>

<?php
	include("master3.php");
?>