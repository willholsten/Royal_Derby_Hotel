<div class="strip" id="strip" name="strip">
	<div class="strip_form">
	446 BRUNSWICK STREET FITZROY VIC 3065<br/><br/>
		<div class="strip_divider"></div>
		<div class="strip_message">Coming Soon</div>
		<div class="strip_divider"></div>
	
		<div class="strip_map"><a href="#test" name="testgo" id="testgo" class="strip_map">view map</a></div>
		<p>Register below to keep informed of events at Royal Derby</p>

		<form action="http://login.digitalsend.com.au/t/j/s/jjjyku/" method="post" id="subForm">
		<table style="margin-bottom:20px">
			<tr><td><input type="text" name="cm-name" id="strip_form_name" value=""></td></tr>
			<tr><td><input type="text" name="cm-jjjyku-jjjyku" id="strip_form_email" value=""></td></tr>
			<tr><td><button value="SUBMIT" name="submit" id="submit">SUBSCRIBE</button>	</td></tr>
		</table>
		
		</form>
	</div>
</div>
<div id="test" style="position: fixed; z-index: 11000; left: 50%; margin-left: -330px; top: 50px; opacity: 1; display: none; ">
	<div style="background-color:#fff; width:416px; padding:15px;">
	<img src="images/map.png">
	<div style="font-weight:bold;text-align:right;font-family:arial; font-size:10px; padding-top:15px;" id="testclose"><a class="modal_close" style="text-decoration:none; cursor:pointer;color:black;" href="#">X CLOSE</a></div>
	</div>
</div>
<script>
$("#testgo").leanModal({ top:"50px", closeButton: ".modal_close" });
$(document.body).ready(function () {
  if($.browser.msie==false || $.browser.msie==undefined){
	if ($("#strip").is(":hidden")) {
		$("#strip").slideDown(2400, function() {
			$(".strip_form").animate( { opacity: "1" }, 600 );
		});
	} else {
		$("#strip").hide();
	}
  }else{
		$("#strip").show();
		$(".strip_form").animate( { opacity: "1" }, 600 );
  }
});


</script>