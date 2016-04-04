<?php
	session_start();

	DEFINE('ANALYTICS','UA-33570877-1');
	DEFINE('SITE_TITLE','Royal Derby Hotel');

	$ips[] = "27.32.159.195"; //Bonntech

	$db_db = "royald_db";
	$db_user = "royald_user";
	$db_password = "78p&Mts{VnqN";

	$conn = mysql_connect('localhost',$db_user,$db_password);
	$db = mysql_select_db( $db_db,$conn);

	$pages = array(
			'food_drink'    => 'Food & Drink',
			'functions'     => 'Functions',
			'latest_news'   => 'What\'s On',
			'social_club'   => 'Social Club',
			'accomodation'  => 'Accommodation',
			'visit_us'      => 'Contact',
	);

	$conn = mysql_connect('localhost',$db_user,$db_password);
	$db = mysql_select_db( $db_db,$conn);

	function all_members() {
		global $conn;
		$members = array();
		$sql = "SELECT * FROM social s ORDER BY s.member_number ASC;";
		$result = mysql_query($sql, $conn);
		if(!$result) {
			die(mysql_error());
		} else {
			while($row = mysql_fetch_assoc($result)) {
				$members[] = $row;
			}
		}
		return $members;
	}

	function all_member_numbers() {
		global $conn;
		$sql = "SELECT GROUP_CONCAT(s.member_number) as members FROM social s ORDER BY s.member_number ASC;";
		$result = mysql_query($sql, $conn);
		if(!$result) {
			die(mysql_error());
		} else {
			if($row = mysql_fetch_assoc($result)) {
				$members = explode(",",$row['members']);
			}
		}
		return $members;
	}
	function insert_member($details) {
		global $conn;
		$sql = "INSERT INTO social SET FirstName = '".$details['FirstName']."', LastName = '".$details['LastName']."', DOB = '".$details['DOB']."', Email = '".$details['Email']."', payment_method = '".$details['payment_method']."', payment_reference = '".$details['payment_reference']."', member_number = '".next_available()."', `SESSION_IP` = '".$details['SESSION']."';";
		mail("bonntech_bugs@outlook.com","BONNMON REQUEST ".__FILE__." ".__LINE__,print_r($sql,1));
		mail("bonntech_bugs@outlook.com","BONNMON REQUEST ".__FILE__." ".__LINE__,print_r($details,1));
		$result = mysql_query($sql, $conn);
		if(!$result) {
			die(mysql_error());
		} else {
			return get_member_by_id(mysql_insert_id());
		}
		return array();
	}
	function update_member($id, $details) {
		global $conn;
		foreach($details as $k => $v) {
			$updates[] = $k." = '".$v."'";
		}
		$sql = "UPDATE social SET ".implode(", ",$updates)." WHERE id=".$id." LIMIT 1";
		$result = mysql_query($sql, $conn);
		return($result);
	}

	function get_member_by_id($id) {
		global $conn;
		$sql = "SELECT * FROM social WHERE id='".$id."' LIMIT 1;";
		$result = mysql_query($sql, $conn);
		if(!$result) {
			die(mysql_error());
		} else {
			if($row = mysql_fetch_assoc($result)) {
				return $row;
			}
		}
		return array();
	}
	function get_member_by_session($session) {
		global $conn;
		$sql = "SELECT * FROM social WHERE SESSION_IP='".$session."' LIMIT 1;";
		$result = mysql_query($sql, $conn);
		if(!$result) {
			die(mysql_error());
		} else {
			if($row = mysql_fetch_assoc($result)) {
				return $row;
			}
		}
		return array();
	}

	function next_available() {
		$next = 0;
		$cntr = 100;
		$used = all_member_numbers();
		while($next ==0) {
			$cntr++;
			if(!in_array($cntr,$used)) {
				$next = $cntr;
			}
			if($cntr > 999999) {
				$next = 999999; //avoiding infinite loops
			}
		}
		return $next;
	}

	function get_user_browser()
	{
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$ub = '';
		if(preg_match('/MSIE/i',$u_agent))
		{
			$ub = "ie";
		}
		elseif(preg_match('/Firefox/i',$u_agent))
		{
			$ub = "firefox";
		}
		elseif(preg_match('/Chrome/i',$u_agent))
		{
			$ub = "chrome";
		}
		elseif(preg_match('/Safari/i',$u_agent))
		{
			$ub = "safari";
		}

		elseif(preg_match('/Flock/i',$u_agent))
		{
			$ub = "flock";
		}
		elseif(preg_match('/Opera/i',$u_agent))
		{
			$ub = "opera";
		}

		return $ub;
	}
