function reports_tabs(){
  var tb1 = document.getElementById("record_electrical_content");
  var tb2 = document.getElementsByClassName('content_tab1_reports');

  if(this.id == "reports_tab_new"){
    tb1.style.display = "none";
    for (var i = 0; i < tb2.length; i++) {
      tb2[i].style.display = "block";
    }
  }

  if(this.id == "reports_tab_record"){
    tb1.style.display = "block";
    ajax_search_record_reports();
    for (var i = 0; i < tb2.length; i++) {
      tb2[i].style.display = "none";
    }
  }
}


var reports_tab_new = document.getElementById("reports_tab_new");
var reports_tab_record = document.getElementById("reports_tab_record");
reports_tab_new.addEventListener("click",reports_tabs);
reports_tab_record.addEventListener("click",reports_tabs);
