$(document).ready(function(){
	$(("#password_again")).keyup(function(){
		if(($("#password").val() == "") || ($("#password").val() != $("#password_again").val()))
		{
			console.log("bp1");
			$(".submit-btn").attr("disabled",  "disabled");
		}
		else
		{
			console.log("bp3");
			$(".submit-btn").removeAttr("disabled");
		}
	});
	/*if(($("#password").val() == "") || ($("#password").val() != $("#password_again").val()))
	{
		console.log("bp1");
		$(".submit-btn").attr("disabled",  "true");
	}
	else
	{
		console.log("bp3");
		$(".submit-btn").attr("disabled",  "false");
	}*/
});

$(document).ready(function() {
  $("#signup-form").on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    $(".submit-btn").html("Processing ...");
    $.ajax({
      url: 'scripts/signup.php',
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
      	console.log(data);
      	var getarray = jQuery.parseJSON(data);
      	if(getarray.error)
      	{
      		$(".signup-form").html(getarray.message);
        	$(".signup-form").css('color', 'red');
        	$(".switch").hide();
        	$(".login-header").hide();
        	$(".submit-btn").hide();
      	}
      	else{
      		$.ajax({
      			url : 'http://www.beta-testsite.tk/mail.php',
      			type : 'POST',
      			data : {"email" : getarray.email, "otp" : getarray.otp},
      			dataType : 'JSON',
      			cache : false,
      			success : function(data){
      				console.log(data);
      				if (data["error"]) {
      					$(".signup-form").html(data["message"]);
        				$(".signup-form").css('color', 'red');
        				$(".switch").hide();
        				$(".login-header").hide();
        				$(".submit-btn").hide();
      				}
      				else{
      					$(".signup-form").html(data["message"]);
        				$(".signup-form").css('color', 'white');
        				$(".switch").hide();
        				$(".login-header").hide();
        				$(".submit-btn").hide();
      				}
      			},
      			error: function(){
      				$(".signup-form").html("An error occurred sending mail");
        			$(".signup-form").css('color', 'red');
        			$(".switch").hide();
        			$(".login-header").hide();
        			$(".submit-btn").hide();
      			}
      		});
      	}
      },
      error: function(){
      	$(".signup-form").html("An error occurred in signup process!");
        $(".signup-form").css('color', 'red');
        $(".switch").hide();
        $(".login-header").hide();
        $(".submit-btn").hide();
      }

    });
  });
});
