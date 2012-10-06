$(document).ready(function(){
	
	/* Smooth scrolling - via http://css-tricks.com/snippets/jquery/smooth-scrolling/ by Chris Coyier*/
	  function filterPath(string) {
	  return string
		.replace(/^\//,'')
		.replace(/(index|default).[a-zA-Z]{3,4}$/,'')
		.replace(/\/$/,'');
	  }
	  var locationPath = filterPath(location.pathname);
	  var scrollElem = scrollableElement('html', 'body');
	
	  $('a[href*=#]').each(function() {
		var thisPath = filterPath(this.pathname) || locationPath;
		if (  locationPath == thisPath
		&& (location.hostname == this.hostname || !this.hostname)
		&& this.hash.replace(/#/,'') ) {
		  var $target = $(this.hash), target = this.hash;
		  if (target) {
			var targetOffset = $target.offset().top;
			$(this).click(function(event) {
			  event.preventDefault();
			  $(scrollElem).animate({scrollTop: targetOffset}, 800, function() {
				location.hash = target;
			  });
			});
		  }
		}
	  });
	
	  // use the first element that is "scrollable"
	  function scrollableElement(els) {
		for (var i = 0, argLength = arguments.length; i <argLength; i++) {
		  var el = arguments[i],
			  $scrollElement = $(el);
		  if ($scrollElement.scrollTop()> 0) {
			return el;
		  } else {
			$scrollElement.scrollTop(1);
			var isScrollable = $scrollElement.scrollTop()> 0;
			$scrollElement.scrollTop(0);
			if (isScrollable) {
			  return el;
			}
		  }
		}
		return [];
	  }
	
	/* Handle Form Requests */	
	var passFail;
	var code;
		
	$('#rsvpform').submit(function(e) {
		e.preventDefault();						   
		
		if(!passFail) {
			code = $('#rsvp_code').val();
				
			if(code == "") {
				alert("Sorry, you must enter a reservation code first.");
			} else {
				$('#loading').fadeIn();
				$('#errormsg').hide(); // if it's visible, make sure it's hidden
				
				code = "G-" + code;
				$.ajax({
					url: "Lib/Ajax.php",
				    type: "POST",
				    data: {
						code: code, 
						attendees: null, 
						comments: null, 
						allergies: null, 
						type: "reservation"
					},
				    success: function (response) {
						$('#loading').hide();
				    	if(response == "Sorry, this code doesn't match any guests on our guest list. Please try again.") {
					        passFail = false;
							$('#errormsg').fadeIn();
				        } else {
					        passFail = true;
					        var obj = jQuery.parseJSON(response);
					         	
					        $('#label_names').css('display','none');
					        $('#rsvp_code').css('display','none').val("");
					        $('#errormsg').hide(); // if error message is shown, hide it
							
					        $('#attendees').append('<table></table>');
					         	
					        for(var i = 0; i < obj.length; i++) {
						    	$('#attendees').children('table').append(' \
									<tr id="' + obj[i].Id + '"> \
										<td> \
											<label class="label_attending">' + obj[i].Name + '</label> \
										</td> \
										<td> \
											<label class="label_yes" for="yes'+ obj[i].Id +'">I\'ll be there!</label> \
											<input type="radio" required name="attending' + i +'" id="yes'+ obj[i].Id +'" value="Yes"> \
										</td> \
										<td> \
											<label class="label_no" for="no'+ obj[i].Id +'">With regrets</label> \
											<input type="radio" required name="attending' + i +'" id="no'+ obj[i].Id +'" value="No"> \
										</td> \
									</tr> \
								');
					        }
							
					    	$('#hidden').fadeIn();
				    	}  	
					}
				});
			}
		}
		else {
			var allergies 		= $('#foodallergies').val(),
				comments 		= $('#otherinfo').val(),
				attendees 		= new Object();
				
			var count 			= 0,
				attendeesCount 	= 0;
					
			$('#attendees :radio').each(function(){
				if($(this).attr('checked') == 'checked'){
					var id = $(this).parent('tr').attr('id'); // Get each person's ID
					attendees[id] = $(this).val(); // Assign yes/no val to each attendee by ID
					attendeesCount++;
				}
				count++;
			});
			
			if((count /2) == attendeesCount) { 
			// if each person has a yes/no value assigned:
				$.ajax({
					url: "Lib/Ajax.php",
				    type: "POST",
				    data: {
						code: code, 
						attendees: JSON.stringify(attendees), 
						comments: comments, 
						allergies: allergies, 
						type: "attendees"
					},
				    cache: false,
				    success: function (response) {
				    	if(response == "Success") {
					    	alert('Thank you for your response!');
				        } else if (response == "Failure") {
					    	alert('Whoops, something went wrong when submitting your request, sorry! Please try again later, or <a href="jogreybill@gmail.com">email the bride</a> if you\'re still having trouble.');
				        }
				    }
			    });
			         
		    } else {
				alert('Please select attending or declined for each member of your group.');
		    }
		}
	});
	
	
});