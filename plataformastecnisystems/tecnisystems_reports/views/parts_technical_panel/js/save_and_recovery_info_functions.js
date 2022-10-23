function save_info_radio(inputs){
	let input_val = "";

	try{
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].checked == true) {
				input_val = 1;
			}else{
				input_val = 0;
			}
			localStorage.setItem(inputs[i].id,input_val);
		}
	}catch{
		return false;
	}
	return true;
}

function save_info(t,inputs){
	try{
		localStorage.setItem("type_technical",t);
		for (var i = 0; i < inputs.length; i++) {
			localStorage.setItem(inputs[i].id,inputs[i].value);
		}
	}catch{
		return false;
	}
	return true;
}

function recovery_info(elements){
	for (var i = 0; i < elements.length; i++) {
		elements[i].value = localStorage.getItem(elements[i].id);
	}
}

function recovery_info_radio(elements){
	let cant_true = 0;
	let input_val = "";

	for (var i = 0; i < elements.length; i++) {
		if(localStorage.getItem(elements[i].id) == 1){
			input_val = true;
			cant_true = 1;
		}else{
			input_val = false;
		}
		elements[i].checked = input_val;
	}

	if(cant_true == 0){
		default_element(elements,1);
	}
}

function default_element(e,n){
	if(n == 1){
		e[0].checked = true;
	}else{
		e[0][0].selected = true;
  }
}

function delete_all_saved_info(){
  localStorage.clear();
	alert("Eliminando la información almacenada de manera local.");
}
