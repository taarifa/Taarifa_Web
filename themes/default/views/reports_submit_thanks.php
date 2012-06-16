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
		<p><a href="<?php echo url::file_loc('img'); ?>associations.html">Find out more about local homeless services</a>.</p>
		<p>Or play with the slider to see what difference a small donation can make.</p>
		
		<div id="div-slider">
			<form>
				<h2>How would you like to help?</h2>
				<input type="range" name="slider" id="slider-0" value="5" min="1" max="15"  />
			</form>
		</div>

		<div id="donate">
			<h2 id="donor-head">&pound;6 gives a room for the night</h2>
			<p id="donor-txt">Right at the centre of what we do and the quickest way to make an impact.</p>
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
				$("#donor-txt").html("Imagine trying to survive without a bank account");
				//console.log("Slider value switched as "+slider_value);
				
				break;
			case "2":
				$("#donor-head").html("&pound;"+slider_value + " gives 30 minutes of basic literacy training");
				$("#donor-txt").html("A huge obstacle for 58% of homeless people");
				
				break;
			case "3":
				$("#donor-head").html("&pound;"+slider_value + " Pays for a call home to loved ones");
				$("#donor-txt").html("Sometimes that's all someone needs.");
				
				break;
			case "4":
				$("#donor-head").html("&pound;"+slider_value + " One load of washing");
				$("#donor-txt").html("A clean shirt can make a huge difference");
				
				break;
			case "5":
				$("#donor-head").html("&pound;"+slider_value + " is a mobile top up");
				$("#donor-txt").html("A mobile phone without credit is an expensive brick.");
				
				break;
			case "6":
				$("#donor-head").html("&pound;"+slider_value + " gives a room for the night");
				$("#donor-txt").html("Right at the centre of what we do and the quickest way to make an impact.");
				
				break;
			case "7":
				$("#donor-head").html("&pound;"+slider_value + " will staff a phoneline for an hour");
				$("#donor-txt").html("Waiting on hold is irritating. Waiting on hold outside in the snow is bloody miserable.");
				
				break;
			case "8":
				$("#donor-head").html("&pound;"+slider_value + " is a visit from a mental health nurse");
				$("#donor-txt").html(" How do you think you'd feel if you were sleeping rough?");
				
				break;
			case "9":
				$("#donor-head").html("&pound;"+slider_value + " pays for Training volunteers");
				$("#donor-txt").html("nobody deserves to be messed around by untrained 'helpers'");
				
				break;
			case "10":
				$("#donor-head").html("&pound;"+slider_value + " pays for a replacement Birth certificate");
				$("#donor-txt").html("Proving who you are is vital to accessing services");
				
				break;
			case "11":
				$("#donor-head").html("&pound;"+slider_value + " goes towards Skills training and certification");
				$("#donor-txt").html("98% of homeless people have low qualifications");
				
				break;
			case "12":
				$("#donor-head").html("&pound;"+slider_value + " for coach back to home and friends");
				$("#donor-txt").html("Returning home can do wonders");
				
				break;
			case "13":
				$("#donor-head").html("&pound;"+slider_value + " for a check up for a loved pet dog");
				$("#donor-txt").html("Sometimes the only unconditional love a homeless person has.");
				
				break;
			case "14":
				$("#donor-head").html("&pound;"+slider_value + " to pay for a health check at one of our centres");
				$("#donor-txt").html("Sleeping rough is hard on your health and no home address = no GP");
				
				break;
			case "15":
				$("#donor-head").html("&pound;"+slider_value + " is enough to give a homeless person a mobile phone");
				$("#donor-txt").html("No landline, no home address. A mobile is often the only link to services and family.");
				
				break;
			
			default:
				$("#donor-head").html("&pound;"+slider_value + " is lots of money");
				$("#donor-txt").html("blah");
				
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
