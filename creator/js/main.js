function updateClock ( )
{
 	  var currentTime = new Date ( );
  	var currentHours = currentTime.getHours ( );
  	var currentMinutes = currentTime.getMinutes ( );
  	var currentSeconds = currentTime.getSeconds ( );
    var day = currentTime.getDate();
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var month = months[currentTime.getMonth()];
    var year = currentTime.getFullYear();
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var weekday = days[currentTime.getDay()];


  	// Pad the minutes and seconds with leading zeros, if required
  	currentHours = ( currentHours > 12 ) ? (currentHours - 12) : currentHours;

  	// Convert an hours component of "0" to "12"
  	currentHours = ( currentHours == 0 ) ? 12 : currentHours;
    currentHours = (currentHours < 10) ? '0' + currentHours : currentHours;
    currentMinutes = (currentMinutes < 10) ? '0' + currentMinutes : currentMinutes;
    currentSeconds = (currentSeconds < 10) ? '0' + currentSeconds : currentSeconds;
  	// Compose the string for display
  	var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
    var currentDateString = weekday + ", " + day + " " + month + " " + year;
   	$(".clock").html(currentTimeString);
    $(".date").html(currentDateString);
}

$(document).ready(function() {
  setInterval(function(){updateClock();}, 1000);
});

//click on sign up link
$(document).ready(function() {
  $("#signup").click(function(event) {
    $(".login-header").html("Hey There, Please Sign Up");
    $(".login-form").hide('500');
    $(".signup-form").show('500');
    $(".switch").html("By clicking continue, you agree to our terms and conditions.");
  });
});
