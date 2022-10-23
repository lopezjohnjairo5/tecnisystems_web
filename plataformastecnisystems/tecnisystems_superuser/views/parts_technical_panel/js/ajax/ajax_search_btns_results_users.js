function create_url_coords_map(lat,long){
  let new_lat = lat > 0 ? convert_coords_hexa_to_grades(Math.abs(lat)) + "N" : convert_coords_hexa_to_grades(Math.abs(lat)) +"S";
  let new_long = long > 0 ? convert_coords_hexa_to_grades(Math.abs(long)) + "E" : convert_coords_hexa_to_grades(Math.abs(long)) + "W";
  let url = `https://www.google.es/maps/place/${new_lat}+${new_long}`;
  return url;
}

function convert_coords_hexa_to_grades(value){
  let grades = Math.trunc(value);
  let pass = (value - grades)*60;
  let min = Math.trunc(pass);
  let sec = ((pass - min)*60).toFixed(5);
  return `${grades}%C2%B0${min}'${sec}%22`;
}

function ajax_search_record_user(tokenUser,rol,infoUser){
  var url = "./controllers/search_record_user_controller.php";
  let json_data = [];
  let json_object = {};

  json_data.push({
    "token":tokenUser,
    "rol":rol,
  });
  json_object.data = json_data;

  $.ajax({
    type: "POST",
    url: url,
    data: json_object,
    success: function(data)
    {
      if (data == "not_found") {
        alert("No se encuentra el historial del usuario. Verifique e intente nuevamente.");
      }else if(data == "Redirigir"){
        location.reload();
      }else{
        let pop_record_users = document.getElementById("pop_record_users");
        let info_user_search = document.getElementById("info_user_search");
        let content_table_record_search_user = document.getElementById("content_table_record_search_user");
        content_table_record_search_user.innerHTML = "";
        let new_data = JSON.parse(data);
        let content = "";
        let ancle_url = "";

        for (var i = 0; i < new_data.length; i++) {
            ancle_url = create_url_coords_map(new_data[i]["Latitude"],new_data[i]["longitude"]);
            content += `<tr>`;
            content += `<td>${new_data[i]["Record"]}</td>`;
            content += `<td>${new_data[i]["dateRecord"]}</td>`;
            content += `<td>${new_data[i]["timeRecord"]}</td>`;
            content += `<td><a href="${ancle_url}" target="_blank"><img src="./imgs/ico_posicion.png" title="ver en mapa" alt="ver en mapa - tecnisystems"></a></td>`;
            content += `</tr>`;
        }

        info_user_search.innerHTML = `<span><b>Documento:</b> ${infoUser[0]}</span>
        <span><b>Nombre:</b> ${infoUser[1]}</span>
        <span><b>Correo:</b> ${infoUser[2]}</span>
        <span><b>Rol:</b> ${infoUser[3]}</span>
        <span><b>Estado:</b> ${infoUser[4]}</span>`;

        content_table_record_search_user.innerHTML = content;
        pop_record_users.style.display = "flex";
      }
    }
  });
}


var table_content_technicals_info = document.getElementById('table_content_technicals_info');
table_content_technicals_info.addEventListener("click",function(e){
  let element = e.target.parentNode;
  let tr_element = element.parentNode.parentNode;
  let tr_element_childrens = element.parentNode.parentNode.childNodes;
  let tt = tr_element.id.split("-");
  let documentUser = "";
  let nameUser = "";
  let emailUser = "";
  let rolUser = "";
  let stateUser = "";

  tokenUser = tt[0];
  rol = tt[1];

  for (var i = 0; i < tr_element_childrens.length; i++) {
    if (tr_element_childrens[i].className === "document_user_data") {
      documentUser = tr_element_childrens[i].innerHTML;
    }else if(tr_element_childrens[i].className === "name_user_data") {
      nameUser = tr_element_childrens[i].innerHTML;
    }else if(tr_element_childrens[i].className === "email_user_data") {
      emailUser = tr_element_childrens[i].innerHTML;
    }else if(tr_element_childrens[i].className === "rol_user_data") {
      rolUser = tr_element_childrens[i].innerHTML;
    }else if(tr_element_childrens[i].className === "state_user_data") {
      stateUser = tr_element_childrens[i].innerHTML;
    }
  }

  arrayInfoUser = [documentUser,nameUser,emailUser,rolUser,stateUser];

  if(element.tagName === 'A' && element.className === "view_record_user"){
    ajax_search_record_user(tokenUser,rol,arrayInfoUser);
  } else if (element.tagName === 'A' && element.className === "edit_search_user"){
    let new_type_user = document.getElementById("new_type_user");
    let nitTechnical = document.getElementById("nitTechnical");
    let nameTechnical = document.getElementById("nameTechnical");
    let emailTechnical = document.getElementById("emailTechnical");
    let typeTechnical = document.getElementById("typeTechnical");
    let tokenElement = document.getElementById("tokenElement");
    let newUpdateOption2 = document.getElementById("newUpdateOption2");
    let newUpdateOption1 = document.getElementById("newUpdateOption1");
    let search_technical = document.getElementById("search_technical");
    let new_technical = document.getElementById("new_technical");

    if (arrayInfoUser[3].split(" ")[0] == "técnico") {
      new_type_user.value = 1;
      if(arrayInfoUser[3] == "técnico eléctrico"){
        typeT = 1;
      }else if(arrayInfoUser[3] == "técnico aire acondicionado"){
        typeT = 2;
      }else if(arrayInfoUser[3] == "técnico motobombas"){
        typeT = 3;
      }
      typeTechnical.style.display = "block";
    }else if(arrayInfoUser[3] == "Administrativo"){
      new_type_user.value = 2;
      typeT = 0;
      typeTechnical.style.display = "none";
    }else if(arrayInfoUser[3] == "Bodega"){
      new_type_user.value = 3;
      typeT = 0;
      typeTechnical.style.display = "none";
    }

    nitTechnical.value = arrayInfoUser[0];
    nameTechnical.value = arrayInfoUser[1];
    emailTechnical.value = arrayInfoUser[2];
    typeTechnical.value = typeT;
    tokenElement.innerHTML = tokenUser;

    search_technical.style.display = "none";
    new_technical.style.display = "block";
    newUpdateOption2.checked = true;
    newUpdateOption1.checked = false;

  }else if(element.tagName === 'A' && element.className === "active_inactive_search_user"){
    let pop_change_state = document.getElementById("pop_change_state_user");
    let info_user_search_state = document.getElementById("info_user_search_state");
    pop_change_state.style.display = "flex";
    info_user_search_state.innerHTML = `<div class= "${tr_element.id}"><span><b>Documento:</b> ${arrayInfoUser[0]}</span>
    <span><b>Nombre:</b> ${arrayInfoUser[1]}</span>
    <span><b>Correo:</b> ${arrayInfoUser[2]}</span>
    <span><b>Rol:</b> ${arrayInfoUser[3]}</span>
    <span><b>Estado:</b> ${arrayInfoUser[4]}</span></div>`;

  }else if(element.tagName === 'A' && element.className === "restart_search_user"){
    let pop_restart_access_user = document.getElementById("pop_restart_access_user");
    let info_restart_access_user = document.getElementById("info_restart_access_user");
    pop_restart_access_user.style.display = "flex";
    info_restart_access_user.innerHTML = `<div class= "${tr_element.id}"><span><b>Documento:</b> ${arrayInfoUser[0]}</span>
    <span><b>Nombre:</b> ${arrayInfoUser[1]}</span>
    <span><b>Correo:</b> ${arrayInfoUser[2]}</span>
    <span><b>Rol:</b> ${arrayInfoUser[3]}</span>
    <span><b>Estado:</b> ${arrayInfoUser[4]}</span></div>`;
  }
});
