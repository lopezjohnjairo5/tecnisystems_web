function open_pop_firms(event){
	console.log(event.id);
	if(event.id == "btn_firm_technical"){
		element = document.getElementById("pop_technical");
	}else{
		element = document.getElementById("pop_client");
	}
	element.style.display = "block";
}


function close_pop_firms(event){
	if(event.id == "close_pop_technical_firm"){
		element = document.getElementById("pop_technical");
	}else{
		element = document.getElementById("pop_client");
	}

	element.style.display = "none";
}

var firms = document.getElementsByClassName("btn_firms");
for (var i = 0; i < firms.length; i++) {
	firms[i].addEventListener("click",function(){
			open_pop_firms(this);
		});
}

var close_btns_firms = document.getElementsByClassName("close_pops_firms");
for (var i = 0; i < close_btns_firms.length; i++) {
	close_btns_firms[i].addEventListener("click",function(){
			close_pop_firms(this);
		});
}
