var base_url = "view.php?v=";

var url_string = window.location.href; // www.test.com?filename=test
var url = new URL(url_string);
var paramValue = url.searchParams.get("v");
//alert(paramValue);
var sub;
$.ajax({
  url: 'scripts/video-info.php',
  type: 'POST',
  data: {"v": paramValue},
  //dataType:"json",
  cache: false,
  success: function(data){
    var getarray = jQuery.parseJSON(data);
    //  console.log(getarray);
    $("#video").html("<iframe src='" + getarray.url + "' allowfullscreen></iframe>");
    $("#title").html(getarray.title);
    $("#author").html("By: <a href='" + getarray.author_url + "'>" + getarray.author + "</a>");
    $("#views").html(getarray.views + " views");
    sub = getarray.subject;
    $.ajax({
      url: 'scripts/show_related.php',
      type: 'POST',
      data: {"sub": sub},
      dataType:"json",
      cache: false,
      success: function(data){
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          //var getarray = jQuery.parseJSON(data[i]);
          //console.log(data[i]["id"]);
          $("#related-videos").append(
            '<div class="related-video-item row" id="' + data[i]["id"] + '">' +
              '<div class="col-sm-2">' +
                  '<img src="' + data[i]["thumbnail_url"] + '">' +
              '</div>' +
              '<div class="col-sm-8"><h2>' + data[i]["title"] + '</h2>' +
                  '<br>' + data[i]["author"] +
              '</div>' +
              '<div class="col-sm-2">' + data[i]["views"] + ' views</div>' +
            '</div>');
        }
        $(".related-video-item").click(function(event) {
          /* Act on the event */
          //alert("click");
          var id = $(this).attr('id');
          //console.log(id);
          url = base_url + id;
          window.location = url;
        });
      },
      error: function(){
        $("#title").html("There was an error");
      }
    });
  },
  error: function(request, error){
      $("#title").html("There was an error");
  }
});

$(document).ready(function() {

});

$(document).ready(function() {

});
