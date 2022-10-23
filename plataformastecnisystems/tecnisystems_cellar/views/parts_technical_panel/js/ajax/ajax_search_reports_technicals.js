function ajax_search_report(){
  content = document.getElementById('search_report_input').value;
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "searchReport": content
  });

  json_object.data = json_data;
  var url = "./controllers/search_reports_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      alert(json);
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}

var btn_search_report = document.getElementById('btn_search_report');
btn_search_report.addEventListener("click",function(){
  ajax_search_report();
});
