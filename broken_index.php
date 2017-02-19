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
<link href="css/iconeffects.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
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

</head>
<body>
<!-- header -->
<div class="banner w3l">
	<div class="head_top wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.3s">
		<div class="container">
			<div class="banner-right">
				<ul>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+123 2222 222</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com">mail@example.com</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="banner-info">
		<div class="container">
			<div class="profile-left wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<form action="update.php" method="post">
					<div class="login">
						<input type="text" name="Ename" placeholder="Equipment's name" required="" pattern=".{3,30}" title="Three or more characters">
						<input type="text" name="Campus" placeholder="Campus" required="">
						<input type="text" name="Building" placeholder="Building" required="">
						<input type="text" name="Room" placeholder="Room" required="" pattern=".{3,5}" title="Three to Five characters">
						<input type="text" name="Description" placeholder="Description" required="">
						<input type="text" name="Name" placeholder="Name" required="" pattern=".{2,50}" title="Please insert your true name">
						<input type="text" name="Email" placeholder="Email" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please, insert your e-mail correctly">
						<!--Upload photo -->
						<script type="text/javascript">

      function fileSelected() {

        var count = document.getElementById('fileToUpload').files.length;

              document.getElementById('details').innerHTML = "";

              for (var index = 0; index < count; index ++)

              {

                     var file = document.getElementById('fileToUpload').files[index];

                     var fileSize = 0;

                     if (file.size > 1024 * 1024)

                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';

                     else

                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';


              }

      }

      function uploadFile() {

        var fd = new FormData();

              var count = document.getElementById('fileToUpload').files.length;

              for (var index = 0; index < count; index ++)

              {

                     var file = document.getElementById('fileToUpload').files[index];

                     fd.append(file.name, file);

              }

        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener("progress", uploadProgress, false);

        xhr.addEventListener("load", uploadComplete, false);

        xhr.addEventListener("error", uploadFailed, false);

        xhr.addEventListener("abort", uploadCanceled, false);

        xhr.open("POST", "savetofile.aspx");

        xhr.send(fd);

      }

      function uploadProgress(evt) {

        if (evt.lengthComputable) {

          var percentComplete = Math.round(evt.loaded * 100 / evt.total);

          document.getElementById('progress').innerHTML = percentComplete.toString() + '%';

        }

        else {

          document.getElementById('progress').innerHTML = 'unable to compute';

        }

      }

      function uploadComplete(evt) {

        /* This event is raised when the server send back a response */

        alert(evt.target.responseText);

      }

      function uploadFailed(evt) {

        alert("There was an error attempting to upload the file.");

      }

      function uploadCanceled(evt) {

        alert("The upload has been canceled by the user or the browser dropped the connection.");

      }

    </script>

  <form id="form1" enctype="multipart/form-data" method="post" action="Upload.aspx">
    <div>
     <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();" accept="image/*" capture="camera" />
    </div>
     <div id="details">
	 </div>
    <div id="progress">
	</div>
   </form>
   <input type="submit" value="Submit" >
					</div>
					</form>
			</div>
		</div>
	</div>
</div>

<!-- //header -->
<!-- navigation -->
<div class="header w3ls wow bounceInUp" data-wow-duration="1s" data-wow-delay="0s">
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
									<a class="navbar-brand link link--yaku" href="index.html">SIIT BE REPORT</a>
								</h1>

							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
								<nav class="cl-effect-1">
									<ul class="nav navbar-nav ">
										<li><a class="hvr-overline-from-center active" href="index.html">Home</a></li>
										<li><a class="hvr-overline-from-center" href="about.php">About</a></li>
										<li><a class="hvr-overline-from-center" href="report.php">Report</a></li>
									</ul>
								</nav>
							</div><!-- /navbar-collapse -->
						</nav>
	</div>
</div>

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
