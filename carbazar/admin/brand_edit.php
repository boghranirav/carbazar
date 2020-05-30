<?php
	if(!isset($_GET['bid']) || ($_GET['bid']==null))
	{
		header("location:brand_view.php");
	}
include("form_master.php");
?>
<title>
Edit Brand
</title>

<?php
include("form_master1.php");
?>
<?php
 
//get olddata

$id=$_GET['bid'];

include("connection.php");
$olddata=mysql_query("select *from car_make where brand_id='$id'");
if(mysql_num_rows($olddata)<=0){
	header("location:brand_view.php");
}
while($row=mysql_fetch_array($olddata))
{
$nm=$row['car_company'];
}

?>

<?php
if(isset($_REQUEST['submit'])){
	
$model=$_POST['c_model'];

$imga=$_FILES['brand_img']['name'];

$imgsrc2="upload_car/brand/".$imga;
					move_uploaded_file($_FILES['brand_img']['tmp_name'],$imgsrc2);
					
					

if($model!=""){
include("connection.php");

$sql=mysql_query("update car_make set car_company='$model',imgsrc='$imgsrc2' where brand_id='$id'");
if($sql){
	$add='Data edited';
	header("location:brand_view.php");
}
else
{
	$add='Data Not Added';	
}
}
else
{
	$add='Invalid Input';
}
}
?>

                    <h1 class="page-header">Brand Form</h1>
					<br>
					<form method="post" action="#" enctype="multipart/form-data">
					<table>
					<tr>
						<td> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
						</td>
                        <td>
									<label>Edit Brand Name :</label>
									<input class="form-control" placeholder="Enter Model Name Here" name="c_model" size="25" value="<?php echo $nm;?>">
									
						</td>
						<td><br>&nbsp;&nbsp;
						<?php 
						
						if(isset($_POST['submit'])){
							echo "<label>".$add."</label>";
						}
						?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<br>
							<label>Select Symbol for Brand :</label>
								<input type="file" name="brand_img" class="btn btn-file btn-primary">
						</td>
						<td>
						
						</td>
					</tr>
					<tr>
					<td></td>
						<td>
						<br>			
									<input type="submit" class="btn btn-primary" name="submit" value="Edit Brand">
					&nbsp;&nbsp;&nbsp;
									<a href="brand_view.php" class="btn btn-primary">Cancel</a>
						</td>
					</tr>
					
					<tr>
					
					</tr>
					</table>
					</form>
					
                
<?php
include("form_master2.php");
?>