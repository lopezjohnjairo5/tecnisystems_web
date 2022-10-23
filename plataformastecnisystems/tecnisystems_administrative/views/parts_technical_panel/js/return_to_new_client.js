function return_to_new_client (){
  let update_client_btn = document.getElementById("update_client_btn"),
  return_client_btn = document.getElementById("return_client_btn"),
  new_client_btn = document.getElementById("new_client_btn");

  clean_inputs();
  clear_body_table("tbody_clients_address_content");
  view_hidde_btns([update_client_btn, return_client_btn],[new_client_btn]);
}

let return_client_btn = document.getElementById("return_client_btn");
return_client_btn.addEventListener("click", function(){
  return_to_new_client();
});
