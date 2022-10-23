let pagesNumMachine = document.getElementById('pagination_machine');
let containerNumberPagesMachine = document.getElementById('container_number_pages_machine');
let tbody_machines_c = document.getElementById("tbody_search_machine_content");

let count_hidde_machine = 0;

pagesNumMachine.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_machines_c.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages_machine") {
			if (count_hidde_machine > 0) {
				count_hidde_machine -= 1;
				containerNumberPagesMachine.childNodes[count_hidde_machine].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages_machine") {

			if (count_hidde_machine < containerNumberPagesMachine.childNodes.length - 9) {
				containerNumberPagesMachine.childNodes[count_hidde_machine].style.display = "none";
				count_hidde_machine += 1;
			}
		}
	}
});
