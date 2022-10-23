function views_display_info_alert(title="Cargando...", msg="Por favor espere un momento.", timeWait = 500){
  let title_display_info = document.getElementById("title_display_info");
  let msg_display_info = document.getElementById("msg_display_info");

  title_display_info.innerHTML = title;
  msg_display_info.innerHTML = msg;

  $("#display_info_alert").css("display","flex").hide().fadeIn('slow',function(){
    $("#display_info_alert").fadeOut(4000);
  });
}
