<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>


		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- start details -->
<script src="js/slides.min.jquery.js"></script>
   <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
	<!-- start zoom -->
	<link rel="stylesheet" href="css/zoome-min.css" />
	<script type="text/javascript" src="js/zoome-e.js"></script>
	<script type="text/javascript">
		$(function(){
		$('#img1,#img2,#img3,#img4,#img5').zoome({showZoomState:true,magnifierSize:[250,250]});
	});
	</script>	
<!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>



</head>
<body>


     <div class="header-top">
	   <div class="wrap"> 
			 <div class="header-top-left">
			 
			 <div class="cssmenu">
			  	  <ul>
					<li class="active">Quick Tools : </a></li> 
					<li><a href="on_road_price.php">Find On Road Price</a></li> |
					<li><a href="road_side_assistance.php">Road Side Assistance</a></li> 
					
				</ul>
   				  </div>
   				    <div class="clear"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<?php
					if(isset($_SESSION['usersession'])){
					echo "<li><a href='my_account.php'>My Account</a></li> |";
					echo "<li><a href='logout.php'>Log Out</a></li> ";
					}else
					{
					echo "<li><a href='login.php'>Log In</a></li> |";
					echo "<li><a href='register.php'>Sign Up</a></li>";
					}
					?>
					
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.php"><img src="images/simage.png" alt="" height="45" width="200"></a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li class="active grid"><a href="index.php">Home</a></li>
			<li><a class="color4" href="#">New Car</a>
				<div class="megapanel">
					
						<div class="col1">
							<div class="h_nav">
								<h4><a href="newcar.php">Search New Cars</a></h4>
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4><a href="upcoming.php">Upcoming Cars</a></h4>
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4><a href="latest.php">Latest Cars</a></h4>
							</div>												
						</div>
						
						<div class="col1">
							<div class="h_nav">
								<a href="on_road_price.php"><h4>On Road Price</h4></a>
							</div>												
						</div>
					  </div>
					
				</li>				
				<li><a class="color5" href="#">Used</a>
				<div class="megapanel">
					<div class="col1">
							<div class="h_nav">
								<a href="usedcar.php"><h4>Search Used Cars</h4></a>
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="used_car_in_city.php"><h4>Cars In Your City</h4></a>
							</div>							
						</div>
						
						
					</div>
				</li>
				<li><a class="color6" href="sellcar.php">Sell</a></li>
				<li><a class="color7" href="compare.php">Compare</a></li>
				<li><a class="color5" href="#">More</a>
				<div class="megapanel">
					<div class="col1">
							<div class="h_nav">
								<a href="new_car_dealer.php"><h4>New Car Dealers</h4></a>
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="road_side_assistance.php"><h4>RoadSide Assistance</h4></a>
							</div>							
						</div>
						
						<div class="col1">
							<div class="h_nav">
								<a href="view2.php"><h4>User Reviews</h4></a>
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="write_review.php"><h4>Write Review</h4></a>
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<a href="emi_cal.php"><h4>EMI Calculator</h4></a>
							</div>												
						</div>
					</div>
				</li>
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
        
	  
    </div>
     <div class="clear"></div>
     </div>
	</div>
	