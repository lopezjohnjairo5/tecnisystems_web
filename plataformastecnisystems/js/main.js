let pop_creator = document.getElementById("pop_creator");
let open_pop_creator = document.getElementById("open_pop_creator");

document.addEventListener("keydown",function(e){
	if(e.ctrlKey){
		if(e.key === 'j' || e.key === 'J' || e.code === 74 || e.code === 106){
        	pop_creator.style.display = "flex";
		}
	}
});

open_pop_creator.addEventListener("click",function(){
	pop_creator.style.display = "flex";
});

pop_creator.addEventListener("click",function(e){
	let tagE = e.target.tagName;
	if(tagE !== "DIV" && tagE !== "H3" && tagE !== "SPAN" && tagE !== "A"){
		this.style.display = "none";
	}
});