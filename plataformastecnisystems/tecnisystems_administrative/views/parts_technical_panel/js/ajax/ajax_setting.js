function ajax_setting(){

  var url = "./controllers/setting_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    data: $("#form_settings_technical_panel").serialize(),
    success: function(data)
    {
      alert(data);
      document.getElementById('setting_email').value="";
      document.getElementById('setting_pass').value="";
      document.getElementById('setting_new_pass').value="";
      document.getElementById('setting_conf_new_pass').value="";

      let msn = "Cambio de contraseña: ";
      ajax_save_record_user(msn);

    }
  });
}

var send_update = document.getElementById('setting_update_btn');
send_update.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_setting,time:500});
});
