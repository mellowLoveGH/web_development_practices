/* jQuery and JavaScript code here for lab6-1.html */

// update the page title to be "Lab 6 – DOM Manipulation with jQuery"
$('#pageTitle').html("Lab - 6 DOM Manipulation with jQuery");

// update the textarea 
$("#msgArea").attr("placeholder", "My class is " + $('#msgArea').attr("class"));

// change the background colour of the ‘View details’ buttons to be red.
$('.btn').css('background-color','red');

// background colour of the body of the page to be ivory
$('body').css('background-color','ivory');

// to include the class selected
$('.center-icons').addClass('selected');

// add a click event handler to the panel class
// use jQuery to bind several events together
$('.panel').on("click", function(){
  $('#message').html("you clicked panel");
})
.on("mousemove",function(e){
  $('#message').html("x=" + e.pageX + " y=" + e.pageY);
})
.on("mouseleave",function(e){
  $('#message').html("The mouse has left");
});

// create a new img
var img = $('<img src="images/art/thumbs/13030.jpg">');
var panel = $('#panel-2');
panel.append(img);

// create a floating preview
$('#stories img').on("mouseover",function(e){
	  
	// construct preview filename based on existing img
    var alt = $(this).attr('alt');
    var src = $(this).attr('src');
    var newSrc = src.replace("small","medium");
	
	// make dynamic element with larger preview image and caption
    var preview = $('<div id="preview"></div>');
    var img = $('<img src="' + newSrc + '">');
    var caption = $('<p>' + alt + '</p>');
	
    preview.append(img);
    preview.append(caption);
    $(this).after(preview);
    $(this).addClass("gray");
    $('#preview').fadeIn(1000);
});

// create a function that will remove the preview
$('#stories img').on("mouseleave",function(){
  $(this).removeClass("gray");
  $('#preview').remove();
});
