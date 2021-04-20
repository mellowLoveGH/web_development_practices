
function getSelectors(name){
	var x = document.querySelectorAll(name);
	return x;
}

function addNotes(selectors){
	// set notes
}


window.onload = function(){
    
	// get spans
	name = 'span'
	spans = getSelectors(name);
	addNotes(spans)
	
	// ...
}
