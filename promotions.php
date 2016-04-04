<?php
include_once('includes/config.php');
include_once('includes/header.php');
	$data=file_get_contents('cms_contents/promotions.dat');
	$promo=unserialize($data);
	$td = date('Ymd');
	if(isset($_REQUEST['promocode'])){
		$selected=$_REQUEST['promocode'];
		$temp = explode("/",$promo[$selected]['field2']);
		$start = $temp[2].$temp[1].$temp[0];
		$temp = explode("/",$promo[$selected]['field3']);
		$end = $temp[2].$temp[1].$temp[0];
		if($td<$start || $td>$end) $selected = "";
	}
?>
<html>
<head>
<title>Royal Derby Hotel Promotions</title>
<style>
html,body {
	background-image: url(../images/back.png);
	margin: 0 auto;
	align: center;
	text-align: center;
	padding: 0px;
	margin: 0px;
}
.container{
	height:100%;
	width:100%;
	padding:10px;
}
.main{
	background-color:white;
	width:1000px;
	min-height:100%;
	margin:0 auto;
}
#logo_img {
position: absolute;
top: 0px;
z-index: 2000;
}
.header{
	background-color:black;
	color:#C99E64;
	font-size:14px;
	font-weight: bold;
	font-family: arial;
	padding:2px;
	margin:0 auto;
	clear:both;
}
.spacer{
	height:15px;
	width:100%;
}
.spacer100{
	height:100px;
	width:100%;
}
.promo_item{
	border:1px solid #555;
	background-color:#ccc;
	padding:5px;
	font-family: 'helvetica neue';
	font-size:16px;
	font-weight: 200;
	width:400px;
	text-align: center;
	margin:0 auto;
	cursor:pointer;
}
.feature{
	font-family: 'helvetica neue';
	margin:0 auto;
}
.feature_text h1{
	width:50%;
	font-family: 'helvetica neue';
	font-weight: 200;
	font-size:36px;
	float:right;
}
.feature_image{
	width:50%;
	float:left;
}
</style>
</head>
<body>
<?php if($selected==""){ ?>
	<div style="background-color:white;">
			<div class="spacer100"></div>
			<img src="images/promo.png" align="middle" width="100%">
			<?php
				foreach($promo as $row) {
					$temp = explode("/",$row['field2']);
					$start = $temp[2].$temp[1].$temp[0];
					$temp = explode("/",$row['field3']);
					$end = $temp[2].$temp[1].$temp[0];
					if($td>=$start && $td<=$end){
			?>
	<div class="spacer"></div>
				<div class="promo_item" onclick="window.open('promotions.php?promocode=<?php print $row['id']; ?>','_parent');"><?php print $row['field1']; ?></div>

			<?php }} ?>
		</div>
<?php } else { ?>
	<div style="background-color:white;">
	<div class="spacer"></div>
	<div class="spacer"></div>
	<div class="spacer"></div>
		<div class="feature">
			<div class="feature_image"><img src="<?php print $promo[$selected]['field4']; ?>" width="100%"></div>
			<div class="feature_text"><h1><?php print $promo[$selected]['field1']; ?></h1><?php print $promo[$selected]['memo1']; ?></div>
			<div style="clear:both"></div>
		</div>
	</div>
<?php } ?>
</body>
</html>
