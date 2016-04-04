<?php
if ($_GET['page'] == '')
    $page = 'home';
else
    $page = $_GET['page'];
include_once('includes/config.php');
include_once('includes/header.php');
?>
<!--
<div style="height:311px;width:182px; background-color:black;z-index:20000;position:absolute;margin-left:788px;
	-webkit-box-shadow: 8px 8px 6px -6px black;
	   -moz-box-shadow: 8px 8px 6px -6px black;
	        box-shadow: 8px 8px 6px -6px black;
"><a href="asasdasd/RDH NYE DL flyer2-01.png" target="blank"><img src="images/RDH-NYE-DL-flyer2-01-sml.png" border=0></a></div>
-->

<?
include_once('pages/'.$page.'.php');
?>
  </div>
</div><? //close of header_content div ?>
<? include_once('includes/footer.php');  ?>

<div style="clear:both"></div>
 <?php if(date('Y-m-d')<='2013-09-28'){ ?>
 <script type="text/javascript">
<? if($_GET['page']==""){ ?>
$(window).load(function(){
	//$('#promo_banner').fadeOut();
	$('#promo').dialog({modal: true, height:'740', width:'535', draggable: false, closeOnEscape: true, hide: 'explode', resizable: false});
});
<? } ?>
	$('#promo').click(function(){
		if($('#promo').css('display')=='block'){
			$('#promo').dialog('close');
			$('#promo_banner').fadeIn();
		}
	});
	$('#promo_banner').click(function(){
		$('#promo_banner').fadeOut();
		$('#promo').dialog({modal: true, height:'740', width:'535', draggable: false, closeOnEscape: true, hide: 'explode', resizable: false});
	});
</script>
<? } ?>
