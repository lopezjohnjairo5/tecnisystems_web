function ajax_new_provider(){
  var url = "./controllers/new_provider_controller.php";

  $.ajax({
    type: "POST",
    url: url,
    data: $("#form_provider_technical_panel").serialize(),
    success: function(data)
    {
      alert(data);
      msn = data;
      ajax_save_record_user(msn);
    }
  });
}

var send_provider = document.getElementById('provider_send_btn');
send_provider.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_new_provider,time:500});
});
