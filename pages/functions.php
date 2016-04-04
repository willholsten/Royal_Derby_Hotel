<style>
iframe{border:0px!important;}
</style>
<div id="food_drink_content" cellspacing="0" cellpadding="0">
<ul>
	<li><img src='images/functions1.jpeg' alt="Functions" /></li>
<li><img style="margin:1px 0px" src='images/functions2.jpeg' alt="Functions" /></li>
	<li><img src='images/functions3.jpeg' alt="Functions" /></li>
</ul>
	</div>
	<div id="food_drink_desc">
		<h1 class="title">Functions</h1>
		<div class="seperator"></div>
		<div class="desc"><?include_once 'cms_contents/functions_desc.php';?></div>
		<a href="#contact_us" id="enquire" class="menu_link" style='text-align:center;letter-spacing:1px;'>Enquire about our function room</a>
	</div>

		<br/><br/>
		<div class="partystar_div">
			<a href="http://www.partystar.com.au/functions/venue/652a/" title="View our function listings at Partystar website." target="_blank"><img src="/images/ps-linkto.gif" border="0"></a>
		</div>

	</span>
	</td>
</tr>
</table>

<div id="contact_us" style="min-height:450px;min-width:525px;margin:10px 10px;position: fixed; z-index: 11000; left: 50%; margin-left: -330px; top: 10px; opacity: 1; display: none; background-color:lightgray;" >
<iframe id="funcframe" src="http://digitalform.com.au/?page=view_form&uuid=0a7d8310-c699-4ef8-a898-3bfc35e23169&embed=true" width="505" height="630"></iframe>
<!--
	<div id="loading">
	<p></p><p></p>
	<div id="loading_content">
		<img src="images/loading.gif" alt="Loading" height="30" width="30"/>
		<h5>Please wait while the form is being processed.</h5>
	</div>
	</div>

	<form id="contact_us_form" action="pages/ajax_function_room.php" method="post">
		<h3 class="menu_link" style="margin-left:2px;width:93%;height:20px;vertical-align:middle;display:block"><span>Enquiry Form</span><a href="#" class="modal_close">Close</a></h3>
		<table cellpadding="2" cellspacing="2" border="0">
			<tr>
				<td>NAME:</td>
				<td><input type="text" placeholder="Name" value="" name="name" required="required"/></td>
			</tr>
			<tr>
				<td>PHONE:</td>
				<td><input type="text" placeholder="Phone" value="" name="phone" required="required"/></td>
			</tr>
			<tr>
				<td>EMAIL:</td>
				<td><input type="text" placeholder="Email" value="" name="email" size="45" required="required"/></td>
			</tr>
			<tr>
				<td>DATE:</td>
				<td><input type="text" placeholder="Date" value="" name="date" size="45"/></td>
			</tr>
			<tr>
				<td>TIME:</td>
				<td><input type="text" placeholder="Time" value="" name="time" size="45"/></td>
			</tr>
			<tr>
				<td>NO. OF GUESTS:</td>
				<td><input type="text" placeholder="No. Of Guests" value="" name="no_guests" size="15" required="required"/></td>
			</tr>
			<tr>
				<td>FOOD REQUIRED:</td>
				<td><select name="food_required">
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						<option value="May Be">May Be</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>FUNCTION TYPE:</td>
				<td><input type="text" placeholder="Function Type" value="" name="function_type" size="45" required="required"/></td>
			</tr>
			<tr>
				<td>SUBJECT:</td>
				<td><input type="text" placeholder="Subject" value="Function Room Enquiry" name="subject"  size="45" required="required"/></td>
			</tr>

			<tr>
				<td>MESSAGE:</td>
				<td><textarea rows="12" cols="42" placeholder="Message"  name="message" required="required" /></textarea></td>
			</tr>
			<tr>
				<td colspan="2" ><div style="width:100%;text-align:center;"><input type="submit" value="Send Enquiry" name="submit" /></div></td>
			</tr>
		</table>
	</form>
	-->
</div>
<script>
	$('#enquire','#food_drink_content').leanModal({ top:"50px", closeButton: ".modal_close" });
	//$('#contact_us_form tr').find('td:first').css('padding-top','6px');
	//$('#contact_us_form tr :input').css('font-size','12px');
	$('#enquire').click(function(){
	$('#funcframe').attr('src', 'http://digitalform.com.au/?page=view_form&uuid=0a7d8310-c699-4ef8-a898-3bfc35e23169&embed=true');
	});
/*
//Ajax submit of contact form
$('#contact_us_form').ajaxForm({
	beforeSubmit:function(arr, $form, options) {
		$('#contact_us_form').hide();
		$('#loading').show();
	},
    success:function(responseText, statusText, xhr, $form) {
		if(responseText=='1'){
			$('#loading_content').html('Your form has been submitted successfully');
		}else{
    		$("#errorDiv").html('An error occurred while trying to submit the form');
		}
    } ,
    error:function(){
	   $("#errorDiv").html('An error occurred while trying to submit the form');
    }
});
*/

</script>
