function show_hidde_new_user_select(value_el){
  let typeTechnical = document.getElementById("typeTechnical");
  if (value_el) {
    typeTechnical.style.display = "block";
  }else{
    typeTechnical.style.display = "none";
  }
}

let new_type_user = document.getElementById("new_type_user");
new_type_user.addEventListener("change",function(){
  let value_el = false;
  if(this.value != 1){
    value_el = false;
  }else{
    value_el = true;
  }
  show_hidde_new_user_select(value_el);
});
