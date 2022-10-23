<section id="search_client">
  <div class="clients_search_content">
    <br>
      <div class="search_bar_client">
        <input type="search" id="search_client_input" name="search_client_input" placeholder="Empresa, email, responsable, cédula(n:numero ó nit:numero), teléfono(tel:numero ó telefono:numero), t(todos)">
        <button type="button" id="btn_search_client" name="btn_search_client"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
      </div>
      <br>
      <br>
        <div class="max_size_table">
          <table id="table_clients_content" class="table_responsive_format">
            <thead>
              <th class="sort_elements_table_search_client" id="tscc_nit">Documento <img src="./imgs/cont_exp.png"></th>
              <th class="sort_elements_table_search_client" id="tscc_name">Nombre <img src="./imgs/cont_exp.png"></th>
              <th class="sort_elements_table_search_client" id="tscc_person_in_charge">Responsable <img src="./imgs/cont_exp.png"></th>
              <th>Email </th>
              <th>Teléfono 1 </th>
              <th>Teléfono 2 </th>
              <th>Direcciones </th>
              <th>Maquinaria </th>
              <th class="sort_elements_table_search_client" id="tscc_state">Estado <img src="./imgs/cont_exp.png"></th>
              <th>Acciones </th>
            </thead>
            <tbody id="tbody_clients_content">

            </tbody>

          </table>
        </div>
  </div>
  <?php
  include TP."pagination_client_table.php";
  ?>
</section>

<?php
  include POPS."pop_update_state_client.php";
?>
