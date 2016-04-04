<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>

<!-- bxSlider CSS file -->
<link href="jquery.bxslider.css" rel="stylesheet" />


<script type="text/javascript" src="js/analytics.js"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" src="js/jquery.gallery.0.3.js"></script>
<link href="css/jquery.gallery.css" type="text/css" rel="stylesheet" />

<link rel="shortcut icon" href="images/favicon.ico" >
<link rel="icon" type="image/gif" href="images/animated_favicon1.gif" >

<link rel="stylesheet" type="text/css" media="all" href="css/jquery-ui-1.10.3.custom.min.css"; />
<link rel="stylesheet" type="text/css" media="all" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />


<title><?php echo(SITE_TITLE); ?></title>
</head>
<body>

<div id="fb-root"></div>

<script>
$(document).ready(function() {
  $('.bxslider').bxSlider({
    mode: 'fade',
    speed: 1500,
    auto: true,
		pause: 6000,
		pager: false
  });
});
</script>

<script>
jQuery(function($){
    $( '.mobile-nav' ).click(function(){
    $(".responsive-menu").fadeToggle(600);
 })

 $( '.close' ).click(function(){
 $(".responsive-menu").fadeToggle(600);
})

 $( '.response' ).click(function(){
 $(".close").fadeOut();
  })
})
</script>

	<div id="header_content">
		<a href='index.php?page=home'><img src='images/logo1.png' alt='Logo' id='logo_img'/></a>
	<div class="social-header">
		<a href="https://twitter.com/RoyalDerbyHotel"><i class="fa fa-twitter fa-lg"></i></a>
		<a href="https://www.facebook.com/RoyalDerbyHotel"><i class="fa fa-facebook fa-lg"></i></a>
	</div>

		<div id="menu">

			<div class="mobile-nav">
				<h1 class="menu">MENU<i class="fa fa-angle-down"></i></h1>
			 </div>

			 <div class="responsive-menu">
				 <ul>
					 <a class="response" href="#about"><li>FOOD & DRINK</li></a>
					 <a class="response" href="functions.php"><li>FUNCTIONS</li></a>
					 <a class="response" href="#use"><li>WHAT'S ON</li></a>
					 <a class="response" href="#work"><li>SOCIAL CLUB</li></a>
					 <a class="response" href="#contact"><li>ACCOMMODATION</li></a>
					 <a class="response" href="#contact"><li>CONTACT</li></a>
				 </ul>
				 <div class="close"><i class="fa fa-times fa-3x"></i></div>
			 </div>


			<table class="table" width="100%" cellspacing='0' cellpadding='0' height='32'>
				<tr>
			<?php

			$count=0;
			$spacerWidth=get_user_browser()=='ie'?'150':'172';
			foreach ($pages as $key => $val){
				echo "<td valign='center' align='center'>";
				$count++;
				if (substr($val, 0, 1) != '_'){
					$current=$page==$key?'current':'';
					echo '<a class="'.$current.' menu_item menu_link" href="index.php?page='.$key.'">'.$val.'</a>';
				}

			}
			?>
			</tr>
			</table>
		</div>
