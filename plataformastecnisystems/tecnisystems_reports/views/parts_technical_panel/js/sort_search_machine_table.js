
var elements_table_machine = document.getElementById("table_search_machine");
elements_table_machine.addEventListener("click",function(e){
	if(e.target && e.target.classList[0] === "sort_elements_table_search_machine"){
		let stateClick = 0;
		let matriz = [];
		let step_matriz = [];
		let tbody_search_machine_content = document.getElementById("tbody_search_machine_content");

		matriz = get_table_content(tbody_search_machine_content);

		e.target.childNodes.forEach((item, i) => {
			if (item.tagName == "IMG") {
				item.classList.toggle("giro");
				stateClick = item.classList.contains("giro");
			}
		});

		switch (e.target.id) {
			case "serial_machine":
				step_matriz = order_by_text_column(matriz, stateClick, 2, 0);
				set_table_content(tbody_search_machine_content, step_matriz);
			break;

			case "name_machine":
				step_matriz = order_by_text_column(matriz, stateClick, 3, 0);
				set_table_content(tbody_search_machine_content, step_matriz);
			break;

			case "brand_machine":
				step_matriz = order_by_text_column(matriz, stateClick, 4, 0);
				set_table_content(tbody_search_machine_content, step_matriz);
			break;
		}
	}
});
