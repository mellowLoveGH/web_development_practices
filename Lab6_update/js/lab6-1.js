/* jQuery and JavaScript code here for lab6-1.html */
$('#pageTitle').html("Lab - 6 DOM Manipulation with jQuery");

$('msgArea').val(function(){
  return "My class is " + $('#msgArea').attr("class");
});
// have no idea why this line is not working

$('button').css('background-color','red');

$('body').css('background-color','ivory');

$('.center-icons').addClass('selected');

$('.panel').click(function(){
  $('#message').html("you clicked panel");
});

$('.panel').on("mousemove",function(e){
  $('#message').html("x = " + e.pageX + " y = " + e.pageY);
});

$('.panel').on("mouseleave",function(e){
  $('#message').html("mouse has left");
});

var img = $('<img src="images/art/thumbs/13030.jpg">');
var panel = $('#panel-2');
panel.append(img);
$(function(){
  $('#stories img').on("mouseover",function(e){
    var alt = $(this).attr('alt');
    var src = $(this).attr('src');
    var newSrc = src.replace("small","medium");
    var preview = $('<div id="preview"></div>');
    var img = $('<img src="' + newSrc + '">');
    var caption = $('<p>' + alt + '</p>');
    preview.append(img);
    preview.append(caption);
    $(this).after(preview);
    $(this).addClass("gray");
    $('#preview').fadeIn(1000);
  });
});

function removePreview(){
  $(this).removeClass("gray");
  $('#preview').remove();
}
$('#stories img').on("mouseleave",removePreview);
