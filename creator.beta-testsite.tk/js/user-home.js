$(document).ready(function(){
	$("#info").on('submit', function(e){
		e.preventDefault();
		$(".inf-form").html("Saving your details. Please wait...");
		$.ajax({
			url: 'scripts/update-detail.php',
			type: 'POST',
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache: false,
			success: function(data){
				console.log(data);
				var getarray = jQuery.parseJSON(data);
				if(getarray.error == false)
				{
					$(".inf-form").html(getarray.message);
					$(".inf-form").append("<br>You will be logged out now. Please login again.");
					setTimeout(function(){
						window.location.replace("scripts/logout.php");
					}, 5000);
				}
				else
				{
					$(".inf-form").html(getarray.message);
				}
			},
			error: function(){
				$(".inf-form").html("There was an error!");
			}
		});
	});
});