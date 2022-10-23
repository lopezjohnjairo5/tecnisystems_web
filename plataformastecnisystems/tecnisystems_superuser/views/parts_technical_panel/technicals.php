<section id="technicals" class="content_technical_panel_sections">

  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_informe.png" alt="">
    <h1>Tecnicos</h1>
    <hr>
    <br>
  </div>
  <div class="tab_buttons">
    <button type="button" id="btn_tab_search_technical" class="tabs" name="button">Buscar</button>
    <button type="button" id="btn_tab_new_technical" class="tabs" name="button">Nuevo</button>
  </div>
  <div id="search_technical" class="content_tabs">
    <div id="search_technical_content">
      <form class="" action="index.html" method="post">
        <input type="search" name="input_search_technical" id="input_search_technical" placeholder="NIT, nombre, email">
        <button type="button" name="btn_search_technical" id="btn_search_technical" ><img src="<?php echo IMGS;?>ico_buscar.png" alt="icono buscar"></button>
      </form>
      <table id="table_technicals_info" class="table_responsive_format">
        <thead>
          <tr>
            <th>NIT</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Tipo Usuario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>123456789</td>
            <td>Jorge</td>
            <td>Jorge@gmail.com</td>
            <td>Técnico</td>
            <td>electrico</td>
            <td>
              <a href="#" title="Editar" ><img class="imgs_actions_table" src="<?php echo IMGS;?>ico_informe.png" alt="Editar"></a>
              <a href="#" title="deshabilitar/habilitar" ><img class="imgs_actions_table" src="<?php echo IMGS;?>ico_eliminar.png" alt="deshabilitar/habilitar"></a>
              <a href="#" title="Localizar" ><img class="imgs_actions_table" src="<?php echo IMGS;?>ico_ver.png" alt="Localizar"></a>
              <a href="#" title="Historial" ><img class="imgs_actions_table" src="<?php echo IMGS;?>ico_historial.png" alt="Historial"></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div id="new_technical" class="content_tabs">
    <form class="" id="form_new_technical_user" action="index.html" method="post">
      <select class="" name="typeUser">
        <option value="0">Seleccione el tipo de usuario</option>
        <option value="1">Técnico</option>
        <option value="2">Administrativo</option>
        <option value="3">Bodega</option>
      </select>
      <br>
      <input type="text" name="nitTechnical" placeholder="Documento">
      <input type="text" name="nameTechnical" placeholder="Nombre">
      <input type="email" name="emailTechnical" placeholder="Email">
      <select class="" name="typeTechnical">
        <option value="0">Seleccione el rol del usuario</option>
        <option value="1">Eléctrico</option>
        <option value="2">Aire acondicionado</option>
        <option value="3">Motobombas</option>
      </select>

      <br>
      <button type="button" class="general_input_button" name="saveInfoTechnical" id="saveInfoTechnical">Guardar</button>
    </form>
  </div>
</section>
