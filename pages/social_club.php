<table id="food_drink_content" cellspacing="0">
<tr>
	<td colspan="3"><img src='images/social_club.png' alt="Food & Drink" width="100%"/></td>
</tr>
<tr>
	<td><img src="images/sc1.png" alt="Burger Food" style="float:left"/></td>
	<td valign="top"><span id="food_drink_desc" >
		<div class="seperator" style="margin-top:15px;"></div>
		<div class="title"><em>The Royal Derby Social Club</em></div>
		<div class="seperator"></div>
		<div class="desc"><?include_once 'cms_contents/social_club_desc.php';?></div>
		<a href="javascript:void(0);" id="xmore_info_button" class="menu_link" style='text-align:center'>more coming soon</a>
		
	</span>
	</td>
	<td><img src="images/sc2.png" alt="Royal Derby Social Club" style="float:right"/></td>
</tr>
</table>
<?php 
	if(($_REQUEST['action']=="new_member") ){
		$details = array_merge(array_merge($_REQUEST, $_POST), $_GET);
		//print_r($details);
		$details['payment_method'] = "Securepay";
		//print_r($details);
		$member = insert_member($details);
		//mail("bonntech_bugs@outlook.com","BONNMON POST ".__FILE__." ".__LINE__,print_r($_POST,1));	
		//mail("bonntech_bugs@outlook.com","BONNMON GET ".__FILE__." ".__LINE__,print_r($_GET,1));
		//mail("bonntech_bugs@outlook.com","BONNMON REQUEST ".__FILE__." ".__LINE__,print_r($_REQUEST,1));	
		print_r($member);	
	} else {
		if($_GET['payment_reference']<>'') {
			$member = get_member_by_session($_SESSION['SESSION']);	
		}
	}
	if($_SESSION['SESSION']<>"") {
		$session_ip = $_SESSION['SESSION'];
	} else {
		$session_ip = md5($_SERVER['REMOTE_ADDR']);
		$_SESSION['SESSION'] = $session_ip;
	}
?>
<?php if(in_array($_SERVER['REMOTE_ADDR'],$ips)) { ?>
<?php
	
	$next = next_available();		
	
?>
<div id="join_social_modal">
    <div style="text-align:left;padding-top:50px">
    <table width="100%">
    <tr>
    <td width="50%">
        <form id="social_club">
            <fieldset>
            <div class="fieldlabel"><label for="social_name">Name:</label></div>
            <div class="fielditem"><input type="text" name="social_firstname" id="social_firstname" placeholder="first name" size="15" class="text ui-widget-content ui-corner-all" size="35"></div>
            <div class="fielditem"><input type="text" name="social_lastname" id="social_lastname" placeholder="last name" size="15" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="social_email">Email:</label></div>
            <div class="fielditem"><input type="email" placeholder="email" name="social_email" id="social_email" size="39" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
            <div class="fieldlabel"><label for="social_dob">Birthdate: <span style="font-size:7pt">(you must be over 18 years of age to join)</span></label></div>
            <div class="fielditem"><input type="text" placeholder="dd/mm/yyyy" name="social_dob" id="social_dob" size="12" class="text ui-widget-content ui-corner-all"></div>
            <div class="fieldbreak"></div>
             <p class="validateTips">* All form fields are required.</p>
          </fieldset>
</form>
        <FORM name="digital_spend" id="digital_spend" method="POST" action="https://vault.safepay.com.au/cgi-bin/test_payment.pl">
                <input type="hidden" name="vendor_name" value="digital_spend">
                <input type="hidden" id="inv_line" name="The Royal Derby Social Club" value="50.00">
            	<input type="hidden" id="firstname" name="FirstName" value="">
                <input type="hidden" id="lastname" name="LastName" value="">
                <input type="hidden" id="email" name="Email" value="">
                <input type="hidden" id="dob" name="DOB" value="">
                 <input type="hidden" id="session" name="SESSION" value="<?=$session_ip?>">
                <input type="hidden" name="information_fields" value="FirstName,LastName,Email,DOB,SESSION">
                <!--<input type="hidden" name="suppress_field_names" value="FirstName,LastName,Email,DOB">-->
                <input type="hidden" name="colour_page" value="EFEDEE">
                <input type="hidden" name="colour_table" value="FFFFFF">
                <input type="hidden" name="colour_text" value="333333">
                <input type="hidden" name="heading_page" value="The Royal Derby Social Club">
                <input type="hidden" name="heading_product" value="Product Description">
                <input type="hidden" name="heading_order" value="Payment Details">
                <input type="hidden" name="return_link_text" value="Return to The Royal Derby Website.">
                <input type="hidden" name="payment_reference" id="payment_reference" value="Social: RDSC456-123">
                <input type="hidden" name="reply_link_url" value="http://royalderbyhotel.com.au/index.php?page=social_club&action=new_member&FirstName=&LastName=&DOB=&Email=&payment_reference=&SESSION=">
                <input type="hidden" name="return_link_url" value="http://royalderbyhotel.com.au/index.php?page=social_club&FirstName=&LastName=&DOB=&Email=&payment_reference=&SESSION=">
        </FORM>     </td>
    <td width="50%" style="padding-left:90px">
         <p>	$50 (AUD) one off sign up fee</p>
      <p>We'll give you a start-up kit with: 
      </p>
        <ul>
            <li>RDH Key Ring</li>
            <li>RDH Stubby Holder</li>
            <li>RDH Shopping Bag</li>
            <li>RDH Social Club Swipe Card</li>
        </ul>
      <p>Benefits:</p>
        <ul>
          <li>You will enjoy 10% off food</li>
          <li>Enjoy 5% off drink</li>
          <li>RDH annual family day</li>
          <li>Weekly social club raffle</li>
        </ul>
    </td>
    </tr>
    </table>
    </div>
</div>
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


	$('#xmore_info_button').html('join now');
	//$('#food_drink_content').leanModal({ top:"50px", closeButton: ".modal_close" });
	
	$(document).ready(function(){
		 var social_firstname = $( "#social_firstname" ),
			social_email = $( "#social_email" ),
			social_lastname = $( "#social_lastname" ),
			social_dob = $( "#social_dob" ),
			allFields = $( [] ).add( social_firstname ).add( social_email ).add( social_lastname ).add( social_dob );
		
		
		$('#social_dob').datepicker({changeMonth: true,changeYear: true,dateFormat: 'dd/mm/yy', defaultDate: '-18y', yearRange: "<?= date("Y",strtotime("-90 year", time())); ?>:<?= date("Y",strtotime("-18 year", time())); ?>"});
		$('#join_social_modal').dialog({autoOpen: false,
			height: 'auto',
			width: 700,
			modal: true,
			 buttons: {
				"Pay Now": function() {
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
					$("#digital_spend").submit();
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
<?php } ?>
<style>
.ui-datepicker{
	font-size:9px;
}
.fieldlabel{
	padding-left:7px;
}
.fielditem{
	margin-left:20px;
	font-family:helvetica,arial;
}
.fielditem input{
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
#join_social_modal input.text { margin-bottom:12px; padding: .4em; color:#030303}
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
.ui-widget-content{
	border-radius: 0px 0px 0px 0px !important;
}
</style>