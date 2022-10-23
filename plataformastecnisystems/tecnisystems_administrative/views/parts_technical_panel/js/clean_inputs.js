function clean_inputs (){
  let btns_clean_form = document.getElementsByTagName("input");
  let textarea_clean_form = document.getElementsByTagName("textarea");

  for (var i = 0; i < btns_clean_form.length; i++) {
    if(btns_clean_form[i].type != "submit"){
      btns_clean_form[i].value="";
    }
  }

  for (var i = 0; i < textarea_clean_form.length; i++) {
    textarea_clean_form[i].value="";

  }
}

function clear_body_table (tableBody){
  let tableElemet = document.getElementById(tableBody);
  tableElemet.innerHTML = "";
}
