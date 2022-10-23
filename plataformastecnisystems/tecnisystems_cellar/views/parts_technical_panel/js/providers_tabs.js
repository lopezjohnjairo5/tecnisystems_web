function providers_tabs(){
  var tb1 = document.getElementById("search_provider");
  var tb2 = document.getElementById("new_provider");

  if(this.id == "button_prov_new"){
    tb1.style.display = "none";
    tb2.style.display = "block";
  }

  if(this.id == "button_prov_search"){
    tb1.style.display = "block";
    tb2.style.display = "none";
  }
}

var button_prov_new = document.getElementById("button_prov_new");
var button_prov_search = document.getElementById("button_prov_search");
button_prov_new.addEventListener("click",providers_tabs);
button_prov_search.addEventListener("click",providers_tabs);
