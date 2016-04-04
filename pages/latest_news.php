<style>	
	.promo_item{
		width:24%;
		margin-right:5px;
		float:left;	
		cursor:pointer;
		padding:5px;
		border:1px solid black;
		font-size:12px!important;
	}
	.promo_item p{
		font-size:12px!important;		
	}
	.promo_item span{
		font-size:12px!important;		
	}
	
</style>


<span id="latest_news_span">
<center>
<span style="display:block;padding-top:105px;width:200px;" >
	<div class="seperator" style=""></div>
	<div class="title" style="padding-top:10px;padding-bottom:8px"><em>What's On</em></div>
</span>
<!--<span><strong><a href="http://www.eventbrite.com.au/e/luau-nye-party-at-the-derby-tickets-9271219467?aff=es2&rank=1" target="_blank">Luau NYE party at the derby</a></strong></span>-->
</center>
	<?
	
	$data = unserialize(file_get_contents('cms_contents/latest_news.dat'));

	$pdata=file_get_contents('cms_contents/promotions.dat');
	$promo=unserialize($pdata);
	$td = date('Ymd');

//if($_SERVER['REMOTE_ADDR']=="27.32.159.195"){
	?>

<div id="promo">
	
	<div class="promo_item" style=" float: none; margin: 0 auto;">
<!-- 			<a href="http://derbynye.eventbrite.com.au" target="_blank"><img src="cms_files/NYEPoster.jpg" width="100%"></a> -->
			
	</div>


<?php 
foreach($promo as $row) { 
	$temp = explode("/",$row['field2']);
	$start = $temp[2].$temp[1].$temp[0];
	$temp = explode("/",$row['field3']);
	$end = $temp[2].$temp[1].$temp[0];
	if($td>=$start && $td<=$end){
?>
	<div class="promo_item" onclick="window.open('promotions.php?promocode=<?php print $row['id']; ?>','_parent');">
			<img src="../<?php print $row['field4']; ?>" width="100%">
		<?php print $row['memo1']; ?>
	</div>
<?php }} ?>
<div style="clear:both"></div>
</div>	

<?php //} ?>

<center>
<span style="display:block;padding-top:15px;width:200px;" >
	<div class="seperator" style=""></div>
	<div class="title" style="padding-top:10px;padding-bottom:8px"><em>Latest News</em></div>
</span>
</center>

<table id="latest_news" >
<tr>
<?php 
$count=1;

foreach($data as $news){ 

if($count%4==0)

	echo "<tr>";
?>

	<td valign="top">
		<div class="seperator"></div>
		<a href="index.php?page=latest_news_desc&id=<?=$count-1?>" class="latest_news_link">
			<table cellspacing="0" cellpadding="0" width="100%">
				<tr ><td><img src="<?=$news['image']?>" alt="image" style="margin-top:10px;"/></td></tr>
				<tr><td><span style="margin-top:5px;text-transform:uppercase;font-size:9pt;"><strong><?=$news['title']?></strong></span></td></tr>
				<tr><td><span style="margin-top:5px;font-size:9pt"><?=$news['shortdesc']?></span></td></tr>
			</table>
		</a>

	</td>

<?
if($count%3==0)
	echo "</tr>";
$count++;
}?>
</table>
</span>