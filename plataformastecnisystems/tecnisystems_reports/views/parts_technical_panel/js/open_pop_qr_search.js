function open_pop_qr_search(){
  activate_qr_scan();
  let pop_qr = document.getElementById('pop_qr');
  pop_qr.style.display = "block";
  let msn = "abriendo escaner QR: ";
  ajax_save_record_user(msn);
}

function close_pop_qr_search(){
  deletePermisions();
  let pop_qr2 = document.getElementById('pop_qr');
  pop_qr2.style.display = "none";
  let msn = "cerrando escaner QR: ";
  ajax_save_record_user(msn);
}

var btn_qr_search_machine = document.getElementById("btn_qr_search_machine");
btn_qr_search_machine.addEventListener("click",open_pop_qr_search);

var close_pop_qr = document.getElementById("close_pop_qr");
close_pop_qr.addEventListener("click",close_pop_qr_search);
