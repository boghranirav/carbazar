
<?php
session_start();
?>
<?php
if(isset($_POST['p_id'])){
					
						echo "<input id='price2' class='form-control' placeholder='Enter Price' value='0' name='c_price2' size='25'>";
					
					
}
?>

<?php
if(isset($_REQUEST['p2_id'])){
$id=$_SESSION['r_id'];

include("connection.php");
$qq=mysql_query("select *from on_road_price o,states s where road_id='$id' and o.state_id=s.id");

while($row=mysql_fetch_array($qq))
{
	$pri2=$row['price2'];
}


						echo "<input id='price2' class='form-control' placeholder='Enter Price' value='".$pri2."' name='c_price2' size='25'>";
}
?>