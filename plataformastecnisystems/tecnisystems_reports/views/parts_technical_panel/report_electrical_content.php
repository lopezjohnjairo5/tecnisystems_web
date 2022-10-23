<div id="report_electrical_content" class="content_tab1_reports">
  <form id="report_electrical_form" action="index.html" method="post">
    <div class="report_electrical_content_sections">
      <h3>PERSONAL</h3>
      <label for="technical1">* Técnico 1</label> <input type="text" name="name_technical1" id="name_technical1" value="<?php echo $_SESSION["technical_user"][1];?>" placeholder="* Nombre Técnico 1" require> <input type="email" name="email_technical1" id="email_technical1" value="<?php echo $_SESSION["technical_user"][2];?>" placeholder="* email Técnico 1" require><input type="number" min="10000000" max="99999999999" id="technical1" name="technical1" placeholder="* N° Documento Técnico 1" require>
      <br><label for="technical2">Técnico 2</label> <input type="text" name="name_technical2" id="name_technical2" placeholder="Nombre Técnico 2"> <input type="email" name="email_technical2" id="email_technical2" placeholder="email Técnico 2"><input type="number" min="10000000" max="99999999999" id="technical2" name="technical2" placeholder="N° Documento Técnico 2">
      <br><label for="technical3">Técnico 3</label> <input type="text" name="name_technical3" id="name_technical3" placeholder="Nombre Técnico 3"> <input type="email" name="email_technical3" id="email_technical3" placeholder="email Técnico 3"><input type="number" min="10000000" max="99999999999" id="technical3" name="technical3" placeholder="N° Documento Técnico 3">
    </div>
    <div class="report_electrical_content_sections">
      <h3>INFORMACIÓN GENERAL</h3>
      <br><label for="date">Fecha:</label> <input type="date" id="date" name="" value="<?php echo date('Y-m-d');?>">
      <section id="content_hour_reports">
        <div class="hour_section">
          <label for="">* Hora Entrada</label>
          <select class="start_end_hour_inputs" name="">
            <option value="">Hora</option>
            <?php
            for ($i=1; $i <= 12; $i++) {
              if($i < 10){
                $nv = '0'.$i;
              }else{
                $nv = $i;
              }
              echo '<option value="'.$nv.'">'.$nv.'</option>';
            }
            ?>
          </select>
          <select class="start_end_hour_inputs" name="">
            <option value="">min</option>
            <?php
            for ($i=0; $i <= 59; $i++) {
              if($i < 10){
                $nv = '0'.$i;
              }else{
                $nv = $i;
              }
              echo '<option value="'.$nv.'">'.$nv.'</option>';
            }
            ?>
          </select>
          <select class="start_end_hour_inputs" name="">
            <option value="am">AM</option>
            <option value="pm">PM</option>
          </select>
        </div>
        <div class="hour_section">
          <label for="">* Hora Salida </label>
          <select class="start_end_hour_inputs" name="">
            <option value="">Hora</option>
            <?php
            for ($i=1; $i <= 12; $i++) {
              if($i < 10){
                $nv = '0'.$i;
              }else{
                $nv = $i;
              }
              echo '<option value="'.$nv.'">'.$nv.'</option>';
            }
            ?>
          </select>
          <select class="start_end_hour_inputs" name="">
            <option value="">min</option>
            <?php
            for ($i=0; $i <= 59; $i++) {
              if($i < 10){
                $nv = '0'.$i;
              }else{
                $nv = $i;
              }
              echo '<option value="'.$nv.'">'.$nv.'</option>';
            }
            ?>
          </select>
          <select class="start_end_hour_inputs" name="">
            <option value="am">AM</option>
            <option value="pm">PM</option>
          </select>

        </div>

      </section>

      <label for="type_maintenance">Tipo Mantenimiento</label>
      <select class="" id="type_maintenance" name="type_maintenance">
        <option value="1">Preventivo</option>
        <option value="2">Correctivo</option>
      </select>
    </div>
    <div class="report_electrical_content_sections">
      <h3>* Máquina</h3>
      <div class="scan_qr_electrical_machine">
        <video></video>
        <canvas id="img_preview_machine"></canvas>
        <input class="elements_btns_scan_qr_machine" type="file" name="path_input_photo_machine" id="path_input_photo_machine" placeholder="seleccione un archivo">
      </div>
      <div class="machine_electrical_content">
        <div class="machine_electrical_content_section">
          <label for="power_plant_serial">Serial</label> <input type="search" id="power_plant_serial" name="power_plant_serial" placeholder="* Serial Machine"><button type="button" name="search_by_serial_electric_machine" id="search_by_serial_electric_machine"><img src="<?php echo IMGS?>ico_buscar.png" alt="">  </button>
          <br>  <label for="power_plant">Planta electrica</label> <input type="text" class="mecs_values" id="power_plant" name="power_plant" placeholder="Planta electrica">
          <label for="power_plant_model">Modelo</label> <input type="text" class="mecs_values" id="power_plant_model" name="power_plant_model" placeholder="Modelo">
          <label for="power_plant_serie">Serie</label> <input type="text" class="mecs_values" id="power_plant_serie" name="power_plant_serie" placeholder="Serie">
        </div>
        <br>
        <hr>
        <br>
        <div class="machine_electrical_content_section">
          <label for="motor">Motor</label> <input type="text" class="mecs_values" id="motor" name="" placeholder="motor">
          <label for="motor_plant_model">Modelo</label> <input type="text" class="mecs_values" id="motor_plant_model" name="" placeholder="Modelo">
          <label for="motor_plant_serie">Serie</label> <input type="text" class="mecs_values" id="motor_plant_serie" name="" placeholder="Serie">
        </div>
        <br>
        <hr>
        <br>
        <div class="machine_electrical_content_section">
          <label for="generator">Generador</label> <input type="text" class="mecs_values" id="generator" name="" placeholder="Generador">
          <label for="generator_serie">Serie</label> <input type="text" class="mecs_values" id="generator_serie" name="" placeholder="Serie">
        </div>
        <div class="machine_electrical_content_section">
          <label for="kw">Kw</label> <input type="text" class="mecs_values" id="kw" name="" placeholder="kw">
          <label for="kva">Kva</label> <input type="text" class="mecs_values" id="kva" name="" placeholder="kva">
        </div>
        <div class="machine_electrical_content_section">
          <label for="phases">Fases</label> <input type="text" class="mecs_values" id="phases" name="" placeholder="Fases">
          <label for="voltage">Volt</label> <input type="text" class="mecs_values" id="voltage" name="" placeholder="Volt">
        </div>
      </div>
    </div>
    <div class="report_electrical_content_sections" id="re_content_table">
      <h3>Trabajos realizados con la planta eléctrica apagada</h3>
      <br>
      <table class="report_electrical_content_table">
        <th colspan="2">Sistema de lubricación</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión de conexiones</td>
          <td><label for="connections_yes"></label> <input type="radio" id="connections_yes" name="connections" value="1" checked></td>
          <td><label for="connections_no"></label> <input type="radio" id="connections_no" name="connections" value="0"></td>
        </tr>
        <tr>
          <td>Revisión de filtros</td>
          <td><label for="filters_yes"></label> <input type="radio" id="filters_yes" name="filters" value="1" checked></td>
          <td><label for="filters_no"></label> <input type="radio" id="filters_no" name="filters" value="0"></td>
        </tr>
        <tr>
          <td>Cambio de filtros</td>
          <td><label for="change_filters_yes"></label> <input type="radio" id="change_filters_yes" name="change_filters" value="1"></td>
          <td><label for="change_filters_no"></label> <input type="radio" id="change_filters_no" name="change_filters" value="0" checked></td>
        </tr>
        <tr>
          <td>Verificación estado y nivel de aceite</td>
          <td><label for="check_oil_yes"></label> <input type="radio" id="check_oil_yes" name="check_oil" value="1"></td>
          <td><label for="check_oil_no"></label> <input type="radio" id="check_oil_no" name="check_oil" value="0" checked></td>
        </tr>
        <tr>
          <td>Cambio de aceite</td>
          <td><label for="change_oil_yes"></label> <input type="radio" id="change_oil_yes" name="change_oil" value="1"></td>
          <td><label for="change_oil_no"></label> <input type="radio" id="change_oil_no" name="change_oil" value="0" checked></td>
        </tr>
      </table>

      <table class="report_electrical_content_table">
        <th colspan="3">Sistema de combustible</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión de fugas</td>
          <td><label for="leak_yes"></label> <input type="radio" id="leak_yes" name="leak" value="1" checked></td>
          <td><label for="leak_no"></label> <input type="radio" id="leak_no" name="leak" value="0"></td>
        </tr>
        <tr>
          <td>Revisión de conexiones</td>
          <td><label for="fuel_conections_yes"></label> <input type="radio" id="fuel_conections_yes" name="fuel_conections" value="1" checked></td>
          <td><label for="fuel_conections_no"></label> <input type="radio" id="fuel_conections_no" name="fuel_conections" value="0"></td>
        </tr>
        <tr>
          <td>Revisión de filtro separador</td>
          <td><label for="check_filters_fuel_yes"></label> <input type="radio" id="check_filters_fuel_yes" name="check_filters_fuel" value="1"></td>
          <td><label for="check_filters_fuel_no"></label> <input type="radio" id="check_filters_fuel_no" name="check_filters_fuel" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión bomba auxiliar o bombin</td>
          <td><label for="check_bombin_yes"></label> <input type="radio" id="check_bombin_yes" name="check_bombin" value="1"></td>
          <td><label for="check_bombin_no"></label> <input type="radio" id="check_bombin_no" name="check_bombin" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión tanque combustible</td>
          <td><label for="check_fuel_tank_yes"></label> <input type="radio" id="check_fuel_tank_yes" name="check_fuel_tank" value="1"></td>
          <td><label for="check_fuel_tank_no"></label> <input type="radio" id="check_fuel_tank_no" name="check_fuel_tank" value="0" checked></td>
        </tr>
      </table>

      <table class="report_electrical_content_table">
        <th colspan="3">Sistema de admisión de aire</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión de conexión</td>
          <td><label for="air_conections_yes"></label> <input type="radio" id="air_conections_yes" name="air_conections" value="1" checked></td>
          <td><label for="air_conections_no"></label> <input type="radio" id="air_conections_no" name="air_conections" value="0"></td>
        </tr>
        <tr>
          <td>Revisión de carcasa y filtro</td>
          <td><label for="check_filters_air_yes"></label> <input type="radio" id="check_filters_air_yes" name="check_filters_air" value="1"></td>
          <td><label for="check_filters_air_no"></label> <input type="radio" id="check_filters_air_no" name="check_filters_air" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión turbo</td>
          <td><label for="check_air_turbo_yes"></label> <input type="radio" id="check_air_turbo_yes" name="check_air_turbo" value="1"></td>
          <td><label for="check_air_turbo_no"></label> <input type="radio" id="check_air_turbo_no" name="check_air_turbo" value="0" checked></td>
        </tr>
      </table>

      <table class="report_electrical_content_table">
        <th colspan="3">Sistema de enfriamiento</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión de conexiones</td>
          <td><label for="check_connections_cooling_yes"></label> <input type="radio" id="check_connections_cooling_yes" name="check_connections_cooling" value="1" checked></td>
          <td><label for="check_connections_cooling_no"></label> <input type="radio" id="check_connections_cooling_no" name="check_connections_cooling" value="0"></td>
        </tr>
        <tr>
          <td>Revisión estado correas</td>
          <td><label for="check_straps_yes"></label> <input type="radio" id="check_straps_yes" name="check_straps" value="1" checked></td>
          <td><label for="check_straps_no"></label> <input type="radio" id="check_straps_no" name="check_straps" value="0"></td>
        </tr>
        <tr>
          <td>Verificación del estado y nivel del refrigerante</td>
          <td><label for="check_level_cooling_yes"></label> <input type="radio" id="check_level_cooling_yes" name="check_level_cooling" value="1"></td>
          <td><label for="check_level_cooling_no"></label> <input type="radio" id="check_level_cooling_no" name="check_level_cooling" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión estado radiador</td>
          <td><label for="check_radiator_yes"></label> <input type="radio" id="check_radiator_yes" name="check_radiator" value="1"></td>
          <td><label for="check_radiator_no"></label> <input type="radio" id="check_radiator_no" name="check_radiator" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión sensor nivel de agua</td>
          <td><label for="check_sensor_level_water_yes"></label> <input type="radio" id="check_sensor_level_water_yes" name="check_sensor_level_water" value="1"></td>
          <td><label for="check_sensor_level_water_no"></label> <input type="radio" id="check_sensor_level_water_no" name="check_sensor_level_water" value="0" checked></td>
        </tr>
      </table>

      <table class="report_electrical_content_table">
        <th colspan="3">Sistema de corriente directa</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión correa alternador</td>
          <td><label for="check_alternator_strap_yes"></label> <input type="radio" id="check_alternator_strap_yes" name="check_alternator_strap" value="1" checked></td>
          <td><label for="check_alternator_strap_no"></label> <input type="radio" id="check_alternator_strap_no" name="check_alternator_strap" value="0"></td>
        </tr>
        <tr>
          <td>Revisión conexiones electricas</td>
          <td><label for="check_electric_connections_yes"></label> <input type="radio" id="check_electric_connections_yes" name="check_electric_connections" value="1" checked></td>
          <td><label for="check_electric_connections_no"></label> <input type="radio" id="check_electric_connections_no" name="check_electric_connections" value="0"></td>
        </tr>
        <tr>
          <td>Verificación del estado y nivel del ácido de la bateria</td>
          <td><label for="check_level_acid_yes"></label> <input type="radio" id="check_level_acid_yes" name="check_level_acid" value="1"></td>
          <td><label for="check_level_acid_no"></label> <input type="radio" id="check_level_acid_no" name="check_level_acid" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión bornes bateria y carga</td>
          <td><label for="check_battery_terminals_yes"></label> <input type="radio" id="check_battery_terminals_yes" name="check_battery_terminals" value="1"></td>
          <td><label for="check_battery_terminals_no"></label> <input type="radio" id="check_battery_terminals_no" name="check_battery_terminals" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión Cargador batería</td>
          <td><label for="check_battery_charger_yes"></label> <input type="radio" id="check_battery_charger_yes" name="check_battery_charger" value="1"></td>
          <td><label for="check_battery_charger_no"></label> <input type="radio" id="check_battery_charger_no" name="check_battery_charger" value="0" checked></td>
        </tr>
      </table>

      <table class="report_electrical_content_table">
        <th colspan="3">Sistema de corriente alterna</th>
        <tr>
          <td></td>
          <td>SI</td>
          <td>NO</td>
        </tr>
        <tr>
          <td>Revisión voltimetro</td>
          <td><label for="check_voltmeter_yes"></label> <input type="radio" id="check_voltmeter_yes" name="check_voltmeter" value="1" checked></td>
          <td><label for="check_voltmeter_no"></label> <input type="radio" id="check_voltmeter_no" name="check_voltmeter" value="0"></td>
        </tr>
        <tr>
          <td>Revisión Frecuencímetro</td>
          <td><label for="check_Frequency_meter_yes"></label> <input type="radio" id="check_Frequency_meter_yes" name="check_Frequency_meter" value="1" checked></td>
          <td><label for="check_Frequency_meter_no"></label> <input type="radio" id="check_Frequency_meter_no" name="check_Frequency_meter" value="0"></td>
        </tr>
        <tr>
          <td>Revisión amperímetro</td>
          <td><label for="check_ammeter_yes"></label> <input type="radio" id="check_ammeter_yes" name="check_ammeter" value="1" checked></td>
          <td><label for="check_ammeter_no"></label> <input type="radio" id="check_ammeter_no" name="check_ammeter" value="0"></td>
        </tr>
        <tr>
          <td>Revisión conexiones y terminales eléctricas</td>
          <td><label for="check_conections_terminals_electricals_yes"></label> <input type="radio" id="check_conections_terminals_electricals_yes" name="check_conections_terminals_electricals" value="1"></td>
          <td><label for="check_conections_terminals_electricals_no"></label> <input type="radio" id="check_conections_terminals_electricals_no" name="check_conections_terminals_electricals" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión breakers</td>
          <td><label for="check_breakers_yes"></label> <input type="radio" id="check_breakers_yes" name="check_breakers" value="1"></td>
          <td><label for="check_breakers_no"></label> <input type="radio" id="check_breakers_no" name="check_breakers" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión contactores</td>
          <td><label for="check_contactors_yes"></label> <input type="radio" id="check_contactors_yes" name="check_contactors" value="1"></td>
          <td><label for="check_contactors_no"></label> <input type="radio" id="check_contactors_no" name="check_contactors" value="0" checked></td>
        </tr>
        <tr>
          <td>Revisión cables de potencia</td>
          <td><label for="check_power_cables_yes"></label> <input type="radio" id="check_power_cables_yes" name="check_power_cables" value="1"></td>
          <td><label for="check_power_cables_no"></label> <input type="radio" id="check_power_cables_no" name="check_power_cables" value="0" checked></td>
        </tr>
      </table>
    </div>
    <div class="report_electrical_content_sections">
      <h3>REGISTRO DE PARÁMETROS CON LA PLANTA ELÉCTRICA</h3>
      <br>
      <h4>PRUEBAS EN VACIO</h4>
      <div class="parameters_electrical_content_sections">
        <label for="VL1">VL1-N</label> <input type="text" id="VL1" name="" placeholder="VL1-N">
        <label for="VL2">VL2-N</label> <input type="text" id="VL2" name="" placeholder="VL2-N">
        <label for="VL3">VL3-N</label> <input type="text" id="VL3" name="" placeholder="VL3-N">
      </div>
      <div class="parameters_electrical_content_sections">
        <label for="VLL">VL-L</label> <input type="text" id="VLL" name="" placeholder="VL-L">
        <label for="HZ">Hz</label> <input type="text" id="HZ" name="" placeholder="HZ">
        <label for="starting_current">Corriente de arranque CC</label> <input type="text" id="starting_current" name="" placeholder="corriente de arranque">
      </div>

      <div class="parameters_electrical_content_sections">
        <label for="battery_voltage">Bateria: voltaje</label> <input type="text" id="battery_voltage" name="" placeholder="voltaje">
        <label for="amps">Amperios:</label> <input type="text" id="amps" name="" placeholder="amperios">
        <label for="oil_pressure">Presión aceite motor</label> <input type="text" id="oil_pressure" name="" placeholder="presión aceite">
      </div>

      <div class="parameters_electrical_content_sections">
        <label for="temperature_engine">Temperatura motor</label> <input type="text" id="temperature_engine" name="" placeholder="temperatura motor">
        <label for="rpm">RPM</label> <input type="text" id="rpm" name="" placeholder="rpm">
      </div>

      <br>
      <br>
      <h4>PRUEBAS CON CARGA</h4>
      <div class="parameters_electrical_content_sections">
        <label for="VL1_with_load">VL1-N</label> <input type="text" id="VL1_with_load" name="" placeholder="VL1-N">
        <label for="VL2_with_load">VL2-N</label> <input type="text" id="VL2_with_load" name="" placeholder="VL2-N">
        <label for="VL3_with_load">VL3-N</label> <input type="text" id="VL3_with_load" name="" placeholder="VL3-N">

      </div>
      <div class="parameters_electrical_content_sections">
        <label for="VLL_with_load">VL-L</label> <input type="text" id="VLL_with_load" name="" placeholder="VL-L">
        <label for="HZ_with_load">Hz</label> <input type="text" id="HZ_with_load" name="" placeholder="HZ">
        <label for="al1_with_load">Al1</label> <input type="text" id="al1_with_load" name="" placeholder="al1">
      </div>
      <div class="parameters_electrical_content_sections">
        <label for="al2_with_load">Al2</label> <input type="text" id="al2_with_load" name="" placeholder="al2">
        <label for="al3_with_load">Al3</label> <input type="text" id="al3_with_load" name="" placeholder="al3">
        <label for="battery_voltage_with_load">Bateria: voltaje</label> <input type="text" id="battery_voltage_with_load" name="" placeholder="voltaje">
      </div>
      <div class="parameters_electrical_content_sections">
        <label for="amps_with_load">Amperios:</label> <input type="text" id="amps_with_load" name="" placeholder="amperios">
        <label for="oil_pressure_with_load">Presión aceite motor</label> <input type="text" id="oil_pressure_with_load" name="" placeholder="presión aceite">
        <label for="temperature_engine_with_load">Temperatura motor</label> <input type="text" id="temperature_engine_with_load" name="" placeholder="temperatura motor">
      </div>
      <div class="parameters_electrical_content_sections">
        <label for="rpm_with_load">RPM</label> <input type="text" id="rpm_with_load" name="" placeholder="rpm">
        <label for="previous_with_load"><b>Lectura Horómetro</b> Anterior</label> <input type="text" id="previous_with_load" name="" placeholder="previous">
        <label for="current_with_load">Actual</label> <input type="text" id="current_with_load" name="" placeholder="current">
      </div>
      <div class="parameters_electrical_content_sections">
        <b>Func. transferencia de carga</b>
        <br>
        <label for="load_transfer_b"> B</label> <input type="radio" id="load_transfer_b" name="load_transfer" value="B" checked>
        <label for="load_transfer_m"> M</label> <input type="radio" id="load_transfer_m" name="load_transfer" value="M">
      </div>
      <div class="parameters_electrical_content_sections">
        <b>Nivel combustible</b><br>
        <label for="fuel_level_f">F</label> <input type="radio" id="fuel_level_f" name="fuel_level" value="f" checked>
        <label for="fuel_level_m"> M</label> <input type="radio" id="fuel_level_m" name="fuel_level" value="m">
        <label for="fuel_level_b"> B</label> <input type="radio" id="fuel_level_b" name="fuel_level" value="b">
      </div>
      <textarea name="observations" id="observations" rows="8" cols="80" placeholder="Observaciones"></textarea>
      <br>
      <br>
      <table class="report_electrical_second_content_table">
        <thead>
          <tr>
            <th>Material</th>
            <th>Cantidad</th>
            <th>Referencia</th>
          </tr>
        </thead>
        <tr>
          <td>F.Aceite</td>
          <td><input type="text" class="mecs_values" name="f_oil_amount" id="f_oil_amount" placeholder="F.aceite cant"> </td>
          <td><input type="text" class="mecs_values" name="f_oil_reference" id="f_oil_reference" placeholder="F.aceite ref"> </td>
        </tr>
        <tr>
          <td>F.Combustible</td>
          <td><input type="text" class="mecs_values" name="f_fuel_amount" id="f_fuel_amount" placeholder="F.combustible cant"> </td>
          <td><input type="text" class="mecs_values" name="f_fuel_reference" id="f_fuel_reference" placeholder="F.combustible ref"> </td>
        </tr>
        <tr>
          <td>F.Aire</td>
          <td><input type="text" class="mecs_values" name="f_air_amount" id="f_air_amount" placeholder="F.aire cant"> </td>
          <td><input type="text" class="mecs_values" name="f_air_reference" id="f_air_reference" placeholder="F.aire ref"> </td>
        </tr>
        <tr>
          <td>F.Separador</td>
          <td><input type="text" class="mecs_values" name="f_separator_amount" id="f_separator_amount" placeholder="F.separador cant"> </td>
          <td><input type="text" class="mecs_values" name="f_separator_reference" id="f_separator_reference" placeholder="F.separador ref"> </td>
        </tr>
        <tr>
          <td>Refrigerante</td>
          <td><input type="text" class="mecs_values" name="cooling_amount" id="cooling_amount" placeholder=" Refrigerante cant"> </td>
          <td><input type="text" class="mecs_values" name="cooling_reference" id="cooling_reference" placeholder=" Refrigerante ref"> </td>
        </tr>
        <tr>
          <td>Aceite motor</td>
          <td><input type="text" class="mecs_values" name="engine_oil_amount" id="engine_oil_amount" placeholder=" Aceite motor cant"> </td>
          <td><input type="text" class="mecs_values" name="engine_oil_reference" id="engine_oil_reference" placeholder=" Aceite motor ref"> </td>
        </tr>
        <tr>
          <td>Otros</td>
          <td><input type="text" class="mecs_values" name="others_amount" id="others_amount" placeholder="Otros cant"> </td>
          <td><input type="text" class="mecs_values" name="others_reference" id="others_reference" placeholder="Otros ref"> </td>
        </tr>
      </table>

      <br>
      <br>
      <div class="content_pop_draw">

        <?php
          include TPF."client_info.php";
          include TPF."pop_draw.php";
        ?>
      </div>
      <div class="btns_forms_technicals">
        <a class="btn_reports" id="clean_form" href="#">Limpiar</a>
        <a class="btn_reports" id="save_form_electrical" href="#">Guardar</a>
        <a class="btn_reports" id="send_form_electrical" href="#">Enviar</a>
      </div>
    </div>
  </form>
</div>
