<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../includes/config.php");
$sql = "select * from promo order by title";
$query = mysql_query($sql);

?>
<style>
	.item{
		padding:5px;
		width:600px;
		border:1px solid #bbb;
		background-color:#ddd;
		font-family:'helvetica neue';
		font-size:18px;
		font-weight: 200;
	}
	.itemdate{
		float:right;
	}
</style>

<?php 
while($result = mysql_fetch_assoc($query)) {
	print "<div class='item' data-id='".$result['id']."'>".$result['title'];
	print "<div class='itemdate'>".date('d/m/Y',strtotime($result['date_start']))." - ".date('d/m/Y',strtotime($result['date_start']))."</div>";
	print "</div>";
}
?>
