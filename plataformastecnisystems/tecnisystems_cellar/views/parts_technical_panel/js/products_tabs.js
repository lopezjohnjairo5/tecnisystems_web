function products_tabs(){
  var tb1 = document.getElementById("search_product");
  var tb2 = document.getElementById("new_product");

  if(this.id == "products_tab_new"){
    tb1.style.display = "none";
    tb2.style.display = "block";
  }

  if(this.id == "products_tab_record"){
    tb1.style.display = "block";
    tb2.style.display = "none";
  }
}


var products_tab_new = document.getElementById("products_tab_new");
var products_tab_record = document.getElementById("products_tab_record");
products_tab_new.addEventListener("click",products_tabs);
products_tab_record.addEventListener("click",products_tabs);
