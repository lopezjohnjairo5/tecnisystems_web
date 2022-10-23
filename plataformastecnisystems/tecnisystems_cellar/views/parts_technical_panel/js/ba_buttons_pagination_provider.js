let pagesNumProvider = document.getElementById('pagination_provider');
let containerNumberPagesProvider = document.getElementById('container_number_pages_provider');
let tbody_providers_c = document.getElementById("tbody_provider_content");

let count_hidde_provider = 0;

pagesNumProvider.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_providers_c.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages_provider") {
			if (count_hidde_provider > 0) {
				count_hidde_provider -= 1;
				containerNumberPagesProvider.childNodes[count_hidde_provider].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages_provider") {

			if (count_hidde_provider < containerNumberPagesProvider.childNodes.length - 9) {
				containerNumberPagesProvider.childNodes[count_hidde_provider].style.display = "none";
				count_hidde_provider += 1;
			}
		}
	}
});
