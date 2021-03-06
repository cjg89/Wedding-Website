<?php
	// Set this variable to true to display the contact
	// form; set to false to hide it.
	$display_rsvp_form = true;
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jo Greybill and Trey Dickson Wedding</title>
<meta content="width=device-width" name="viewport">
<style type="text/css">
	@import url('bootstrap/css/bootstrap.css'); 
	@import url('bootstrap/css/bootstrap-responsive.css');
	@import url('css/styles.css'); 
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="js/json2.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31267391-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

	<div class="container">
		<div class="row" id="header">
			<div class="span6" id="header_photo">
				<img src="img/header_photo.png" alt="Jo and Trey" title="Jo and Trey" />
			</div>
			<div class="span6" id="header_details">
				<h1>Jo and Trey are getting married!</h1>
				<img src="img/header_title.png" />
				<div class="row">
					<div class="span3">
						<span class="alt">on</span> Saturday,<br/>May 4th, 2013
					</div>
					<div class="span3">
						<span class="alt">at the beautiful</span><br/>Destin Bay House<br/><span class="alt">in</span> Destin, FL
					</div>
				</div>
				<div class="row">
					<div class="span6">
						<p><a href="#rsvp">RSVP Now</a></p>
					</div>
				</div>
			</div>
		</div>
        
		<div class="row" id="wedding_info">
        	<div class="span12">
                <h2>The Wedding</h2>
				<h3>Ceremony &amp; Reception Information</h3>
				<img class="pull-right" src="img/photo_venue.jpg" alt="The Destin Bay House" title="The Destin Bay House" />
                    
				<p>Both the wedding ceremony and reception will take place at the Destin Bay House.  The Destin Bay House is situated right on the western edge of Destin, just past the Destin Bridge on Calhoun Avenue.  <a href="#directions">Click here for directions</a>.</p>
                    
				<p>Both our families are pretty lax southern folks-- this wedding will be very casual.  Dress will be your typical “Sunday best” clothing.  Kids are welcome to attend.  Food will include burgers, chicken, etc.  Beer and wine will also be served.  If you have any food allergies and need to make a special request, please do so when you <a href="#rsvp">RSVP</a>.</p>
    
				<p>Please note that smoking is not permitted inside or on the screened-in porch.  Designated smoking areas will be available outside.  Please discard all cigarette butts properly (don’t let them burn out in the dirt.)</p>
                    
				<p>The ceremony will take place outside in the back green, barring inclement weather.  We’ll begin the ceremony at 5:30pm. The reception will follow shortly thereafter.  After photos are taken, guests will be free to wander onto the back green as they please.  We plan on wrapping up the reception no later than 8-8:30pm.</p>
				
				<h3 id="directions">Directions &amp; Transportation</h3>
				<a target="_blank" href="https://maps.google.com/maps?q=127+Calhoun+Avenue+Destin,+FL+32541&oe=utf-&ie=UTF-8&hl=en"><img class="pull-left" id="map" src="http://maps.google.com/maps/api/staticmap?center=30.439202,-86.506348&zoom=11&markers=color:blue|30.399522,-86.512278&size=500x270&sensor=true" alt="Map to Destin Bay House" title="Map to Destin Bay House" /></a>
				
				<p>The Destin Bay House is located on the western edge of Destin, just past the Destin Bridge.  For those of you in Jo’s family, the venue is right next door to Clement Taylor Park (where we’ve had many of our family reunions.)  The venue will be on the left side of the road.  Signs will be posted on the day of the event to guide guests to available parking.</p>
				
				<p>Click the map to load an interactive version on Google.</p>
				
				<div class="row" id="directions_from">
					<div class="span6">
						<h4>from Fort Walton Beach, Navarre, Pensacola</h4>
						<p>take Hwy 98 East to Destin<br/>
						take first left after the Destin Bridge<br/>
						continue on Calhoun Avenue<br/>
						Destination will be on left</p>
					</div>
					<div class="span6">
						<h4>from Niceville, Walton County</h4>
						<p>take Hwy 98 West to Destin<br/>
						turn right immediately before the Destin Bridge<br/>
						continue on Calhoun Avenue<br/>
						Destination will be on left</p>
					</div>
				</div>
				
				<p>The Bay House offers parking for up to 27 vehicles; two of these spots are handicap reserved.  Additional parking will be available at the nearby First Presbyterian Church.  We ask that guests please park at the First Presbyterian Church unless they require handicap access, are wedding participants (bridesmaids/groomsmen), or are assisting in pre/post wedding setup.  Shuttle service will be provided from the church parking lot to the venue until the ceremony begins.</p>
            </div>
        </div>
	</div>	
	
	<div class="container wide" id="rsvp_wrap">        
        <div class="row" id="rsvp">
			<?php if ($display_rsvp_form == true) { ?>
        	<div class="span12">
                <div id="rsvp_content_top">
                    <h2 id="rsvp_header">Can You Make It?</h2>
					<br/>
                    <p>Use the form below to RSVP.  You will need the information from your RSVP card that was included with your invitation.</p>
					<p>If you've lost your RSVP information card, please <i style="margin-top: 6px;" class="icon-white icon-envelope"></i> <a href="mailto:jogreybill@gmail.com">email Jo</a>.</p>
                </div>
                
                <form method="post" action="" id="rsvpform">
                    <fieldset>
                        <label id="label_names" for="names">Please enter the four-digit RSVP code from your invitation information below:</label>
                        <input type="text" name="rsvp_code" id="rsvp_code">
						<p id="loading"><img src="img/loading.gif" /></p>
                        <div id="hidden">
							<div id="attendees">
								<p>Howdy! Your party is listed below. Please specify who will or will not be attending, then click the "Submit RSVP" button to confirm.</p>
							</div>
							<label id="label_foodallergies" for="foodallergies">Does your party need any accommodations for food allergies?</label>
							<textarea name="foodallergies" id="foodallergies"></textarea>						
							<label id="label_otherinfo" for="otherinfo">If you have any questions for us, or if you'd like to specify a Plus One for your party, please specify below:</label>
							<textarea name="otherinfo" id="otherinfo"></textarea>
						</div>
						<div id="errormsg">
							<p>Sorry, this code doesn't match any parties on our guest list. Please try again.</p>
						</div>
						<div id="submitsuccess">
							<p>Your RSVP was submitted successfully.  Thanks for your response!</p>
						</div>
                        <br/>
                        <input type="submit" id="submit" class="submit" value="Submit">
                    </fieldset>
                </form>
			</div>
			<?php } else { ?>
			<div class="span12">
                <div id="rsvp_content_top">
                    <h2 id="rsvp_header">Can You Make It?</h2>
					<br/>
                    <p>The RVSP form will be available when invitations go out.  Please check back soon!</p><br/ >
				</div>
			</div>
			<?php } ?>
		</div>
    </div>
	<div class="container">    
        <div class="row" id="other_info">
			<div class="span12">
				<h2>Other Information</h2>
				<h3>Gift Registries</h3>
				<p>We are currently registered at <a href="http://www.target.com/wedd/registry/WmYBcvFbwjTni5lXsUFAcA">Target</a> and <a href="http://www.amazon.com/registry/wedding/3L4KS8USEYORF">Amazon</a>.  (We are still working on our registries!)</p>
					
				<h3>Any Other Questions?</h3>
				<p>Got any other questions about the wedding?  Feel free to shoot Jo an email at <a href="mailto:jogreybill@gmail.com">jogreybill@gmail.com</a>.</p>
			</div>
        </div>
    </div>
	<div class="container wide" id="footer_wrap">    
        <div class="row" id="footer">
			<div class="span12">
				<h3>We hope to see you there!</h3>
				<p>This site was made from scratch by the bride and groom.  Parts of this website may not be reused or redistributed for any purpose.<br/>Plugins and various graphical images are copyright their respective owners and are used under a personal-use, open-source license.</p>
				<p><a href="http://en.wikipedia.org/wiki/Star_Wars_Day">May the Fourth Be With You.</a></p>
        	</div>
        </div>
        
    </div>    

</body>
</html>
