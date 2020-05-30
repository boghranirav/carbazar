<?php
include("form_master.php");
?>
<title>
Add Photo
</title>
<?php
include("form_master1.php");
?>
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
							url:"version_sql_3.php",
							type:"post",
							data:{b_id:id},
							success:function(result){
								//alert(result);
								$("#m_id").html(result);
						
								
							}
						});
					}
				
				});
			
			});	
	</script>

<?php 
	
$err="";
@$img_path=array();
if(isset($_POST['submit']))
{

	if(empty($_FILES["file1"]["name"]))
	{
		$err="Please Select Path of Image..";
	}
	else
	{
			for($i=1;$i<=$_POST['tcount'];$i++)
			{
				if(!empty($_FILES["file".$i]["name"]))
				{
					 
					$fileName = date("YmdHis")."_".$_FILES["file".$i]["name"];
					
					$myextension= strtolower(strrchr($fileName,"."));
					if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png")
					{
						if ($_FILES["file".$i]["error"] > 0)
						{
							$err=$_FILES["file".$i]["error"] . "<br />";
						}
						else
						{
								move_uploaded_file($_FILES["file".$i]["tmp_name"],"upload_car/image/".$fileName);
								$img_path[$i]=$fileName;
						}
					}
					else
					{
						$err="Please Upload Image File..";
					}
				}	
			}
	
		if($err == "")
		{
			for($i=1;$i<=$_POST['tcount'];$i++)
			{
				include("connection.php");
					$sqlinsert = "insert into photos set brand_id=".$_POST['b_id']." , car_id=".$_POST['m_id'].", name='".$img_path[$i]."', date_added=now()";
					header("location:view_photos.php");
					mysql_query($sqlinsert) or die(mysql_error());
			}
				//	echo "<script>location.href='photo_add.php?id=$_REQUEST[photo_id]&res=added';</script>";
		}	
	}		
}
 
?>

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
  newdiv.innerHTML = "<br><input type='file' id='"+divIdName+"' name='"+divIdName+"'>";
  ni.appendChild(newdiv);
  document.frmaddcontest.tcount.value = num;
  
}
function removeElement(divNum) {
	var d = document.getElementById('myDiv');
  var olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
</script>


  <h1 class="page-header">Upload Images</h1>
										<br>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	
    <tr>
		<td>
		
		<form name="frmaddcontest" method="post" action="" onSubmit="return checkfrm();" enctype="multipart/form-data">

		<table align="center" width="80%" border="0" >

		    <tr>
				<td colspan="2" align="center"><span style="font-weight:800;"></span></td>
    		</tr>
			<tr>
			<td> <label>Choose A Brand :</label>
			</td>
			<td>
			<div class="col-lg-10">
                                                <select name="b_id"  id="b_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Brand--</option>
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
            </div>
			</td>
			<td width="20%">
			
			</td>
			</tr>
				<tr id="model">
				<td>
				<label>Choose A Model :</label>
				</td>
				<td>
				<div class="col-lg-10">
					<select name="m_id" id="m_id" class="validate[required] form-control">
												    
                                                    <option value="0">--Select a Model--</option>
                                                   
                                                </select>
								</div>
								
				</td>
				<td></td>
				<tr>
	 		<tr >
		    	<td width="20%"><b>Upload Image: </b></td>
		    	<td width="50%">
				&nbsp;&nbsp;&nbsp;
				<input type="file" name="file1" id="file" />
				</td>
    		</tr>
    		
			<tr >
		    	<td>&nbsp;</td>
		    	<td><input type="hidden" value="1" id="theValue"  name="theValue"/>
<input type="hidden" name="tcount" value="1">

<div id="myDiv"> </div><p><a href="javascript:;" onClick="addElement(); " class="btn btn-default btn-lg"><font color="#F00000">Add Another </font></a></p></td>
 		</tr>
		
			<tr >
			<td></td>
				<td >
				
				<input type="submit" class="btn btn-primary btn-lg btn-flat" name="submit" value="Add Image" onClick="">
				
				<input type="button" class="btn btn-primary btn-lg btn-flat" onClick="javascript:history.go(-1);" name="sub_butback" value=" Back ">
				</td>
				
			</tr>
			<tr>
		<td></td>
		<td>
		<font color="red">
		<?php
if(isset($_POST['submit'])){
	echo "<label>".$err."</label>";
}
?>
	</font>
   </td>
		</tr>
		</table>
		
</form>
</td>
</tr>
</table>

              

<?php
include("form_master2.php");
?>
