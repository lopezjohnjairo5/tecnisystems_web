let btn_add_address_client = document.getElementById('btn_add_address_client');
btn_add_address_client.addEventListener('click',() => {
  let client_address = document.getElementById('client_address');
  let department = document.getElementById('department');
  let city = document.getElementById('city');
  let tbody_clients_address_content = document.getElementById('tbody_clients_address_content');
  let content = '';

  if (client_address.value !== "" && department.value !== "" && city.value !== "") {

    content += `<tr id="rowAdressClient_${document.querySelectorAll('#tbody_clients_address_content tr').length + 1}">`;
    content += `<td>${client_address.value}</td>`;
    content += `<td id="${department.value}">${department.options[department.selectedIndex].text}</td>`;
    content += `<td id="${city.value}">${city.options[city.selectedIndex].text}</td>`;
    content += `<td><a href="#rowAdressClient_${document.querySelectorAll('#tbody_clients_address_content tr').length + 1}" class = "delete_table_address_client_element">X</a></td>`;
    content += `</tr>`;

    tbody_clients_address_content.innerHTML += content;

    client_address.value = '';
    department.value = '';
    city.value = '';
  } else {
    alert("Los campos dirección, departamento y ciudad, son obligatorios. \nPor favor verifique e intente nuevamente.")
  }
});
