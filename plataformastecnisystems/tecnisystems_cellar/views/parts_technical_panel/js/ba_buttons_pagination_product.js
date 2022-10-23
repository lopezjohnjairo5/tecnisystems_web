let pagesNumProduct = document.getElementById('pagination_product');
let containerNumberPagesProduct = document.getElementById('container_number_pages_product');
let tbody_products_c = document.getElementById("tbody_product_content");

let count_hidde_product = 0;

pagesNumProduct.addEventListener("click",function(e){

	if (e.target.tagName === 'A') {
		tbody_products_c.childNodes.forEach((item)=>{
			if(!item.classList.contains("hidden")){
				item.classList.add("hidden");
			}

			if (item.classList.contains(e.target.id)) {
				item.classList.remove("hidden");
			}
		});
	} else if (e.target.tagName === 'BUTTON'){
		if (e.target.id === "btn_before_pages_product") {
			if (count_hidde_product > 0) {
				count_hidde_product -= 1;
				containerNumberPagesProduct.childNodes[count_hidde_product].style.display = "block";
			}

		} else if (e.target.id === "btn_after_pages_product") {

			if (count_hidde_product < containerNumberPagesProduct.childNodes.length - 9) {
				containerNumberPagesProduct.childNodes[count_hidde_product].style.display = "none";
				count_hidde_product += 1;
			}
		}
	}
});
