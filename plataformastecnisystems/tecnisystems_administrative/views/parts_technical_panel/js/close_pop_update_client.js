function close_pop_update_client(){
  let pop_update_client = document.getElementById("pop_update_client");
  pop_update_client.style.display = "none";
}

let btn_close_pop_update_client = document.getElementById("close_pop_update_client");
btn_close_pop_update_client.addEventListener("click",() => {
  close_pop_update_client();
});
