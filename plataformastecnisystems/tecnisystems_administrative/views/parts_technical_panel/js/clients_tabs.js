function reports_tabs(){

  var tb1 = document.getElementById("new_client");
  var tb2 = document.getElementById("search_client");

  if(this.id == "reports_tab_search_client"){
    tb1.style.display = "none";
    tb2.style.display = "block";
  }
  if(this.id == "reports_tab_new_client"){
    tb1.style.display = "block";
    tb2.style.display = "none";
  }
}


var reports_tab_new_client = document.getElementById("reports_tab_new_client");
var reports_tab_search_client = document.getElementById("reports_tab_search_client");
reports_tab_new_client.addEventListener("click",reports_tabs);
reports_tab_search_client.addEventListener("click",reports_tabs);
