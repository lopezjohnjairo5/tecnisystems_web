
var elements_table_reports = document.getElementById("table_reports_content");
elements_table_reports.addEventListener("click",function(e){
	if(e.target && e.target.classList[0] === "sort_elements_table_search_reports"){
		let stateClick = 0;
		let matriz = [];
		let step_matriz = [];
		let tbody_reports_content = document.getElementById("tbody_reports_content");

		matriz = get_table_content(tbody_reports_content);

		e.target.childNodes.forEach((item, i) => {
			if (item.tagName == "IMG") {
				item.classList.toggle("giro");
				stateClick = item.classList.contains("giro");
			}
		});

		switch (e.target.id) {
			case "tbsr_report_serial":
				step_matriz = order_by_text_column(matriz, stateClick, 2, 0);
				set_table_content(tbody_reports_content, step_matriz);
			break;

			case "tbsr_department":
				step_matriz = order_by_text_column(matriz, stateClick, 5, 0);
				set_table_content(tbody_reports_content, step_matriz);
			break;

			case "tbsr_city":
				step_matriz = order_by_text_column(matriz, stateClick, 6, 0);
				set_table_content(tbody_reports_content, step_matriz);
			break;

			case "tbsr_date":
				step_matriz = order_by_date(matriz,stateClick,0);
				set_table_content(tbody_reports_content, step_matriz);
			break;

			case "tbsr_client":
				step_matriz = order_by_text_column(matriz, stateClick, 7, 0);
				set_table_content(tbody_reports_content, step_matriz);
			break;

			case "tbsr_person_in_charge":
				step_matriz = order_by_text_column(matriz, stateClick, 10, 0);
				set_table_content(tbody_reports_content, step_matriz);
			break;
		}
	}
});
