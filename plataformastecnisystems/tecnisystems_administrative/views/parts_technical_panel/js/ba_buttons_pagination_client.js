let pagesNumClient = document.getElementById('pagination_client');
let containerNumberPagesClient = document.getElementById('container_number_pages_client');
let tbody_clients_c = document.getElementById("tbody_clients_content");

let count_hidde_client = 0;

pagesNumClient.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_clients_c.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages_client") {
			if (count_hidde_client > 0) {
				count_hidde_client -= 1;
				containerNumberPagesClient.childNodes[count_hidde_client].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages_client") {

			if (count_hidde_client < containerNumberPagesClient.childNodes.length - 9) {
				containerNumberPagesClient.childNodes[count_hidde_client].style.display = "none";
				count_hidde_client += 1;
			}
		}
	}
});
