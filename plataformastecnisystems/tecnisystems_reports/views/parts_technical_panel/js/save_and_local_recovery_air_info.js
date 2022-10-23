let saveBTN = document.getElementById("save_form_air_conditioning");
let inputs_elements = document.querySelectorAll("#report_air_conditioning_form input[type='text']");
let inputs_elements_number = document.querySelectorAll("#report_air_conditioning_form input[type='number']");
let inputs_elements_date = document.querySelectorAll("#report_air_conditioning_form input[type='date']");
let inputs_elements_email = document.querySelectorAll("#report_air_conditioning_form input[type='email']");
let inputs_radio = document.querySelectorAll("#report_air_conditioning_form input[type='radio']");
let textarea_elements = document.querySelectorAll("#report_air_conditioning_form textarea");
let fields_elements = [...inputs_elements,...inputs_elements_number,...inputs_elements_date,...inputs_elements_email,...textarea_elements];
let recovery_fields_elements = [...inputs_elements,...inputs_elements_number,...inputs_elements_date,...inputs_elements_email,...textarea_elements];
let delete_fields_elements = [...inputs_elements,...inputs_elements_number,...inputs_elements_date,...inputs_elements_email,...textarea_elements,...inputs_radio];

saveBTN.addEventListener("click",function(){
	let type_technical = "aire";
	if(save_info(type_technical,fields_elements) && save_info_radio(inputs_radio)){
		alert("La información ingresada (excepto la información presente en los campos desplegables) fue almacenada correctamente.");
	}else{
		alert("Error al almacenar la Información.");
	}
});

window.addEventListener("load",function(){
	let tt = window.localStorage.getItem("type_technical");
	if(window.localStorage.length > 0 && tt == "aire"){
    recovery_info(recovery_fields_elements);
    recovery_info_radio(inputs_radio);
  }
});
