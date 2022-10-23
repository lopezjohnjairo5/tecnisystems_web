let pagesNum = document.getElementById('pagination');
let containerNumberPages = document.getElementById('container_number_pages');
let tbody_reports_content = document.getElementById("tbody_reports_content");

let count_hidde = 0;

pagesNum.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_reports_content.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages") {
			if (count_hidde > 0) {
				count_hidde -= 1;
				containerNumberPages.childNodes[count_hidde].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages") {

			if (count_hidde < containerNumberPages.childNodes.length - 9) {
				containerNumberPages.childNodes[count_hidde].style.display = "none";
				count_hidde += 1;
			}
		}
	}
});
