<section id="search_provider">
  <br>
  <div class="search_bar_provider">
    <input type="search" id="search_provider_input" name="search_provider_input" placeholder="Proveedor, email, departamento, ciudad, teléfono, t(todos)">
    <button type="button" id="btn_search_provider" name="btn_search_provider"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
  </div>
  <br>
  <br>
  <div class="max_size_table">
    <table id="table_provider_content" class="table_responsive_format">
      <thead>
        <th class="sort_elements_table_search_provider" id="tbsr_prov_name" >Proveedor <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_provider" id="tbsr_prov_phone" >Teléfono1 <img src="./imgs/cont_exp.png"></th>
        <th >Teléfono2</th>
        <th>Email</th>
        <th>Dirección</th>
        <th class="sort_elements_table_search_provider" id="tbsr_prov_dep" >Departamento <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_provider" id="tbsr_prov_city" >Ciudad <img src="./imgs/cont_exp.png"></th>
        <th>Acciones</th>
      </thead>
      <tbody id="tbody_provider_content">

      </tbody>
    </table>
  </div>
  <?php
    include TP."pagination_provider.php";
  ?>
</section>
