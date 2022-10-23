function close_pop_record_user(){
  let pop_record_users = document.getElementById("pop_record_users");
  pop_record_users.style.display = "none";
}

let close_info_user_search = document.getElementById("close_info_user_search");
close_info_user_search.addEventListener("click",close_pop_record_user);
