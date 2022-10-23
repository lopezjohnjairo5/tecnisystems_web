function ajax_delete_provider_search(tokenProvToDelete){
  let new_token = tokenProvToDelete.split("prov_")[1];
  content = "Eliminando proveedor con Token: "+tokenProvToDelete;
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "tokenToDelete": new_token
  });
  json_object.data = json_data;

  var url = "./controllers/delete_provider_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      alert(json);

      if (json == "Redirigir") {
        location.reload();
      }else{
        ajax_search_providers();
      }
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}


let tbody_provider_content =  document.getElementById("tbody_provider_content");
tbody_provider_content.addEventListener("click",function(e){
  if(e.target.tagName === "IMG" && e.target.classList.contains("delete_this_element")){
		let tokenProvToDelete = e.target.closest("tr").id;
    let continue_delete = confirm("¿Esta seguro de eliminar este elemento?.");
    if (continue_delete) {
      ajax_delete_provider_search(tokenProvToDelete);
    }
  }
});
