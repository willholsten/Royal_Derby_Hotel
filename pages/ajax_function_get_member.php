<?php
	include_once('../includes/config.php'); 
	$sql = "SELECT * FROM social WHERE id=".$_POST['id']." LIMIT 1";
	$result = mysql_query($sql);
	if(!$result) {
		$return['error'] = "Record load error.";
	} else {
		$row = mysql_fetch_assoc($result);
		$return['id'] = $row['id'];
		$return['social_firstname'] = $row['FirstName'];
		$return['social_lastname'] = $row['LastName'];
		$return['social_dob'] = $row['DOB'];
		$return['social_email'] = $row['Email'];
		$return['payment_reference'] = $row['payment_reference'];
		$return['payment_method'] = $row['payment_method'];
		$return['payment_date'] = $row['payment_date'];
		$return['member_number'] = $row['member_number'];
	}
	print_r(json_encode($return));	
?>