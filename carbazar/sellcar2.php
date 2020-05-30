<?php

	include("master1.php");
if(isset($_SESSION['userid'])){
	
}
else
{
	header("location:login.php");
}
?>
<title>Sell Car</title>
<link href="css/textbox.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>

<script language="javascript">
function addElement() {
  var ni = document.getElementById('myDiv');
  var numi = document.getElementById('theValue');
  var num = (document.getElementById('theValue').value -1)+ 2;
  numi.value = num;
  var newdiv = document.createElement('div');
  
  var divIdName = 'file'+num;
  newdiv.setAttribute('id',divIdName);
  var divIdName1 = 'caption'+num;
  newdiv.setAttribute('id',divIdName1);
  
  newdiv.innerHTML = "<br>&nbsp;&nbsp;&nbsp;&nbsp;<input type='file' id='"+divIdName+"' name='"+divIdName+"'>";
  ni.appendChild(newdiv);
  document.frmaddcontest.tcount.value = num;
  
  
  
}
function removeElement(divNum) {
	var d = document.getElementById('myDiv');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
</script>
<?php
	include("master2.php");
?>




<hr color="lightgrey" size="1">
<br>

          	<div class="wrap">
				
    	      <h4 class="title" >Sell Car Step 2</h4>
			  <br>
			   <center>
    		   <form method="post" action="#" enctype="multipart/form-data" name="frmaddcontest">
    			 <div style="height:800px;width:750px" align="center">
				
				 <table>
				
				<tr>
					<td  width="200px">Select Model :</td>
					<td>
						<select class="tb" name="select_v">
						<?php
						$eid=$_SESSION['usersession'];
							include("connection.php");
							$sqlm="select * from car_sell cs,car_version cv where cs.email_id='$eid' and cs.version=cv.v_id";
							$resm=mysql_query($sqlm);
							
							while($rowm=mysql_fetch_array($resm)){
								$nam=$rowm['s_name'];
								$ui=$rowm['u_id'];
								$vrs=$rowm['version'];
						?>
								<option value="<?php echo $rowm['saler_id'];?>"><?php echo $rowm['version_name'];?></option>;
						<?php
							}
						?>
						</select>
					</td>
					<td></td>
				</tr>
				
				
<?php
	if(isset($_POST['submit'])){
	 	$img=$_FILES["file1"]["name"];
		$nam=$_POST['select_v'];
		$err['img']="";
		
	
		if(empty($_FILES["file1"]["name"]))
	{
		$err['img']="Please Select Image.";
	}
	else
	{
			for($i=1;$i<=$_POST['tcount'];$i++)
			{
				if(!empty($_FILES["file".$i]["name"]))
				{
					 
					$fileName = $nam."_".$vrs."_".$i.".jpg";
					
					$myextension= strtolower(strrchr($_FILES["file".$i]["name"],"."));
					if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png")
					{
						if ($_FILES["file".$i]["error"] > 0)
						{
							$err['img']=$_FILES["file".$i]["error"] . "<br />";
						}
						else
						{
								move_uploaded_file($_FILES["file".$i]["tmp_name"],"admin/upload_car/sell/".$fileName);
								$img_path[$i]=$fileName;
						}
					}
					else
					{
						$err="Please upload image file...";
					}
				}	
			}
	
		if($err['img'] == "")
		{
			for($i=1;$i<=$_POST['tcount'];$i++)
			{
					include("connection.php");
					$sql2="insert into sell_car_photo set saler_id=".$nam." , u_id=".$ui." ,version_id=".$vrs.",photo_src='".$img_path[$i]."'";
	
				$res2=mysql_query($sql2);
				if($res2)
				header("location:my_used_car.php");
			}
				//	echo "<script>location.href='photo_add.php?id=$_REQUEST[photo_id]&res=added';</script>";
		}	
	}
	/*	
if(!empty($img))
{
	$uid=$_SESSION['userid'];
	
	
	include("connection.php");
	
	
	$sql3="select * from car_sell where u_id=$uid and version=$vrs and mfg_year='$mfyear'";
	$res3=mysql_query($sql3);
	$row3=mysql_fetch_array($res3);
	$up=$row3['u_id'];
	$sp=$row3['saler_id'];
	
	
		for($i=1;$i<=$_POST['tcount'];$i++)
			{
				if(!empty($_FILES["file".$i]["name"]))
				{
					 
					$fileName =$_FILES["file".$i]["name"];
					
					
								move_uploaded_file($_FILES["file".$i]["tmp_name"],"admin/upload_car/sell/".$fileName);
								$img_path[$i]=$fileName;
						
					
				}	
			}
			
			for($i=1;$i<=$_POST['tcount'];$i++)
			{
				include("connection.php");
					$sql2="insert into sell_car_photo set saler_id=".$sp." , u_id=".$up." ,version_id=".$vrs.",photo_src='".$img_path[$i]."'";
	
				$res2=mysql_query($sql2);
				if(($res) && ($res2))
				header("location:index.php");
			}
		
	
	
	
	
}*/

		
	  

}
?>

				 <tr><td><br></td></tr>
				 
				 				
				<tr >
		    	<td width="200px"><b>Upload Image: </b></td>
		    	<td width="200px">
				&nbsp;&nbsp;&nbsp;
				<input type="file" name="file1" id="file" />
				</td>
				<td width="200px"><br><font color="red"><?php if(isset($_POST['submit'])){ echo $err['img'];}?></font></td>
         		</tr>
				<tr><td><br></td></tr>
				
				<tr >
		    	<td>&nbsp;&nbsp;</td>
		    	<td><input type="hidden" value="1" id="theValue"  name="theValue"/>
<input type="hidden" name="tcount" value="1">

<div id="myDiv"> </div><p><a href="javascript:;" onClick="addElement(); " ><font color="green" >Add Another </font></a></p></td>
       <td></td>     
     		  </tr>
         
            <tr><td><br></td></tr>		 
			
			<tr>
				<td></td>
				<td><button class="grey" id="reg" name="submit">Submit</button></td>
				<td></td>
				</tr>
				
		       
		
			
		   </table>
		   
		   </div>
		    <div class="clear"></div>
			
		    </form>
			</center>
			
    	</div>
		<br><br>
	
	<br>
<?php
	include("master3.php");
?>