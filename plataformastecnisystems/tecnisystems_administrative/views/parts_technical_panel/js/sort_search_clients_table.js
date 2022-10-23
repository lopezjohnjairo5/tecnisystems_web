function sort_values(order,col,values){
	let pass_array = []
	let final_array = [];
	let pos = 0;
	let split_Result = [];
	let new_complete_array = []

	for (var i = 0; i < values.length; i++) {
		split_Result = values[i];
		pass_array.push(split_Result[col]);
		new_complete_array.push(split_Result);
	}

	pass_array.sort();

	if(order == 1){
		pass_array.reverse();
	}

	while (final_array.length <  new_complete_array.length){
		if(pos < new_complete_array.length){
			for (var i = 0; i < new_complete_array.length; i++) {

				if(pass_array[pos] == new_complete_array[i][col]){
					final_array.push([new_complete_array[i]]);
				}
			}

			pos += 1;
		}else{
			pos = 0;
		}
	}

	set_order_table(final_array);
}

function set_order_table(array_final){
	var body_table = document.querySelector("#table_search_machine tbody");
	let content_table = "";

	for (var i = 0; i < array_final.length; i++) {
		content_table += "<tr>";
		array_pass = array_final[i];
		for (var j = 0; j < array_pass.length; j++) {
			for (var k = 0; k < array_pass[j].length; k++) {
				content_table += "<td>"+array_pass[j][k]+"</td>";
			}
		}

		content_table += "</tr>";
	}

	body_table.innerHTML = content_table;
}

function order_by_columns(direction_ord,num=0){
	let t_values = table_values();
	sort_values(direction_ord,num,t_values);
}

function table_values(){
	let mitabla = document.querySelectorAll("#table_search_machine tbody tr");
	let arrayContent = [];
	let line = "";

	for (var i = 0; i < mitabla.length; i++) {
		if(screen.width > 950 || window.innerWidth > 950){
			line = (mitabla[i].innerText+mitabla[i].lastChild.innerHTML).split("\t");
		}else{
			line = (mitabla[i].innerText+"\n"+mitabla[i].lastChild.innerHTML).split("\n");
		}
		arrayContent.push(line);
	}
	return arrayContent;
}

var elements_table_clients = document.getElementById("table_clients_content");
elements_table_clients.addEventListener("click",function(e){
	if(e.target && e.target.classList[0] === "sort_elements_table_search_client"){
		let stateClick = 0;
		let matriz = [];
		let step_matriz = [];
		let tbody_clients_content = document.getElementById("tbody_clients_content");

		matriz = get_table_content(tbody_clients_content);

		e.target.childNodes.forEach((item, i) => {
			if (item.tagName == "IMG") {
				item.classList.toggle("giro");
				stateClick = item.classList.contains("giro");
			}
		});

		switch (e.target.id) {
			case "tscc_nit":
				step_matriz = order_by_text_column(matriz, stateClick, 2, 0);
				set_table_content(tbody_clients_content, step_matriz);
				break;

			case "tscc_name":
				step_matriz = order_by_text_column(matriz, stateClick, 3, 0);
				set_table_content(tbody_clients_content, step_matriz);
				break;

			case "tscc_person_in_charge":
				step_matriz = order_by_text_column(matriz, stateClick, 4, 0);
				set_table_content(tbody_clients_content, step_matriz);
				break;

			case "tscc_state":
				step_matriz = order_by_text_column(matriz, stateClick, 10, 0);
				set_table_content(tbody_clients_content, step_matriz);
				break;
		}
	}
});
