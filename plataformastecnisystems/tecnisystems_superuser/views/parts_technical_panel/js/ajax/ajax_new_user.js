
function ajax_new_user(){
  var url = "./controllers/new_user_controller.php";
  let new_type_user = document.getElementById("new_type_user").value;
  let nitTechnical = document.getElementById("nitTechnical").value;
  let nameTechnical = document.getElementById("nameTechnical").value;
  let emailTechnical = document.getElementById("emailTechnical").value;
  let rolTechnical = document.getElementById("typeTechnical").value;
  let tokenUser = document.getElementById("tokenElement").innerHTML;
  let action = document.getElementsByName("newUpdateOption");
  let actionVal = 0;

  for (var i = 0; i < action.length; i++) {
    if (action[i].checked) {
      actionVal = action[i].value;
    }
  }

  let json_data = [];
  let json_object = {};

  json_data.push({
    "action":actionVal,
    "tokenUser":tokenUser,
    "TypeUser":new_type_user,
    "nitTechnical":nitTechnical,
    "nameTechnical":nameTechnical,
    "emailTechnical":emailTechnical,
    "rolTechnical":rolTechnical
  });
  json_object.data = json_data;

  $.ajax({
    type: "POST",
    url: url,
    data: json_object,
    success: function(data)
    {
      switch (data) {
        case "correct":
          alert("Nuevo usuario insertado correctamente. Se ha enviado un correo al usuario.");
          break;
        case "correct_update":
          alert("Actualización correcta. Se ha enviado un correo al usuario.");
          break;
        case "exist":
          alert("El usuario que intenta insertar ya existe. Verifique e intente nuevamente.");
          break;
        case "content_error":
          alert("Todos los campos son obligatorios. Verifique e intente nuevamente");
          break;
        case "update_error":
          alert("Problema al actualizar la informacion. \nEs posible que no se detectaran cambios en la información introducida.\nVerifique e intente nuevamente.");
          break;
        case "error":
          alert("Problema al Insertar nuevo usuario, es posible que el usuario que intenta agregar ya exista o que los datos no correspondan al valor solicitado. \nPor favor verifique todos los campos e intente nuevamente.");
          break;
        case "Redirigir":
          location.reload();
          break;
        default:
          if (data !== "" && data !== undefined && data !== "NaN") {
            alert(data);
            let msn = "Actualización del estado del usuario: "+tokenUser+" - "+rol;
            ajax_save_record_user(msn);
          }
      }
    }
  });
}

let saveInfoTechnical = document.getElementById("saveInfoTechnical");
saveInfoTechnical.addEventListener("click", function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_new_user,time:500});
});
