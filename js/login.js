const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

const selects = document.querySelectorAll(".select"); // Select all elements with class "select"

function addFocusClass() {
  this.parentNode.classList.add("focus"); // Add "focus" class to the parent element
}

function removeFocusClass() {
  this.parentNode.classList.remove("focus"); // Remove "focus" class from the parent element
}

selects.forEach(select => {
  select.addEventListener("focus", addFocusClass); // Add focus event listener
  select.addEventListener("blur", removeFocusClass); // Add blur event listener
});
