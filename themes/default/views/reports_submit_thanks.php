<div id="content">
	<div class="content-bg">
		<!-- start block -->
		<div class="big-block">
<div data-role="page">
	<div data-role="header">
				<h1>everyone in</h1>
	</div>
	<div data-role="content">	
		<p>Thank You! Just using this service you have made a real positive impact on someone's life.</p>
		<p><a href="">Find out more about local homeless services</a>.</p>
		<p>Or play with the slider to see what difference a small donation can make.</p>
		
		<div id="div-slider">
			<form>
				<h2>How would you like to help?</h2>
				<input type="range" name="slider" id="slider-0" value="5" min="1" max="15"  />
			</form>
		</div>

		<div id="donate">
			<h2 id="donor-head">&pound;30 will pay for 2 hours of help looking for job</h2>
			<p id="donor-txt">96% of homeless people are unemployed. We helped over 80 people find employment last year.</p>
			<a href="http://uk.ImpulsePay.com/payforit?RouteID=6167">Pay using your phone<br/><img src="<?php echo url::file_loc('img'); ?>media/img/payforit.png" /></a> 
		</div>
		<p>So far this month people like you have raised &pound;<span class="number">513.37</span>
	</div><!-- /content -->

</div><!-- /page -->
<script>
	$("#div-slider").change(function() {
		var slider_value = $("#slider-0").val();
		// do something..
		//alert("The value is "+slider_value);
		//console.log("Slider value switched as "+slider_value);
			
		switch(slider_value)
		{
			case "1":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				//console.log("Slider value switched as "+slider_value);
				
				break;
			case "2":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "3":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "4":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "5":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "6":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "7":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "8":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "9":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "10":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "11":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "12":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "13":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "14":
				$("#donor-head").html("&pound;"+slider_value + " is enough to open a basic bank account");
				$("#donor-txt").html("Once a basic bank account is opened, it's easier for someone to earn money legitimately");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			case "15":
				$("#donor-head").html("&pound;"+slider_value + " is lots of money");
				$("#donor-txt").html("blah");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
				break;
			
			default:
				$("#donor-head").html("&pound;"+slider_value + " is lots of money");
				$("#donor-txt").html("blah");
				$("#donor-script").attr("data-label-6167", "Donate &pound;"+slider_value+" To everyone in");
				
		}
					
	});

</script>
</body>
				</div>
			</div>
		</div>
		<!-- end block -->
	</div>
</div>
