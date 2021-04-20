
// chech whether inputField is empty or not
function isEmpty(input){
	// license box
    if(input.type=="checkbox"){
		if(!input.checked)
			return true;
    }
	
	// title or description field 
    if (input.value==""){
		return true;
    }
	
    return false;
}

// change the color of the field to  red
function warning(input){
	// license box
	if(input.type=="checkbox")
		input.parentNode.style.backgroundColor="#AA0000";
	// title or description field 
	else
		input.style.backgroundColor="#AA0000";	
}

// if filled, set its style back
function valid(input){	
	// license box
	if(input.type=="checkbox")
		input.parentNode.style.backgroundColor="#FFFFFF";
	// title or description field 
	else
		input.style.backgroundColor="#FFFFFF";	
}


// main function for this program
window.onload = function(){
    // get the form, and the parts required to be checked
	var mainForm = document.getElementById("mainForm");
    var inputs = document.querySelectorAll(".required");
	
	
	// another listener to the fields so that 
	// when the user types into a field (changed event), 
	// JavaScript removes the color styling as the field is now valid
    for (var i=0; i < inputs.length; i++){
		//inputs[i].onfocus = function(){valid(this);}
		
		inputs[i].addEventListener('change', function(){
			valid(this);	
		});
    }
	
	// Setup a listener on the form’s submit event
    mainForm.onsubmit = function(e){
		for (var i=0; i < inputs.length; i++){
			if( isEmpty(inputs[i]) ){
				e.preventDefault(); // prevents the submission 
				warning(inputs[i]); // set the empty field as red
			}
			else{
				valid(inputs[i]); // set them back if filled
			}
		}
    }
}
