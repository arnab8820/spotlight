var base_url = "view.php?v=";

var url_string = window.location.href; // www.test.com?filename=test
var url = new URL(url_string);
var keyw = url.searchParams.get("keyword");
var sub = url.searchParams.get("subject");
var lang = url.searchParams.get("language");


var limit = 15;
var offset = 0;

$.ajax({
    url: "scripts/search.php",
    type: "POST",
    data: {"keyword" : keyw, "subject" : sub, "language" : lang, "limit" : limit, "offset" : offset},
    dataType: "json",
    cache: false,
    success: function(data){
        //var getarray = jQuery.parseJSON(data);
        if(data[0]["error"] == true)
        {
            alert(data[0]["message"]);
        }
        else{
            //console.log(data);
            $(".search").css("top", "0%");
            $(".search").css("transform", "translate(-50%, 75px)");
            $(".search-result").html("<h4>Results for your wish \"" + keyw + "\" in " + sub + "</h4>");
            for(i=0; i<data.length; i++)
            {
                $(".search-result").append("<div class='row result'  id='" + data[i]["id"] + "' onclick='view.php?v=" + data[i]["id"] + "'>" +
                "<div id='thumbnail' class='col-sm-2'><img src='" + data[i]["thumbnail_url"] + "'></div>" +
                "<div id='detail' class='col-sm-8'>" + data[i]["title"] + "<br>" + data[i]["author"] + "</div>" +
                "<div id='view' class='col-sm-2'>"+ data[i]["views"] + " views</div>" +
                "</div>");
            }
            if(data.length == limit)
            {
                $(".pagination").css("display", "block");
            }
            else
            {
                $(".pagination").css("display", "none");
            }
            $(".pagination").click(function(){
                offset += limit;
                $.ajax({
                    url: "scripts/search.php",
                    type: "POST",
                    data: {"keyword" : keyw, "subject" : sub, "language" : lang, "limit" : limit, "offset" : offset},
                    dataType: "json",
                    cache: false,
                    success: function(data){
                        for(i=0; i<data.length; i++)
                        {
                            $(".search-result").append("<div class='row result'  id='" + data[i]["id"] + "' onclick='view.php?v=" + data[i]["id"] + "'>" +
                            "<div id='thumbnail' class='col-sm-2'><img src='" + data[i]["thumbnail_url"] + "'></div>" +
                            "<div id='detail' class='col-sm-8'>" + data[i]["title"] + "<br>" + data[i]["author"] + "</div>" +
                            "<div id='view' class='col-sm-2'>"+ data[i]["views"] + " views</div>" +
                            "</div>");
                        }
                        if(data.length == limit)
                        {
                            $(".pagination").css("display", "block");
                        }
                        else
                        {
                            $(".pagination").css("display", "none");
                        }
                        $(".result").click(function(event) {

                            //alert("click");
                            var id = $(this).attr('id');
                            //console.log(id);
                            url = "view.php?v=" + id;
                            window.location = url;
                        });
                    }
                });
            });
            $(".result").click(function(event) {

                //alert("click");
                var id = $(this).attr('id');
                //console.log(id);
                url = "view.php?v=" + id;
                window.location = url;
            });
        }
        //console.log(data);
    },
    error: function(request, error){
        console.log("Error sending!");
        console.log(arguments);
        console.log(error);
    }
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

$(document).ready(function(){
    $("#keyword").focusin(function(){
        var key = $("#keyword").val();
        if(key == "Make a wish ....") {
            $("#keyword").val("");
        }
    });
});