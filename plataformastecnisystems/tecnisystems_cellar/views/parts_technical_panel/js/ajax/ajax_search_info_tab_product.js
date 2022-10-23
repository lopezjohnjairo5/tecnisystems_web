function ajax_search_info_tab_product(event){
	event.preventDefault();
	let controller = "./controllers/search_info_tab_products_controller.php";
  get_info_tab_products = "yes";

	let frmSIP = new FormData;
  frmSIP.append("get_info_tab_products",get_info_tab_products);

	$.ajax({
		type: "POST",
		url: controller,
		data: frmSIP,
		processData: false,
    contentType: false,
    cache: false,
		success: function(data){
      let supplier_product = document.getElementById("supplier_product");
      let state_product = document.getElementById("state_product");
      let type_product = document.getElementById("type_product");
      let type_air_aconditioning = document.getElementById("type_air_aconditioning");
      let type_pump = document.getElementById("type_pump");

			let contentSupplier = "";
      let contentState = "";
      let contentType = "";
      let contentTypeAir = "";
      let contentTypePump = "";

      new_data = JSON.parse(data);
      for (var j = 0; j < new_data[0].length; j++) {
        contentSupplier += `<option value="${new_data[0][j]["idSupplier"]}">${new_data[0][j]["Supplier"]}</option>`;
      }
      for (var j = 0; j < new_data[1].length; j++) {
        contentState += `<option value="${new_data[1][j]["idProductStatus"]}">${new_data[1][j]["productStatus"]}</option>`;
      }

      for (var j = 0; j < new_data[2].length; j++) {
        contentType += `<option value="${new_data[2][j]["idTypeProduct"]}">${new_data[2][j]["Type"]}</option>`;
      }

			for (var j = 0; j < new_data[3].length; j++) {
        contentTypePump += `<option value="${new_data[3][j]["idPumpType"]}">${new_data[3][j]["pumpType"]}</option>`;
      }

			for (var j = 0; j < new_data[4].length; j++) {
        contentTypeAir += `<option value="${new_data[4][j]["idAirConditioningTypes"]}">${new_data[4][j]["AirConditioningTypes"]}</option>`;
      }

      supplier_product.innerHTML = contentSupplier;
      state_product.innerHTML = contentState;
      type_product.innerHTML = contentType;
			type_air_aconditioning.innerHTML = contentTypeAir;
			type_pump.innerHTML = contentTypePump;
		}
	});
}


let btn_products = document.getElementById("btn_products");
btn_products.addEventListener("click",function(event){
	ajax_search_info_tab_product(event);
});
