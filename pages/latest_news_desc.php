<div id="latest_news_content_desc">

	<div class="spacer" style="height:100px;"></div>
	<div style="text-align:center;width:100%">
		<div class="seperator" style="width:200px;margin:0 auto;"></div>
		<div style="padding-top:10px;padding-bottom:8px" class="title">
			<em>Latest News</em>
		</div>
	</div>
	<div class="seperator" ></div>
	<div id="article_content">
	<?
	$data = unserialize(file_get_contents('cms_contents/latest_news.dat'));
	$news=$data[$_GET['id']];
	echo $news['memo1'];
	?>
	<a class="menu_link" href="index.php?page=latest_news" style="width:270px;text-align:center;">go back to all news stories</a>
	<br/>
	</div>
</div>