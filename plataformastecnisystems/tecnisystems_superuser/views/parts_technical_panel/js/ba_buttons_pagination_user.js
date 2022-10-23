let pagesNumUser = document.getElementById('pagination_user');
let containerNumberPagesUser = document.getElementById('container_number_pages_user');
let tbody_users_c = document.getElementById("table_content_technicals_info");

let count_hidde_user = 0;

pagesNumUser.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_users_c.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages_user") {
			if (count_hidde_user > 0) {
				count_hidde_user -= 1;
				containerNumberPagesUser.childNodes[count_hidde_user].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages_user") {

			if (count_hidde_user < containerNumberPagesUser.childNodes.length - 9) {
				containerNumberPagesUser.childNodes[count_hidde_user].style.display = "none";
				count_hidde_user += 1;
			}
		}
	}
});
