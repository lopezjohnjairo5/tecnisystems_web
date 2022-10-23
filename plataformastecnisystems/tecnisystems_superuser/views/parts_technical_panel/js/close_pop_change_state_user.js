function close_pop_change_state_user(){
  let pop_change_state_user = document.getElementById("pop_change_state_user");
  pop_change_state_user.style.display = "none";
}

let close_info_state_user = document.getElementById("close_info_state_user");
close_info_state_user.addEventListener("click",close_pop_change_state_user);
