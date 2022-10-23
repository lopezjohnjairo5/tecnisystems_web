<section id="new_client">
  <div class="new_client_content">
    <form class="new_client_form" id="new_client_form" action="index.html" method="post">
      <br>
      <h4>Información general cliente</h4>
      <br>
      <hr>
      <br>
      <input class=" hidden" type="password" name="client_token_update" id="client_token_update" disabled>
      <input class="general_inputs" type="number" name="client_document" id="client_document" placeholder="* Documento">
      <input class="general_inputs" type="text" name="client_name" id="client_name" placeholder="* Empresa">
      <input class="general_inputs" type="text" name="client_charge" id="client_charge" placeholder="* Persona a cargo">
      <input class="general_inputs Vmail" type="email" name="client_email" id="client_email" placeholder="* Email">
      <input class="general_inputs" type="tel" name="client_phone" id="client_phone" placeholder="* Teléfono">
      <input class="general_inputs" type="tel" name="client_alternative_phone" id="client_alternative_phone" placeholder=" Teléfono alternativo">
      <div class="">
        <br>
        <h4>Maquinaria cliente</h4>
        <br>
        <hr>
        <br>
        <label for="cb_machine_client1"> <input type="checkbox" name="cb_machine_client1" id="cb_machine_client1" value="1" checked>Planta eléctrica </label>
        <label for="cb_machine_client2"> <input type="checkbox" name="cb_machine_client2" id="cb_machine_client2" value="2">Aire acondicionado </label>
        <label for="cb_machine_client3"> <input type="checkbox" name="cb_machine_client3" id="cb_machine_client3" value="3">Motoboma </label>
      </div>
      <br>
      <br>
      <hr>
      <br>
      <br>
      <h4>Direcciones</h4>
      <br>
      <hr>
      <br>
      <div class="multiple_address_clients">
        <div id="inputs_address_client_info" class="addres_client_sections">
          <input class="general_inputs" type="text" name="client_address" id="client_address" placeholder="* Dirección">
          <select class="general_inputs" id="department" name="" required>
            <option value="">* ...Seleccione un departamento...</option>
            <?php
            foreach ($departments_token as $key) {
              echo '<option value="'.$key[1].'">'.$key[0].'</option>';
            }
            ?>
          </select>

          <select class="general_inputs" id="city" name="" required>
            <option value="">* ...Seleccione una ciudad...</option>
          </select>
          <button type="button" class="general_input_button" id="btn_add_address_client" name="button">Añadir a tabla</button>
        </div>
        <div id="buttons_address_client_info" class="addres_client_sections">
          <table id="table_clients_address_content">
            <thead>
              <tr>
                <th>Dirección</th>
                <th>Departamento</th>
                <th>Ciudad</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbody_clients_address_content">

            </tbody>
          </table>
        </div>
      </div>

      <br>
      <hr>
      <br>
      <br>
      <a class="general_input_button" name="new_client_btn" id="new_client_btn">Registrar nuevo usuario</a>
      <div class="btns_update_info_client">
        <a class="general_input_button hidden" name="update_client_btn" id="update_client_btn">Update nuevo usuario</a>
        <a class="general_input_button hidden" name="return_client_btn" id="return_client_btn">Volver a nuevo usuario</a>
      </div>

      <br>
      <br>
    </form>
  </div>
</section>
