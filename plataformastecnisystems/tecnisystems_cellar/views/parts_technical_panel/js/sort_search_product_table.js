var elements_table_products = document.getElementById("table_product_content");
elements_table_products.addEventListener("click",function(e){
	if(e.target && e.target.classList[0] === "sort_elements_table_search_product"){
		let stateClick = 0;
		let matriz = [];
		let step_matriz = [];
		let tbody_product_content = document.getElementById("tbody_product_content");

		matriz = get_table_content(tbody_product_content);

		e.target.childNodes.forEach((item, i) => {
			if (item.tagName == "IMG") {
				item.classList.toggle("giro");
				stateClick = item.classList.contains("giro");
			}
		});

		switch (e.target.id) {
			case "tbsr_prod_serial":
				step_matriz = order_by_text_column(matriz, stateClick, 2, 0);
				set_table_content(tbody_product_content, step_matriz);
			break;

			case "tbsr_prod_name":
				step_matriz = order_by_text_column(matriz, stateClick, 3, 0);
				set_table_content(tbody_product_content, step_matriz);
			break;

			case "tbsr_prod_brand":
				step_matriz = order_by_text_column(matriz, stateClick, 4, 0);
				set_table_content(tbody_product_content, step_matriz);
			break;

			case "tbsr_prod_prov":
        step_matriz = order_by_text_column(matriz, stateClick, 5, 0);
        set_table_content(tbody_product_content, step_matriz);
			break;

			case "tbsr_prod_type":
				step_matriz = order_by_text_column(matriz, stateClick, 6, 0);
				set_table_content(tbody_product_content, step_matriz);
			break;

			case "tbsr_prod_prod":
				step_matriz = order_by_text_column(matriz, stateClick, 7, 0);
				set_table_content(tbody_product_content, step_matriz);
			break;
		}
	}
});
