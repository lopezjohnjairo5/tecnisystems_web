function close_pop_restart_user(){
  let pop_restart_access_user = document.getElementById("pop_restart_access_user");
  pop_restart_access_user.style.display = "none";
}

let close_info_restart_access_user = document.getElementById("close_info_restart_access_user");
close_info_restart_access_user.addEventListener("click",close_pop_restart_user);
