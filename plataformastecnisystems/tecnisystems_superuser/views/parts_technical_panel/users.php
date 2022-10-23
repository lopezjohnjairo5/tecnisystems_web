<section id="users" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_informe.png" alt="">
    <h1>Usuarios</h1>
    <hr>
    <br>
  </div>
  <div class="tab_buttons">
    <button type="button" id="btn_tab_search_technical" class="tabs" name="button">Buscar</button>
    <button type="button" id="btn_tab_new_technical" class="tabs" name="button">Nuevo / Actualizar usuario </button>
  </div>
  <div id="search_technical" class="content_tabs">
    <div id="search_technical_content">
      <form id="form_search_technical_content" action="index.html" method="post">
        <select class="" name="typeElementToSearch" id="typeElementToSearch">
          <option value="0">...Seleccione una opción...</option>
          <option value="1">Personal Técnico</option>
          <option value="2">Personal Administrativo</option>
          <option value="3">Personal Bodega</option>
        </select>
        <input type="search" name="input_search_technical" id="input_search_technical" placeholder="NIT, nombre, email">
        <button type="button" name="btn_search_technical" id="btn_search_technical" ><img src="<?php echo IMGS;?>ico_buscar.png" alt="icono buscar"></button>
      </form>
      <div class="max_size_table">
        <table id="table_technicals_info" class="table_responsive_format">
          <thead>
            <tr>
              <th class="sort_elements_table_users" id="tti_document" >NIT <img src="./imgs/cont_exp.png"></th>
              <th class="sort_elements_table_users" id="tti_name" >Nombre <img src="./imgs/cont_exp.png"></th>
              <th>Email</th>
              <th class="sort_elements_table_users" id="tti_rol" >Rol <img src="./imgs/cont_exp.png"></th>
              <th class="sort_elements_table_users" id="tti_state" >Estado <img src="./imgs/cont_exp.png"></th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="table_content_technicals_info">

          </tbody>
        </table>
      </div>
      <?php
        include TP."pagination_user_table.php";
      ?>
    </div>
  </div>
  <div id="new_technical" class="content_tabs">
    <form class="" id="form_new_technical_user" action="index.html" method="post">
      <div id="select_operation_user">
        <label for="newUpdateOption1"> <input type="radio" name="newUpdateOption" id="newUpdateOption1" value="1" checked>Nuevo usuario</label>
        <label for="newUpdateOption2"> <input type="radio" name="newUpdateOption" id="newUpdateOption2" value="2">Actualizar usuario</label>
      </div>
      <span id="tokenElement">0</span>
      <select id="new_type_user" name="typeUser">
        <option value="0" selected>Seleccione el tipo de usuario</option>
        <option value="1">Técnico</option>
        <option value="2">Administrativo</option>
        <option value="3">Bodega</option>
      </select>
      <br>
      <input type="text" name="nitTechnical" id="nitTechnical" placeholder="Documento">
      <input type="text" name="nameTechnical" id="nameTechnical" placeholder="Nombre">
      <input type="email" name="emailTechnical" id="emailTechnical" placeholder="Email">
      <select class="" name="typeTechnical" id="typeTechnical">
        <option value="0">Seleccione el rol del usuario</option>
        <option value="1">Eléctrico</option>
        <option value="2">Aire acondicionado</option>
        <option value="3">Motobombas</option>
      </select>

      <br>
      <button type="button" class="general_input_button" name="saveInfoTechnical" id="saveInfoTechnical">Guardar</button>
    </form>
  </div>
  <?php
    include POPS."pop_record_users.php";
    include POPS."pop_change_state_user.php";
    include POPS."pop_restart_access_user.php";
  ?>
</section>
