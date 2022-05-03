var single_inputs = document.getElementsByClassName("form-single-input");
for (var i = 0; i < single_inputs.length; i++) {
	single_inputs[i].style.backgroundColor = "#d1d1d1";
	single_inputs[i].disabled = true;
}

var submit_button = document.getElementById("disabled");
submit_button.disabled = true;
submit_button.style.opacity = "0.5";