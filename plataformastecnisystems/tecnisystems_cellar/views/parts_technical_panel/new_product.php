<section id="new_product">
  <form id="form_product_technical_panel" method="post">

    <div id="general_information_product" class="products_size">
      <label for="serial_product">*Serial / cod máquina</label> <input type="text" id="serial_product" name="serial_product" placeholder="*Serial" required>
      <label for="product">*Producto</label> <input type="text" id="product" name="product" placeholder="*Producto" required>
      <label for="brand_product">*Marca</label> <input type="text" id="brand_product" name="brand_product" placeholder="*Marca" required>
      <label for="datasheet_product">*Ficha técnica</label> <input type="file" id="datasheet_product" accept="application/pdf,application/msword,.doc,.docx" name="datasheet_product" placeholder="*ficha técnica" required>

      <label for="supplier_product">*Proveedor</label>
      <select id="supplier_product" name="supplier_product" placeholder="*Proveedor" required>

      </select>

      <label for="state_product">*Estado del producto</label>
      <select id="state_product" name="state_product" placeholder="*estado del producto" required>

      </select>

      <label for="type_product">*Tipo de producto</label>
      <select id="type_product" name="type_product" placeholder="*tipo de producto" required>

      </select>
    </div>

    <div id="electric_product" class="products_size">
      <br><h3>Información planta electrica</h3>
      <br><hr>
      <br>
      <label for="power_plant_product">*Planta electrica</label> <input type="text" id="power_plant_product" name="power_plant_product" placeholder="*Planta electrica" required>
      <label for="power_plant_model">*Modelo planta</label> <input type="text" id="power_plant_model" name="power_plant_model" placeholder="*Modelo planta" required>
      <label for="power_plant_serie">*Serie planta</label> <input type="text" id="power_plant_serie" name="power_plant_serie" placeholder="*Serie planta" required>
      <label for="motor_product">*Motor</label> <input type="text" id="motor_product" name="motor_product" placeholder="*Motor" required>
      <label for="motor_model">*Modelo motor</label> <input type="text" id="motor_model" name="motor_model" placeholder="*Modelo Motor" required>
      <label for="motor_serie">*Serie motor</label> <input type="text" id="motor_serie" name="motor_serie" placeholder="*Serie Motor" required>
      <label for="generator_product">*Generador</label> <input type="text" id="generator_product" name="generator_product" placeholder="*Generador" required>
      <label for="generator_serie">*Serie generador</label> <input type="text" id="generator_serie" name="generator_serie" placeholder="*Serie generador" required>
      <label for="generator_kw">*Kw generador</label> <input type="number" step="0.1" id="generator_kw" name="generator_kw" placeholder="*Kw generador" required>
      <label for="generator_kwa">*Kwa generador</label> <input type="number" step="0.1" id="generator_kwa" name="generator_kwa" placeholder="*Kwa generador" required>
      <label for="generator_phases">*Fases generador</label> <input type="number" step="0.1" id="generator_phases" name="generator_phases" placeholder="*Fases generador" required>
      <label for="generator_volt">*Volt generador</label> <input type="number" step="0.1" id="generator_volt" name="generator_volt" placeholder="*Volt generador" required>
      <br>
      <table id="material_quantity_reference_electric_machine">
        <thead>
          <tr>
            <th>Material</th>
            <th>Cantidad</th>
            <th>Referencia</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>F.Aceite</td>
            <td><input type="text" name="f_oil_amount_cellar" id="f_oil_amount_cellar" value=""> </td>
            <td><input type="text" name="f_oil_reference_cellar" id="f_oil_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>F.Combustible</td>
            <td><input type="text" name="fuel_amount_cellar" id="fuel_amount_cellar" value=""> </td>
            <td><input type="text" name="fuel_reference_cellar" id="fuel_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>F.Aire</td>
            <td><input type="text" name="air_amount_cellar" id="air_amount_cellar" value=""> </td>
            <td><input type="text" name="air_reference_cellar" id="air_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>F.Separador</td>
            <td><input type="text" name="separator_amount_cellar" id="separator_amount_cellar" value=""> </td>
            <td><input type="text" name="separator_reference_cellar" id="separator_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>Refrigerante</td>
            <td><input type="text" name="cooling_amount_cellar" id="cooling_amount_cellar" value=""> </td>
            <td><input type="text" name="cooling_reference_cellar" id="cooling_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>Aceite motor</td>
            <td><input type="text" name="motor_oil_amount_cellar" id="motor_oil_amount_cellar" value=""> </td>
            <td><input type="text" name="motor_oil_reference_cellar" id="motor_oil_reference_cellar" value=""> </td>
          </tr>
          <tr>
            <td>Otros</td>
            <td><input type="text" name="other_amount_cellar" id="other_amount_cellar" value=""> </td>
            <td><input type="text" name="other_reference_cellar" id="other_reference_cellar" value=""> </td>
          </tr>

        </tbody>
      </table>
      <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div id="air_conditioning_product" class="products_size hidde_element">
      <br><h3>Información aire acondicionado</h3>
      <br><hr>
      <br>
      <label for="capacity_air">*Capacidad</label> <input type="text" id="capacity_air" name="capacity_air" placeholder="*capacidad" required>
      <label for="type_air_aconditioning">*Tipo de aire acondicionado</label>
      <select id="type_air_aconditioning" name="type_air_aconditioning" placeholder="*Tipo aire acondicionado" required>

      </select>
    </div>
    <div id="pump_product" class="products_size hidde_element">
      <br><h3>Información motobomba</h3>
      <br><hr>
      <br>
      <label for="voltaje_pump">*Voltaje motobomba</label> <input type="text" id="voltaje_pump" name="voltaje_pump" placeholder="*Voltaje motobomba" required>
      <label for="hp_pump">*Hp motobomba</label> <input type="text" id="hp_pump" name="hp_pump" placeholder="*hp motobomba" required>
      <label for="amp_pump">*Amp motobomba</label> <input type="text" id="amp_pump" name="amp_pump" placeholder="*amp motobomba" required>
      <label for="capacity_pump">*Capacidad</label> <input type="text" id="capacity_pump" name="capacity_pump" placeholder="*capacidad" required>
      <label for="type_pump">*Tipo motobomba</label>
      <select id="type_pump" name="type_pump" placeholder="*Tipo motobomba" required>

      </select>
    </div>
</form>
  <div class="btns_forms">
    <a class="general_input_button" name="btn_clean_inputs_product" id="btn_clean_inputs_product">Limpiar</a>
    <a class="general_input_button" name="insert_product_btn" id="insert_product_btn">Enviar</a>
  </div>
</section>
