$(document).ready(function(){
	$.ajax({
		url: 'scripts/fetch_topic.php',
		type: 'POST',
		data: {},
		dataType: 'json',
		cache: false,
		success: function(data){
			//console.log(data.length);
			for (var i = 0; i < data.length; i++) {
				$("#topic").append("<option value='" + data[i]["topic_name"] + "'>" + data[i]["topic_name"] + "</option>");
			}
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: 'scripts/fetch_language.php',
		type: 'POST',
		data: {},
		dataType: 'json',
		cache: false,
		success: function(data){
			//console.log(data.length);
			for (var i = 0; i < data.length; i++) {
				$("#language").append("<option value='" + data[i]["language"] + "'>" + data[i]["language"] + "</option>");
			}
		}
	});
});

$(document).ready(function() {
    $("#upload_form").on('submit', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("#help").html("loading your video details ....");
        $.ajax({
            url: 'scripts/fetch.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
                var getarray = jQuery.parseJSON(data);
                $("#help").html("Your video is added. Check the details below.");
                $(".thumbnail").html("<img class='col-lg-12' src='" + getarray.thumbnail_url + "'>");
                $(".title").html(getarray.title);
                $(".description").html("Publisher: " + getarray.author_name + "<br>" + "You can watch Your" +
                "video at: <a href='http://www.beta-testsite.ml/view.php?v=" + getarray.id + "' target='_blank'>http://beta-testsite.ml/view.php?v=" + getarray.id + "</script>");
                $(".hide").css('display', 'block');
            },
            error: function(){
            }
        });
    });
});


//click on "Upload another video button"
$(document).ready(function() {
  $("#new-upload-btn").click(function(event) {
    /* Act on the event */
    $("#upload_form").trigger('reset');
    $("#help").html("");
    $(".thumbnail").html("");
    $(".title").html("");
    $(".description").html("");
    $(".hide").css('display', 'none');
  });
});
