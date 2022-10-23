function ajax_search_product(){
  content = document.getElementById('search_product_input').value;
  record_nav_user.push(get_date_time());
  record_nav_user.push(lat_long);
  record_nav_user.push(content);

  let json_data = [];
  let json_object = {};

  json_data.push({
    "serial": content
  });
  json_object.data = json_data;
  var url = "./controllers/search_product_controller.php";

  $.ajax({
    url: url,
    data: json_object,
    type: "POST",
    success: function(json)
    {
      switch (json) {
        case "Error":
        case "NaN":
        case undefined:
          alert("Error. \nTodos los campos son obligatorios. Por favor, Verifique e intente nuevamente.");
          break;

        default:
          let tableRP = document.getElementById("tbody_product_content");
          let contentTRP = "";
          tableRP.innerHTML = "";

          let amount = 2;
          let response = JSON.parse(json);
          let amount_content_pages = "";
          let page_num = 1;
          let count = 1;
          let hidde = "";
          let objLengthDataPages = length_data_for_pages(response, amount);

          for (var i = 0; i < objLengthDataPages.length_data; i++) {
            if (page_num !== 1) {
              hidde = "hidden";
            }
            contentTRP += `<tr class="page_${page_num} ${hidde}" id="${response[i]['idCellarGeneralInfoProduct']}">`;
            contentTRP += `<td>${response[i]['serialProduct']}</td>`;
            contentTRP += `<td>${response[i]['Product']}</td>`;
            contentTRP += `<td>${response[i]['Brand']}</td>`;
            contentTRP += `<td>${response[i]['Supplier']}</td>`;
            contentTRP += `<td>${response[i]['idTypeProduct']}- ${response[i]['Type']}</td>`;
            contentTRP += `<td>${response[i]['productStatus']}</td>`;
            contentTRP += `<td class="img_previews_tables"><a target="_blank" href="${response[i]['pathQR']}"> <img src="./imgs/ico_qr.png" alt="QR - ${response[i]['Product']}"></a> </td>`;
            contentTRP += `<td class="img_previews_tables"><a target="_blank" href="${response[i]['pathDatasheet']}"> <img src="./imgs/ico_ver.png" alt="datasheet - ${response[i]['Product']}"></a> </td>`;
            contentTRP += `<td class="img_previews_tables"><a href="#"> <img class="delete_this_element" src="./imgs/ico_eliminar.png" alt="delete - ${response[i]['Product']}"></a> <a href="#" ><img class="view_info_product" data-type-p="${response[i]['idTypeProduct']}" src="./imgs/ico_historial.png" alt="view - ${response[i]['Product']}"></a> </td>`;
            contentTRP += `</tr>`;

            if (count < amount) {
              count += 1;
            } else {
              page_num += 1;
              count = 1;
            }
          }

          for (var i = 1; i <= objLengthDataPages.amount_pages_int; i++) {
            amount_content_pages += `<span><a href="#" id="page_${i}">${i}</a></span>`;
          }

          tableRP.innerHTML += contentTRP;
          containerNumberPagesProduct.innerHTML = `${amount_content_pages}`;
          break;
        }
    },
    error : function(xhr, status) {
        alert('Disculpe, hay un problema '+status);
    }
  });
}

var btn_search_product = document.getElementById('btn_search_product');
btn_search_product.addEventListener("click",function(){
  Async({fn:views_display_info_alert,time:0});
  Async({fn:ajax_search_product,time:500});
});
