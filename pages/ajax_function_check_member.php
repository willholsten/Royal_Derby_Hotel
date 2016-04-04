<?php
	include_once('../includes/config.php'); 
	$sql = "SELECT * FROM social WHERE member_number='".$_POST['member_number']."' LIMIT 1";
	$result = mysql_query($sql);
	if(!$result) {
		$return['error'] = "Record load error.";
		die("error");
	} else {
		$row = mysql_fetch_assoc($result);
		die($row['id']);
	}
?>