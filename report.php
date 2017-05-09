<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
require_once('connect.php');
session_start();
?>
<html>
<head>
<title>SIIT BE REPORT - Let every one report the broken equipment</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Real Site Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/swipebox.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- swipe box js -->
			<script src="js/jquery.swipebox.min.js"></script>
				<script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
			</script>
<!-- //swipe box js -->
</head>
<body>
<!-- navigation -->
<div class="header w3ls">
	<div class="container">
		<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header logo">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h1>
									<a class="navbar-brand link link--yaku" href="broken_index.php">REPORT</a>
								</h1>

							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="cl-effect-1">
									<ul class="nav navbar-nav ">
										<li><a class="hvr-overline-from-center " href="broken_index.php">Home</a></li>
										<li><a class="hvr-overline-from-center" href="about.php">About</a></li>
										<li><a class="hvr-overline-from-center active" href="report.php">Report</a></li>

									</ul>
								</nav>
							</div><!-- /navbar-collapse -->
		</nav>
	</div>
</div>
<!-- //navigation -->
<!-- contact -->
<div class="contact wthree all_pad">
	<div class="container">
		<h2 class="title">REPORT<span></span></h2>
			<div class="box" style="padding-left:10px;padding-right:10px;padding-bottom:30px">
        <div class="box-header">
          <h3 class="box-title" style="margin-top:10px"><b><center>Broken Equipment Detail</center></b></h3>
          <hr>
        </div>
		<div class="box" style="paddin-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;padding-bottom:20px">
          <div class="col-sm-3"></div>
          <div class="col-sm-10" style="margin-top:20px">
            <div class="input-group date">
              <div class="input-group-addon">
                <label>Search by Equipment's name</label>
              </div>
								<form action="report.php" method="post" id="search_equipment">
                  <input type="text" name="equipment_search" class="form-control pull-right" placeholder="โปรดใส่ชื่อ Equipment">
								</form>
              </div>
							<form action="report.php" method="post" id="reset_search"></form>
          </div>
          <button style="margin-top:20px" type="submit" class="btn btn-primary" form="search_equipment">Submit</button>
          <button style="margin-top:20px" type="submit" class="btn btn-danger" form="reset_search">Reset</button>
          <table id="example2" class="table table-bordered table-hover" style="width:100%;margin-top:20px" align="center">
            <thead>
        <table id="example2" class="table table-bordered table-hover" style="width:100%;margin-top:20px" align="center" >
          <thead>
            <tr>
              <td style="text-align:center;width:10%" >Number</td>
              <td style="text-align:center">Broken Equipment</td>
              <td style="text-align:center">Location</td>
              <td style="text-align:center">Desctiption</td>
			  <td style="text-align:center">User's name</td>
              <td style="text-align:center">Status</td>
              </tr>
          </thead>
          <?php
              if(isset($_POST['equipment_search'])){
                $q = 'SELECT * FROM broken_equipment WHERE equipment_name = "'.$_POST['equipment_search'].'";';
              }else{
                $q = 'SELECT * FROM broken_equipment ORDER BY equipment_ID DESC ';
              }
              $res = $db -> query($q);
              while($row = $res -> fetch_array()){
            ?>
          <body>
            <tr>
              <td style="text-align:center"><?php echo $row['equipment_ID']; ?></td>
              <td height="50px" width="200px" style="text-align:center;"><?php echo $row['equipment_name']; ?></td>
              <td width="20%" style="text-align:center"><?php echo $row['equipment_campus']; ?></td>
              <td width="30%" style="text-align:center"><?php echo $row['equipment_decription']; ?></td>
			  <td width="30%" style="text-align:center"><?php echo $row['equipment_username']; ?></td>
              <td width="20%" style="text-align:center"><?php echo $row['equipment_status']; ?></td>

                <form id="prof_form" action="brokenEquip_check.php" method="post">
					<input type="hidden" name="mode" value=0 >
                    <input type="hidden" name="equipment_no" value=<?php echo $row['equipment_ID']; ?> >
                    <input type="hidden" name="equipment_name" value=<?php echo $row['equipment_name']; ?> >
                    <input type="hidden" name="equipment_campus" value=<?php echo $row['equipment_campus']; ?> >
                    <input type="hidden" name="equipment_decription" value="<?php echo $row['equipment_decription']; ?>" >
                    <input type="hidden" name="equipment_status" value=<?php echo $row['equipment_status']; ?> >
                    <input type="hidden" name="equipment_building" value=<?php echo $row['equipment_building']; ?> >
                    <input type="hidden" name="equipment_room" value=<?php echo $row['equipment_room']; ?> >
                    <input type="hidden" name="equipment_email" value=<?php echo $row['equipment_email']; ?> >
                    </form>
              </td>
            </tr>
            <?php
            }
            ?>
          </body>
          </table>
        </div>
<!-- //contact -->
<!-- footer -->



<!-- //footer -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>
</html>
