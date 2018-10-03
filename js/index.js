$(document).ready(function(){
    $("#keyword").focusin(function(){
        var key = $("#keyword").val();
        if(key == "Make a wish ....") {
            $("#keyword").val("");
        }
    });
    $("#subject").focusin(function(){
    	
		$("#subject").css("color", "black");
	});
	$("#subject").focusout(function(){
    	
		$("#subject").css("color", "white");
	});
	$("#language").focusin(function(){
    	
		$("#language").css("color", "black");
	});
	$("#language").focusout(function(){
    	
		$("#language").css("color", "white");
	});
});

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
				$("#subject").append("<option value='" + data[i]["topic_name"] + "'>" + data[i]["topic_name"] + "</option>");
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
