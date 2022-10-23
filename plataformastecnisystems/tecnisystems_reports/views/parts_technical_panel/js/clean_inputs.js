function clean_inputs(){
  let btns_clean_form = document.getElementsByTagName("input");
  let textarea_clean_form = document.getElementsByTagName("textarea");

  for (var i = 0; i < btns_clean_form.length; i++) {
    console.log(btns_clean_form[i]);
    if(btns_clean_form[i].type != "submit"){
      btns_clean_form[i].value="";
    }
  }

  for (var i = 0; i < textarea_clean_form.length; i++) {
    textarea_clean_form[i].value="";
  }
}

let clean_form = document.getElementById("clean_form");
clean_form.addEventListener("click",function(){
  clean_inputs()
});
