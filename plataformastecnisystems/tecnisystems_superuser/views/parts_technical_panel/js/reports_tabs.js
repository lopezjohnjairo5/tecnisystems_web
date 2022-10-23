function reports_tabs(){
  var tb1 = document.getElementById("search_technical");
  var tb2 = document.getElementById("new_technical");

  if(this.id == "btn_tab_search_technical"){
    tb1.style.display = "block";
    tb2.style.display = "none";
  }
  if(this.id == "btn_tab_new_technical"){
    tb1.style.display = "none";
    tb2.style.display = "block";
  }
}

var btn_tab_search_technical = document.getElementById("btn_tab_search_technical");
var btn_tab_new_technical = document.getElementById("btn_tab_new_technical");
btn_tab_search_technical.addEventListener("click",reports_tabs);
btn_tab_new_technical.addEventListener("click",reports_tabs);
