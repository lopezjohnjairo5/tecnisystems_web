function ajax_search_serial_product(event){
	event.preventDefault();
	let controller = "./controllers/search_product_by_serial_controller.php";

	serial_product = $("#serial_product").val();

	let frmDataGP = new FormData;
    frmDataGP.append("serial_product",serial_product);


	resp = serial_product != "";

	if (resp) {

		$.ajax({
			type: "POST",
			url: controller,
			data: frmDataGP,
			processData: false,
      contentType: false,
    	cache: false,
			success: function(data){
				if(data == "exist"){
					let update = confirm("El serial ingresado ya existe. \nDesea actualizar la información?");
					if(update){
							ajax_new_product(event,2);
					}
				}else{
					ajax_new_product(event,1);
				}
			},
			error: function(xhr, status){
				alert("Error al enviar el formulario. \n Verifique e intente nuevamente");
			}
		});
	}else{
		alert("Todos los campos son obligatorios.\nVerifique e intente nuevamente.");
	}
}

function delete_spaces(txt){
	new_txt = "";
	for (var i = 0; i < txt.length; i++) {
		if ( txt[i] == "\n" || txt[i] == " " || txt[i] == "\t") {
			new_txt += "_";
		}else{
			new_txt += txt[i];
		}
	}
	return new_txt
}


function ajax_new_product(event,update_value){
	event.preventDefault();
	let controller = "./controllers/new_products_controller.php";
	update_info = update_value;

	serial_product = delete_spaces($("#serial_product").val());
	product = delete_spaces($("#product").val());
	brand_product  = $("#brand_product").val();
	supplier_product  = $("#supplier_product").val();
	state_product  = $("#state_product").val();
	type_product  = $("#type_product").val();

  power_plant_product  = $("#power_plant_product").val();
  power_plant_model  = $("#power_plant_model").val();
  power_plant_serie  = $("#power_plant_serie").val();
  motor_product  = $("#motor_product").val();
  motor_model  = $("#motor_model").val();
  motor_serie  = $("#motor_serie").val();
  generator_product  = $("#generator_product").val();
  generator_serie  = $("#generator_serie").val();
  generator_kw  = $("#generator_kw").val();
  generator_kwa  = $("#generator_kwa").val();
  generator_phases  = $("#generator_phases").val();
  generator_volt  = $("#generator_volt").val();

  f_oil_amount_cellar  = $("#f_oil_amount_cellar").val();
  f_oil_reference_cellar  = $("#f_oil_reference_cellar").val();
  fuel_amount_cellar  = $("#fuel_amount_cellar").val();
  fuel_reference_cellar  = $("#fuel_reference_cellar").val();
  air_amount_cellar  = $("#air_amount_cellar").val();
  air_reference_cellar  = $("#air_reference_cellar").val();
  separator_amount_cellar  = $("#separator_amount_cellar").val();
  separator_reference_cellar  = $("#separator_reference_cellar").val();
  cooling_amount_cellar  = $("#cooling_amount_cellar").val();
  cooling_reference_cellar  = $("#cooling_reference_cellar").val();
  motor_oil_amount_cellar  = $("#motor_oil_amount_cellar").val();
  motor_oil_reference_cellar  = $("#motor_oil_reference_cellar").val();
  other_amount_cellar  = $("#other_amount_cellar").val();
  other_reference_cellar  = $("#other_reference_cellar").val();

  capacity_air  = $("#capacity_air").val();
  type_air_aconditioning  = $("#type_air_aconditioning").val();

  voltaje_pump  = $("#voltaje_pump").val();
  hp_pump  = $("#hp_pump").val();
  amp_pump  = $("#amp_pump").val();
  capacity_pump  = $("#capacity_pump").val();
  type_pump  = $("#type_pump").val();


	let frmDataGP = new FormData;
    frmDataGP.append("update_info",update_info);
    frmDataGP.append("serial_product",serial_product);
    frmDataGP.append("product",product);
    frmDataGP.append("brand_product",brand_product);
    frmDataGP.append("supplier_product",supplier_product);
    frmDataGP.append("state_product",state_product);
    frmDataGP.append("type_product",type_product);

    frmDataGP.append("power_plant_product",power_plant_product);
    frmDataGP.append("power_plant_model",power_plant_model);
    frmDataGP.append("power_plant_serie",power_plant_serie);
    frmDataGP.append("motor_product",motor_product);
    frmDataGP.append("motor_model",motor_model);
    frmDataGP.append("motor_serie",motor_serie);
    frmDataGP.append("generator_product",generator_product);
    frmDataGP.append("generator_serie",generator_serie);
    frmDataGP.append("generator_kw",generator_kw);
    frmDataGP.append("generator_kwa",generator_kwa);
    frmDataGP.append("generator_phases",generator_phases);
    frmDataGP.append("generator_volt",generator_volt);

    frmDataGP.append("f_oil_amount_cellar",f_oil_amount_cellar);
    frmDataGP.append("f_oil_reference_cellar",f_oil_reference_cellar);
    frmDataGP.append("fuel_amount_cellar",fuel_amount_cellar);
    frmDataGP.append("fuel_reference_cellar",fuel_reference_cellar);
    frmDataGP.append("air_amount_cellar",air_amount_cellar);
    frmDataGP.append("air_reference_cellar",air_reference_cellar);
    frmDataGP.append("separator_amount_cellar",separator_amount_cellar);
    frmDataGP.append("separator_reference_cellar",separator_reference_cellar);
    frmDataGP.append("cooling_amount_cellar",cooling_amount_cellar);
    frmDataGP.append("cooling_reference_cellar",cooling_reference_cellar);
    frmDataGP.append("motor_oil_amount_cellar",motor_oil_amount_cellar);
    frmDataGP.append("motor_oil_reference_cellar",motor_oil_reference_cellar);
    frmDataGP.append("other_amount_cellar",other_amount_cellar);
    frmDataGP.append("other_reference_cellar",other_reference_cellar);

    frmDataGP.append("capacity_air",capacity_air);
    frmDataGP.append("type_air_aconditioning",type_air_aconditioning);

    frmDataGP.append("voltaje_pump",voltaje_pump);
    frmDataGP.append("hp_pump",hp_pump);
    frmDataGP.append("amp_pump",amp_pump);
    frmDataGP.append("capacity_pump",capacity_pump);
    frmDataGP.append("type_pump",type_pump);

    frmDataGP.append("datasheet_product",$("#datasheet_product")[0].files[0]);

	resp = serial_product != "" && product != "" && brand_product != "";

	if (resp) {
		$.ajax({
			type: "POST",
			url: controller,
			//data: json_obj,
			data: frmDataGP,
			processData: false,
      contentType: false,
      cache: false,
			success: function(data){

		  		alert(data);

					if (data == "Redirigir") {
		        location.reload();
		      }else{
						let pop_new_qr = document.getElementById("pop_new_qr");
						let space_content_new_qr = document.getElementById("space_content_new_qr");
						pop_new_qr.style.display = "block";
						space_content_new_qr.innerHTML =`
						<h3>Clic sobre la imágen para descargar</h3>
						<a href="./qr_imgs/${serial_product+"_"+product+".png"}" download="${serial_product+"_"+product+".png"}">
						<img id="qr_img_pop_preview" src="./qr_imgs/${serial_product+"_"+product+".png"}" alt="qr ${serial_product+"_"+product+".png"}">
						</a>`;
					}

			},
			error: function(xhr, status){
				alert("Error al enviar el formulario. \n Verifique e intente nuevamente");
			}
		});
	}else{
		alert("Todos los campos son obligatorios.\nVerifique e intente nuevamente.");
	}
}


let insert_product_btn = document.getElementById("insert_product_btn");
insert_product_btn.addEventListener("click",function(event){
	// Async({fn:views_display_info_alert,time:0});
  // Async({fn:ajax_new_client,time:500});
	ajax_search_serial_product(event);
});
