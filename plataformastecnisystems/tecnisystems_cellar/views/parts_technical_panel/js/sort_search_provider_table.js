var elements_table_provider = document.getElementById("table_provider_content");
elements_table_provider.addEventListener("click",function(e){
	if(e.target && e.target.classList[0] === "sort_elements_table_search_provider"){
		let stateClick = 0;
		let matriz = [];
		let step_matriz = [];
		let tbody_provider_content = document.getElementById("tbody_provider_content");

		matriz = get_table_content(tbody_provider_content);

		e.target.childNodes.forEach((item, i) => {
			if (item.tagName == "IMG") {
				item.classList.toggle("giro");
				stateClick = item.classList.contains("giro");
			}
		});

		switch (e.target.id) {
			case "tbsr_prov_name":
				step_matriz = order_by_text_column(matriz, stateClick, 2, 0);
				set_table_content(tbody_provider_content, step_matriz);
			break;

      case "tbsr_prov_phone":
        step_matriz = order_by_text_column(matriz, stateClick, 3, 0);
        set_table_content(tbody_provider_content, step_matriz);
      break;

			case "tbsr_prov_dep":
				step_matriz = order_by_text_column(matriz, stateClick, 7, 0);
				set_table_content(tbody_provider_content, step_matriz);
			break;

			case "tbsr_prov_city":
				step_matriz = order_by_text_column(matriz, stateClick, 8, 0);
				set_table_content(tbody_provider_content, step_matriz);
			break;
		}
	}
});
