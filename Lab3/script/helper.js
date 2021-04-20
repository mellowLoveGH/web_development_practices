
// chech whether inputField is empty or not
function isEmpty(inputField){
	
	// license box
    if(inputField.type=="checkbox"){
		if(inputField.checked)
			return false;
		return true;
    }
	
	// title or description field 
    if (inputField.value==""){
		return true;
    }
    return false;
}

// change the color of the field to  red
function makeRed(inputDiv){
   	inputDiv.style.backgroundColor="#AA0000";
	inputDiv.parentNode.style.backgroundColor="#AA0000";
	inputDiv.parentNode.style.color="#FFFFFF";		
}

// if filled, set its style back
function makeClean(inputDiv){
	inputDiv.parentNode.style.backgroundColor="#FFFFFF";
	inputDiv.parentNode.style.color="#000000";		
}


window.onload = function(){
    // get the form, and the parts required to be checked
	var mainForm = document.getElementById("mainForm");
    var requiredInputs = document.querySelectorAll(".required");
	
    for (var i=0; i < requiredInputs.length; i++){
		requiredInputs[i].onfocus = function(){
			this.style.backgroundColor = "#EEEE00"; // yellow
		}
    }
	
	// Setup a listener on the form’s submit event
    mainForm.onsubmit = function(e){
		var requiredInputs = document.querySelectorAll(".required");
		for (var i=0; i < requiredInputs.length; i++){
			if( isEmpty(requiredInputs[i]) ){
				e.preventDefault(); // prevents the submission 
				makeRed(requiredInputs[i]); // set the empty field as red
			}
			else{
				makeClean(requiredInputs[i]); // set them back if filled
			}
		}
    }
}
