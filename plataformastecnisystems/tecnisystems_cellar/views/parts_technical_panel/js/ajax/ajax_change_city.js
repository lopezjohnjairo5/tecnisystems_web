function ajax_change_city(content){
  var url = "./controllers/change_city_controller.php";

  let json_data = [];
  let json_object = {};

  json_data.push({
    "department":content
  });
  json_object.data = json_data;

  $.ajax({
    type: "POST",
    url: url,
    data: json_object,
    success: function(json)
    {
      let city = document.getElementById("city");
      let content = `<option value="">...Seleccione una opcion...</option>`;

      result = JSON.parse(json);
      for (var i = 0; i < result.length; i++) {
        content += `<option value="${result[i][1]}">${result[i][0]}</option>`
      }

      city.innerHTML = content;
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}

let btn_department = document.getElementById("department");
btn_department.addEventListener("change",function(){
  ajax_change_city(this.value);
});
