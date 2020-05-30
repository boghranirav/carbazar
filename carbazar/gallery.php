<!DOCTYPE html>
<html lang="en">
<head>
<title>Gallery</title>


<link rel="stylesheet" href="photossss/css/touchTouch.css">
<link rel="stylesheet" href="photossss/css/style.css">
<script src="photossss/js/jquery.js"></script>
<script src="photossss/js/jquery.equalheights.js"></script>
<script src="photossss/js/jquery.ui.totop.js"></script>
<script src="photossss/js/touchTouch.jquery.js"></script>
<script>
  $(window).load(function(){
    $().UItoTop({ easingType: 'easeOutQuart' });
    $('.gallery1 .gall_item').touchTouch();
  }); 
</script>
</head>

<body>
  <div class="main">
<section id="content" class="gallery1">
  <div class="container">
    <div class="row">
	<?php
			include("connection.php");
												$sqlp="select * from photos where car_id=187";
												$resp=mysql_query($sqlp);
												$i=0;
												while($rowp=mysql_fetch_array($resp)){
	?>
      <div class="grid_2">
       
          <div class="maxheight" style="width:130px;height:75px"><a href="#">
</a><a href="<?php echo "admin/upload_car/image/".$rowp['name']; ?>" class="gall_item"><img src="<?php echo "admin/upload_car/image/".$rowp['name']; ?>" alt="" style="width:130px;height:75px"></a></div>
       
      </div>
	  <?php
												}
	  ?>
     
    </div>
  </div>
</section>

<!--==============================
              footer
=================================-->


</div>
</body>

</html>

