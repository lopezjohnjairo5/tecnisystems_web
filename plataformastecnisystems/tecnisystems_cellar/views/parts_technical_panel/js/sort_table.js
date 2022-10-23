function get_table_content(element){
	let matriz_content = [];
	let step_array = [];

	element.childNodes.forEach((item,i) => {
		step_array = [];
		step_array.push(item.getAttribute("id"));
		step_array.push(item.getAttribute("class"));
		item.childNodes.forEach((item2, j) => {
			step_array.push(item2.innerHTML);
		});
		matriz_content.push(step_array);
	});

	return matriz_content;
}


function order_by_serial( matriz){
	let step_matriz = [];

	for (var i = matriz.length-1; i > -1; i--) {
		step_matriz.push(matriz[i]);
	}

	return step_matriz;
}


function set_table_content(table, matriz){
	let content = "";
	table.innerHTML = "";

	for (var i = 0; i <  matriz.length; i++) {
		content += `<tr id="${matriz[i][0]}" class="${matriz[i][1]}">`;
		for (var j = 2; j < matriz[i].length; j++) {
			content += `<td>${matriz[i][j]}</td>`;
		}
		content += `</tr>`;
	}

	table.innerHTML = content;
}


function order_by_date(matriz, order, num = 0){
	if (matriz.length < 1) {
		return [];
	}

	let pivot_date = matriz[0][8].split("-");
	let pivot = new Date(pivot_date[0],pivot_date[1],pivot_date[2]);
	let matriz_left = new Array();
	let matriz_right = new Array();

	for (var i = 1; i < matriz.length; i++) {
		step_date = matriz[i][8].split("-");
		date = new Date(step_date[0],step_date[1],step_date[2]);
		if (order) {
			if (date.getTime() < pivot.getTime()) {
				matriz_left.push(matriz[i]);
			} else {
				matriz_right.push(matriz[i]);
			}
		} else {
			if (date.getTime() > pivot.getTime()) {
				matriz_left.push(matriz[i]);
			} else {
				matriz_right.push(matriz[i]);
			}
		}
	}

	num+=1;
	matriz_left.push(matriz[0]);

	if (num < (matriz.length)*3) {
		return [].concat(order_by_date(matriz_left, order, num), order_by_date(matriz_right, order, num));
	} else {
		return matriz;
	}

}

function print_matriz(matriz){
	for (var i = 0; i < matriz.length; i++) {
		console.log("matriz"+i+": "+matriz[0]);
	}
}

function order_by_text_column(matriz, order, cell, num = 0){
	// print_matriz(matriz);
	if (matriz.length < 1) {
		return [];
	}
	// console.log("\n"+matriz[0][cell]+"\n");

	let pivot = matriz[0][cell];
	let compare = 0;

	let matriz_left = new Array();
	let matriz_right = new Array();

	for (var i = 1; i < matriz.length; i++) {
		step_text = matriz[i][cell];
		compare = pivot.localeCompare(step_text, 'es');
		if (order) {
			if (compare < 0) {
					matriz_left.push(matriz[i]);
			} else if (compare >= 0) {
					matriz_right.push(matriz[i]);
			}
		} else {
			if (compare > 0) {
					matriz_left.push(matriz[i]);
			} else if (compare <= 0) {
					matriz_right.push(matriz[i]);
			}
		}
	}

	num+=1;
	matriz_left.push(matriz[0]);
	if (num < (matriz.length)*3) {
		return [].concat(order_by_text_column(matriz_left, order, cell, num), order_by_text_column(matriz_right, order, cell, num));
	} else {
		return matriz;
	}

}
