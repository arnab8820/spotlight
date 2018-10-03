$(document).ready(function() {
  $("#login").on('submit', function(event) {
    event.preventDefault();
    $(".submit-btn").html("Please wait ....");
    $.ajax({
      url: "scripts/login.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data){
        console.log(data);
        var getarray = jQuery.parseJSON(data);
        if(getarray.success == 1)
        {
          $(".submit-btn").html(getarray.message + " Redirecting. Please wait.");
          //if(getarray.user_type == 2){
            window.location = "user-home.php";
          //}

        }
        else {
          $(".submit-btn").html(getarray.message);
        }
      }
    });
    /* Act on the event */
  });
});
