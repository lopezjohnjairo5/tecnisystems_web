
function prepare_ajax_data(cont){
  let json_data = [];
  let json_object = {};

  json_data.push({
    "date_time":[{"date":cont[0][0],"time":cont[0][1]}],
    "position_coords":[{"lat":cont[1][0],"lon":cont[1][1]}],
    "content":cont[2]
  });
  json_object.data = json_data;
  return json_object;

}

function ajax_save_record_user(content){
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);
  new_content = prepare_ajax_data(record_nav_user);

  var url = "./controllers/save_user_record_controller.php";

  $.ajax({
    url: url,
    data: new_content,
    type: "POST",
    success: function(json)
    {
      record_nav_user = [];
      if (json == "Redirigir") {
        location.reload();
      }
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}
