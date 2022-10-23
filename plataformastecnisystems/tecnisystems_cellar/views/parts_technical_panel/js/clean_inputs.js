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

let btn_clean_inputs_product = document.getElementById("btn_clean_inputs_product");
btn_clean_inputs_product.addEventListener("click",function(){
  clean_inputs();
});

let btn_clean_inputs_provider = document.getElementById("btn_clean_inputs_provider");
btn_clean_inputs_provider.addEventListener("click",function(){
  clean_inputs();
});
