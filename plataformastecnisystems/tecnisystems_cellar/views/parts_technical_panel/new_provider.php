<section id="new_provider">
  <form id="form_provider_technical_panel" method="post">
    <label for="supplier_provider">*Proveedor</label> <input type="text" id="supplier_provider" name="supplier_provider" placeholder="*Proveedor" required>
    <label for="address_provider">*Dirección</label> <input type="text" id="address_provider" name="address_provider" placeholder="*Dirección" required>
    <label for="email_provider">*Correo</label> <input type="text" id="email_provider" name="email_provider" placeholder="*Correo" required>
    <label for="phone1_provider">*Teléfono 1</label> <input type="text" id="phone1_provider" name="phone1_provider" placeholder="*Teléfono 1" required>
    <label for="phone2_provider">Teléfono 2</label> <input type="text" id="phone2_provider" name="phone2_provider" placeholder="Teléfono 2">
    <label for="department">*Departamento</label> <select class="" id="department" name="department" required>
      <option value="">* ...Seleccione una opción...</option>
      <?php
      foreach ($departments_token as $key) {
        echo '<option value="'.$key[1].'">'.$key[0].'</option>';
      }
      ?>
    </select>
    <label for="city">*Ciudad</label> <select class="" id="city" name="city" required>
      <option value="">* ...Seleccione una opción...</option>
    </select>
    <br>
  </form>
  <div class="btns_forms">
    <a class="general_input_button" name="btn_clean_inputs_provider" id="btn_clean_inputs_provider">Limpiar</a>
    <a class="general_input_button" name="provider_send_btn" id="provider_send_btn">Enviar</a>
  </div>
</section>
