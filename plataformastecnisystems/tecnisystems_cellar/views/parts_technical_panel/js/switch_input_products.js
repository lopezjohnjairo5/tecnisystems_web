function change_switch_inputs_products(type){
  let ep = document.getElementById("electric_product");
  let acp = document.getElementById("air_conditioning_product");
  let pp = document.getElementById("pump_product");
  let tp = parseInt(type);

  ep.classList.add("hidde_element");
  acp.classList.add("hidde_element");
  pp.classList.add("hidde_element");

  if (tp === 1) {
    ep.classList.remove("hidde_element");
  }
  if (tp === 2) {
    acp.classList.remove("hidde_element");
  }
  if (tp === 3) {
    pp.classList.remove("hidde_element");
  }
}

let type_p = document.getElementById("type_product");
type_p.addEventListener("change",function(){
  change_switch_inputs_products(type_p.value);
});
