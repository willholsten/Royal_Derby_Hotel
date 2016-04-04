<table id="food_drink_content" cellspacing="0">
<tr>
	<td colspan="3"><img src='images/social_club.png' alt="Food & Drink" width="100%"/></td>
</tr>
</table>
<a href="javascript:void(0);" id="xmore_info_button" class="menu_link btn" style='text-align:center'>+ Add Member</a>
<?php 

	if($_POST['Login'] == "Submit") {
		if(($_POST['username'] == "admin") AND ($_POST['password'] == "override")) {
			$_SESSION['SESSION'] = "Admin:".md5($_SERVER['REMOTE_ADDR']);
		}
	}
	if($_GET['action'] == "logout") {
			unset($_SESSION['SESSION']);
	}
	//to be replaced with session/login
	if(isset($_SESSION['SESSION']) && (substr($_SESSION['SESSION'],0,5) == "Admin")) { 
		?>
            	&nbsp;<a href="index.php?page=members&action=logout" id="logout_button" class="menu_link btn" style='text-align:center'>- Logout</a>
            <?php
		if(($_REQUEST['action']=="new_member") ){
			
			if($_POST['id'] > 0) {
				$id = $_POST['id'];
				$details['FirstName'] = $_POST['social_firstname'];
				$details['LastName'] = $_POST['social_lastname'];
				$details['Email'] = $_POST['social_email'];
				$details['DOB'] = $_POST['social_dob'];
				$details['SESSION_IP'] = $_SERVER['REMOTE_ADDR'];
				$details['payment_reference'] = $_POST['payment_reference'];
				$details['payment_method'] = $_POST['payment_method'];
				$details['payment_date'] = $_POST['payment_date'];
				$details['member_number'] = $_POST['member_number'];
				
				$res = update_member($id, $details);
				$new_member['id'] = $id;
			} else {
				$details = $_POST;
				$details['FirstName'] = $_POST['social_firstname'];
				$details['LastName'] = $_POST['social_lastname'];
				$details['Email'] = $_POST['social_email'];
				$details['DOB'] = $_POST['social_dob'];
				$details['SESSION_IP'] = $_SERVER['REMOTE_ADDR'];
				if(!isset($_POST['FirstName'])) {
					print_r("Failed To Add, not enough details provided");
				} else {
					
					$new_member = insert_member($details);
				}
			}
		}
		if(($_REQUEST['action']=="delete") ){
			$details['active'] = 0;
			$id=$_GET['id'];
			$res = update_member($id, $details);
			$new_member['id'] = $_GET['id'];
		}
		if(($_REQUEST['action']=="activate") ){
			$details['active'] = 1;
			$id=$_GET['id'];
			$res = update_member($id, $details);
			$new_member['id'] = $_GET['id'];
		}
		
		$members = all_members();
		$output .= '<table id="member_list" class="dataTable" cellpadding="2" cellspacing="0" border="0" width="100%">';
		$output .= '<thead><th>#</th><th>Member</th><th>D.O.B</th><th>Payment Method(Reference)</th><th>Paid Date</th><th>Email</th><th></th></thead><tbody>';
		foreach($members as $member) {
			if($member['id']==$new_member['id']) {
				$hi = ' hilite';	
			} else {
				$hi = ' ';
			}
			if(!$member['active']) {
				$act = ' inactive';
				$del_btn = '<a class="yes" href="index.php?page=members&action=activate&id='.$member['id'].'"><img src="images/blank.gif" height="20px" width="20px" /></div>';
			} else {
				$act = '';
				$del_btn = '<a class="no" href="index.php?page=members&action=delete&id='.$member['id'].'"><img src="images/blank.gif" height="20px" width="20px" /></div>';	
			}
			$output .= "<tr class='member_row".$hi.$act."' data-id='".$member['id']."' ><td>".$member['member_number']."</td><td>".$member['FirstName']." ".$member['LastName']."</td><td>".$member['DOB']."</td><td>".$member['payment_method']." (".$member['payment_reference'].")</td><td>".date("d/m/Y",strtotime($member['payment_date']))."</td><td><a href='mailto:".$member['Email']."'>".$member['Email']."</a></td><td>".$del_btn."</td></tr>";
			//$output .= "<tr><td>".implode("</td><td>",$member)."</td></tr>";
		}
		$output .= '</tbody></table>';
		print_r($output);			
		$next = next_available();		
	
	} else {
		?>
        <h3>Restricted Area</h3>
        <form action="index.php?page=members" method="post" enctype="multipart/form-data" name="login">
        	<input placeholder="user" name="username" type="text" /><input name="password" type="password" placeholder="password" /><input name="Login" type="submit" value="Submit" />
        </form>
        <?
		//to be replaced with access code form
		
		die();	
	}
	
?>

<div id="join_social_modal">
    <div style="text-align:left;">
        <div class="seperator"></div>
        <div class="title">
        <em>The Royal Derby Social Club - Form</em>
        </div>
        <div class="seperator"></div>
        <form id="social_club" method="post" action="http://royalderbyhotel.com.au/index.php?page=members&action=new_member">
            <fieldset><input name="id" id="id" type="hidden" value="" />
            <div class="fieldlabel"><label for="social_name">Name</label></div>
            <div class="fielditem"><input type="text" name="social_firstname" id="social_firstname" placeholder="first name" size="15" class="text ui-widget-content ui-corner-all"></div>
            <div class="fielditem"><input type="text" name="social_lastname" id="social_lastname" placeholder="last name" size="15" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="social_email">Email:</label></div>
            <div class="fielditem"><input type="email" placeholder="email" name="social_email" id="social_email" size="39" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="social_dob">Birthdate:</label></div>
            <div class="fielditem"><input type="text" placeholder="dd/mm/yyyy" name="social_dob" id="social_dob" size="12" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="payment_reference">Payment Reference:</label></div>
            <div class="fielditem"><input type="text" placeholder="ex. In Person Payment" name="payment_reference" id="payment_reference" value="Social: RDSC456-123" size="39" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="payment_method">Payment Method:</label></div>
            <div class="fielditem"><input type="text" placeholder="CC,Cash,DD" name="payment_method" id="payment_method" size="12" value="CC" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="payment_date">Payment Date:</label></div>
            <div class="fielditem"><input type="text" placeholder="dd/mm/yyyy" name="payment_date" id="payment_date" size="16" value="<?=date("d/m/Y");?>" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="member_number">Member Number:</label></div>
            <div class="fielditem"><input type="text" name="member_number" id="member_number" size="12" value="<?= $next;?>" class="text ui-widget-content ui-corner-all"><span id='member_number_result'>whole number between 0 and 1000</span></div>
            <div class="fieldbreak"></div>
             <p class="validateTips">* All form fields are required.</p>
             </fieldset>
        </form>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
<script>
	 function checkLength( o, n, min, max ) {
		if ( o.val().length > max || o.val().length < min ) {
			o.addClass( "ui-state-error" );
			updateTips( "Length of " + n + " must be between " +
			min + " and " + max + "." );
			return false;
		} else {
			return true;
		}
	}
	 function checkRegexp( o, regexp, n ) {
		if ( !( regexp.test( o.val() ) ) ) {
			o.addClass( "ui-state-error" );
			updateTips( n );
			return false;
		} else {
			return true;
		}
	}
	
	 function updateTips( t ) {
		$( ".validateTips" )
		.text( t )
		.addClass( "ui-state-highlight" );
		setTimeout(function() {
			$( ".validateTips" ).removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}


	//$('#food_drink_content').leanModal({ top:"50px", closeButton: ".modal_close" });
	
	$(document).ready(function(){
		 var social_firstname = $( "#social_firstname" ),
			social_email = $( "#social_email" ),
			social_lastname = $( "#social_lastname" ),
			social_dob = $( "#social_dob" ),
			allFields = $( [] ).add( social_firstname ).add( social_email ).add( social_lastname ).add( social_dob );
		
		$('#member_list').dataTable();
		
		$('.member_row').click(function() {
			
			$.post("pages/ajax_function_get_member.php", {'id':$(this).attr("data-id")}, function( data ) {
				var json = $.parseJSON(data);
				$.each(json, function(index, value) {
					$("#"+index).val(value);
				});
			});
			$( "#join_social_modal" ).dialog( "open" );
		});
		
		$("#member_number").keyup(function() {
			$.post("pages/ajax_function_check_member.php", {'member_number':$(this).val()}, function( data ) {
				$("#member_number_result").removeClass("error").removeClass("okay");
				if(data > 0 && data != $("#id").val()) {
					$("#member_number_result").html("Member Exists: "+data);
					$("#member_number_result").addClass("error");
				} else {
					$("#member_number_result").html("Available");	
					$("#member_number_result").addClass("okay");
				}
			});	
		});
		
		$('#social_dob').datepicker({changeMonth: true,changeYear: true,dateFormat: 'dd/mm/yy', defaultDate: '-18y', yearRange: "<?= date("Y",strtotime("-90 year", time())); ?>:<?= date("Y",strtotime("-18 year", time())); ?>"});
		
		$('#join_social_modal').dialog({autoOpen: false,
			height: 'auto',
			width: 700,
			modal: true,
			 buttons: {
				"Update Register": function() {
				var bValid = true;
				allFields.removeClass( "ui-state-error" );
				bValid = bValid && checkLength( social_firstname, "social_name", 3, 16 );
				bValid = bValid && checkLength( social_lastname, "social_name", 3, 16 );
				bValid = bValid && checkLength( social_email, "social_email", 6, 80 );
				bValid = bValid && checkLength( social_dob, "social_dob", 5, 16 );
				// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
				bValid = bValid && checkRegexp( social_email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. example@royalderbyhotel.com.au" );
				if ( bValid ) {
					$("#email").val(social_email.val());
					$("#firstname").val(social_firstname.val());
					$("#lastname").val(social_lastname.val());
					$("#dob").val(social_dob.val());
					$("#social_club").submit();
				}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		$('#xmore_info_button').click(function() {
			$('#join_social_modal').dialog( "open" );
		});
	});
</script>
<style>
.error {
	color:#C00;
}
.okay {
	color: #0C0;
}
.ui-datepicker{
	font-size:9px;
}
.yes, .no {
	background-image:url(../images/yes_no.png);
	background-position: top;
	background-repeat: no-repeat;
	height: 20px;
	width: 20px;
	display:block;
}
.yes {
	background-position: top right;
}
.no {
	background-position: top left;
}
.fieldlabel{
	width:100px;
	float:left;
	margin-left:30px;
	font-family:helvetica,arial;
	padding:5px;
	color:#333333;
}
.fielditem{
	float:left;
	margin-left:20px;
	font-family:helvetica,arial;
}
.fielditem input{
	width:100%;
	font-family:helvetica,arial;
	padding:5px;
}
.fieldbreak{
	clear:both;
}
#join_social_modal {
	color: #000000;
}
#join_social_modal { font-size: 90%; }
#join_social_modal input.text { margin-bottom:12px; width:95%; padding: .4em; }
#join_social_modal fieldset { padding:0; border:0; margin-top:25px; }
#join_social_modal h1 { font-size: 1.2em; margin: .6em 0; }
.ui-dialog .ui-state-error { padding: .3em; }
#join_social_modal .validateTips { border: 1px solid transparent; padding: 0.3em; }

#join_social_modal .seperator {
    border-bottom: 1px solid #000000;
    border-top: 1px solid #000000;
    height: 2px;
    line-height: 0;
    width: 100%;
}
#join_social_modal .title {
	font-size: 120%;
	text-align:center;
}
.inactive td {
	color: #999;	
}
.hilite {
	background-color:#FF9 !important;		
}
td, th {
	font-size:12px;
}
</style>
