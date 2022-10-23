
let tbody_clients_address_content = document.getElementById('tbody_clients_address_content');
tbody_clients_address_content.addEventListener('click', (e) => {
  let id_delete_element = '';
  if (e.target.tagName === "A") {
    resp = confirm('¿Desea eliminar este registro? (S/N)');
    if (resp) {
      document.getElementById(e.target.parentElement.parentElement.id).remove();
    }
  }
});
