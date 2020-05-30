<?php
	include("master.php");
	
?>
<?php
include("faq_master.php");
?>

<?php
	$fid=$_GET['faqid'];
	include("connection.php");
	$sqlr="select * from faqs where faq_id=$fid";
	$resr=mysql_query($sqlr);
	if(mysql_num_rows($resr)<=0){
		header("location:view_faq.php");
	}
	$rowr=mysql_fetch_array($resr);
	$fq=$rowr['question'];
	$fa=$rowr['answer'];
	$fv=$rowr['visible'];
	
?>

<?php
	if(isset($_POST['submit'])){
		$faqq=$_POST['faq_q'];
		
		$faqa=$_POST['faq_a'];
		
		if(isset($_POST['faq_hide'])){
			$faqv="yes";
		}else
		{
			$faqv="no";
		}
		
		$errmsg['q']="";
		$errmsg['a']="";
		
		if($faqq==""){
			$errmsg['q']="*Enter Question.";
		}
		if($faqa==""){
			$errmsg['a']="*Enter Answer.";
		}
		
		if($errmsg['q']=="" && $errmsg['a']==""){
			include("connection.php");
			$sql="update faqs set question='$faqq',answer='$faqa',visible='$faqv' where faq_id='$fid'";
			$res=mysql_query($sql);
			if($res){
				header("location:view_faq.php");
			}
		}
	}
?>

					<h1 class="page-header">FAQ Edit Form</h1>
					<br>
					<form method="post" action="#">
					<table width="100%">
					<tr>
						
                        <td width="20%">
									<label>Enter Question :</label>
						</td>
						<td width="64%">
									<div class="col-lg-11">
									<input class="form-control" placeholder="Enter FAQ Question" name="faq_q" id="faq_q" value="<?php echo $fq; ?>">
									</div>
						</td>
						<td width="20%">
							<font color="red">
								<?php
									if(isset($_POST['submit'])){
										echo $errmsg['q'];
									}
								?>
							</font>
						</td>
					</tr>
					
					<tr>
						<td>
									<label>Visibility :</label>
						</td>
						
						<td>
						&nbsp;&nbsp;&nbsp;
							                    <label>
												    <input type="checkbox" value="" style="height:18px; width:18px;" value="yes" name="faq_hide" <?php if($fv=="yes"){echo "checked";}?>/>
													<font size="4cm"><b style="font-weight: normal;">Hide FAQ	</b></font>
                                                </label>
                            
						</td>
						<td>
						
						</td>
					</tr>
					
					<tr>
						
                        <td>
									<label>Enter Answer :</label>
						</td>
						<td>
									<div class="col-lg-11">
									<textarea class="form-control" placeholder="Enter FAQ Answer" name="faq_a" id="faq_a"  rows="4"><?php echo $fa; ?></textarea>
									</div>
									
						</td>
						<td>
							<font color="red">
								<?php
									if(isset($_POST['submit'])){
										echo $errmsg['a'];
									}
								?>
							</font>
						</td>
					</tr>
					
					<tr>
					<td>
						<br>
						
					</td>
					<td>
						<br>	
						&nbsp;&nbsp;&nbsp;
									<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add FAQ" style="width:7.8cm">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="view_faq.php" class="btn btn-primary" style="width:7.8cm">View FAQ List</a>
						</td>
					<td></td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					</form>

<?php
include("form_master2.php");
?>