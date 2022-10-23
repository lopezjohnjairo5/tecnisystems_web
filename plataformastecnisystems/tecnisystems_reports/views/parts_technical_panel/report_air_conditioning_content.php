<div id="report_air_conditioning_content" class="content_tab1_reports">
  <br>
  <form id="report_air_conditioning_form" action="index.html" method="post">
    <div class="report_air_conditioning_sections">
      <h3>PERSONAL</h3>
      <br>
      <br><label for="technical1_air_conditioning">* Técnico 1</label> <input type="text" name="name_technical1_air_conditioning" id="name_technical1_air_conditioning" value="<?php echo $_SESSION["technical_user"][1];?>" placeholder="Nombre Técnico 1"> <input type="email" name="email_technical1_air_conditioning" id="email_technical1_air_conditioning" value="<?php echo $_SESSION["technical_user"][2];?>" placeholder="email Técnico 1"><input type="number" min="10000000" max="99999999999" id="technical1_air_conditioning" name="technical1_air_conditioning" placeholder="N° Documento Técnico 1">
      <br><label for="technical2_air_conditioning">Técnico 2</label> <input type="text" name="name_technical2_air_conditioning" id="name_technical2_air_conditioning" placeholder="Nombre Técnico 2"> <input type="email" name="email_technical2_air_conditioning" id="email_technical2_air_conditioning" placeholder="email Técnico 2"><input type="number" min="10000000" max="99999999999" id="technical2_air_conditioning" name="technical2_air_conditioning" placeholder="N° Documento Técnico 2">
      <br><label for="technical3_air_conditioning">Técnico 3</label> <input type="text" name="name_technical3_air_conditioning" id="name_technical3_air_conditioning" placeholder="Nombre Técnico 3"> <input type="email" name="email_technical3_air_conditioning" id="email_technical3_air_conditioning" placeholder="email Técnico 3"><input type="number" min="10000000" max="99999999999" id="technical3_air_conditioning" name="technical3_air_conditioning" placeholder="N° Documento Técnico 3">

    </div>

    <div class="report_air_conditioning_sections">
      <div class="general_air_conditioning_sections">
        <h3>INFORMACIÓN GENERAL</h3>
        <br>
        <label for="date_air_conditioning_input">Fecha:</label> <input type="date" id="date_air_conditioning_input" name="" value="<?php echo date('Y-m-d');?>">
        <label for="area_air_conditioning_input">Área</label> <input type="text" id="area_air_conditioning_input" name="" placeholder="Área">
        <label for="branch_office_air_conditioning_input">Sucursal</label> <input type="text" id="branch_office_air_conditioning_input" name="" placeholder="Sucursal">
      </div>
      <div class="general_air_conditioning_sections">
        <section id="content_hour_reports">
          <div class="hour_section">
            <label for="">Hora Entrada</label>
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
            <label for="">Hora Salida </label>
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

      </div>
      <div class="general_air_conditioning_sections">

        <label for="task_conditioning_input">Tipo de Mantenimiento</label>
        <select id="task_conditioning_input" name="">
          <option value="0">... Seleccione una opcion ...</option>
          <option value="1">Mantenimiento Preventivo</option>
          <option value="2">Mantenimiento Correctivo</option>
          <option value="3">Inspección</option>
          <option value="4">Emergencia</option>
        </select>
      </div>
    </div>

    <div class="report_air_conditioning_sections ">

      <h3>MAQUINA</h3>
      <br>
      <div class="info_air_machine">
        <div class="scan_qr_electrical_machine">
          <video></video>
          <canvas id="img_preview_machine"></canvas>
          <input class="elements_btns_scan_qr_machine" type="file" name="path_input_photo_machine" id="path_input_photo_machine" placeholder="seleccione un archivo">
        </div>
        <div class="report_air_conditioning_info_machine">
          <label for="serial_air_conditioning_input">*Serial</label> <input type="text" id="serial_air_conditioning_input" name="" placeholder="*Serial">
          <label for="mark_air_conditioning_input">Marca equipo</label> <input type="text" id="mark_air_conditioning_input" name="" placeholder="Marca equipo" disabled>
          <label for="model_air_conditioning_input">Modelo</label> <input type="text" id="model_air_conditioning_input" name="" placeholder="Modelo" disabled>
          <label for="type_air_conditioning_input">Tipo</label> <input type="text" id="type_air_conditioning_input" name="" placeholder="Tipo" disabled>
          <label for="capacity_air_conditioning_input">Capacidad</label> <input type="text" id="capacity_air_conditioning_input" name="" placeholder="Capacidad" disabled>
        </div>
      </div>

    </div>
    <div class="report_air_conditioning_sections">
      <h3>DATOS TÉCNICOS Y MEDICIONES</h3>
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="2">UNIDAD MANEJADORA</th>
        <tr>
          <td rowspan="5">MOTOR DATOS DE PLACA</td>
        </tr>
        <tr>
          <td class="right_alingment"> <label for="hp_air_drive_unit">HP</label><input type="text" name="hp_air_drive_unit" id="hp_air_drive_unit" placeholder="HP"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_air_drive_unit">VOL</label><input type="text" name="vol_air_drive_unit" id="vol_air_drive_unit" placeholder="VOL"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_air_drive_unit">AMP</label><input type="text" name="amp_air_drive_unit" id="amp_air_drive_unit" placeholder="AMP"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="rpm_air_drive_unit">RPM</label><input type="text" name="rpm_air_drive_unit" id="rpm_air_drive_unit" placeholder="RPM"></td>
        </tr>

        <tr>
          <td rowspan="4">MEDICIONES (Voltaje)</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_1_air_drive_unit">V11-12</label><input type="text" name="vol_1_air_drive_unit" id="vol_1_air_drive_unit" placeholder="V11-12"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_2_air_drive_unit">V12-13</label><input type="text" name="vol_2_air_drive_unit" id="vol_2_air_drive_unit" placeholder="V12-13"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_3_air_drive_unit">V13-14</label><input type="text" name="vol_3_air_drive_unit" id="vol_3_air_drive_unit" placeholder="V13-14"></td>
        </tr>

        <tr>
          <td rowspan="4">AMPERAJE</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_1_air_drive_unit">I <small>1</small> </label><input type="text" name="amp_1_air_drive_unit" id="amp_1_air_drive_unit" placeholder="I1"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_2_air_drive_unit">I <small>2</small> </label><input type="text" name="amp_2_air_drive_unit" id="amp_2_air_drive_unit" placeholder="I2"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_3_air_drive_unit">I <small>3</small> </label><input type="text" name="amp_3_air_drive_unit" id="amp_3_air_drive_unit" placeholder="I3"></td>
        </tr>
      </table>
    </div>
    <div class="report_air_conditioning_sections">
      <h3>LABORES Y REVISIONES REALIZADAS</h3>
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="8">UNIDAD MANEJADORA</th>
        <tr>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
        </tr>
        <tr>
          <td>Limpieza interior - exterior</td>
          <td><label for="clean_air_unit_1"></label><input type="radio" name="clean_air_unit" id="clean_air_unit_1" value="1" checked></td>
          <td><label for="clean_air_unit_2"></label><input type="radio" name="clean_air_unit" id="clean_air_unit_2" value="2"></td>
          <td><label for="clean_air_unit_3"></label><input type="radio" name="clean_air_unit" id="clean_air_unit_3" value="3"></td>
          <td>Ajuste general de tornillos</td>
          <td><label for="screw_adjustment_air_unit_1"></label><input type="radio" name="screw_adjustment_air_unit" id="screw_adjustment_air_unit_1" value="1" checked></td>
          <td><label for="screw_adjustment_air_unit_2"></label><input type="radio" name="screw_adjustment_air_unit" id="screw_adjustment_air_unit_2" value="2"></td>
          <td><label for="screw_adjustment_air_unit_3"></label><input type="radio" name="screw_adjustment_air_unit" id="screw_adjustment_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Lavado de serpientes</td>
          <td><label for="Snake_wash_air_unit_1"></label><input type="radio" name="Snake_wash_air_unit" id="Snake_wash_air_unit_1" value="1" checked></td>
          <td><label for="Snake_wash_air_unit_2"></label><input type="radio" name="Snake_wash_air_unit" id="Snake_wash_air_unit_2" value="2"></td>
          <td><label for="Snake_wash_air_unit_3"></label><input type="radio" name="Snake_wash_air_unit" id="Snake_wash_air_unit_3" value="3"></td>
          <td>Revisión válvulas de expansión</td>
          <td><label for="expansion_valve_air_unit_1"></label><input type="radio" name="expansion_valve_air_unit" id="expansion_valve_air_unit_1" value="1" checked></td>
          <td><label for="expansion_valve_air_unit_2"></label><input type="radio" name="expansion_valve_air_unit" id="expansion_valve_air_unit_2" value="2"></td>
          <td><label for="expansion_valve_air_unit_3"></label><input type="radio" name="expansion_valve_air_unit" id="expansion_valve_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Ajuste de prisioneros de rotores y chumaceras</td>
          <td><label for="rotors_and_bearings_air_unit_1"></label><input type="radio" name="rotors_and_bearings_air_unit" id="rotors_and_bearings_air_unit_1" value="1" checked></td>
          <td><label for="rotors_and_bearings_air_unit_2"></label><input type="radio" name="rotors_and_bearings_air_unit" id="rotors_and_bearings_air_unit_2" value="2"></td>
          <td><label for="rotors_and_bearings_air_unit_3"></label><input type="radio" name="rotors_and_bearings_air_unit" id="rotors_and_bearings_air_unit_3" value="3"></td>
          <td>Revisión accesorios eléctricos y ajuste de tornilleria tab. de control</td>
          <td><label for="electrical_accessories_air_unit_1"></label><input type="radio" name="electrical_accessories_air_unit" id="electrical_accessories_air_unit_1" value="1" checked></td>
          <td><label for="electrical_accessories_air_unit_2"></label><input type="radio" name="electrical_accessories_air_unit" id="electrical_accessories_air_unit_2" value="2"></td>
          <td><label for="electrical_accessories_air_unit_3"></label><input type="radio" name="electrical_accessories_air_unit" id="electrical_accessories_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Lavado filtros de aire</td>
          <td><label for="washing_air_filters_air_unit_1"></label><input type="radio" name="washing_air_filters_air_unit" id="washing_air_filters_air_unit_1" value="1" checked></td>
          <td><label for="washing_air_filters_air_unit_2"></label><input type="radio" name="washing_air_filters_air_unit" id="washing_air_filters_air_unit_2" value="2"></td>
          <td><label for="washing_air_filters_air_unit_3"></label><input type="radio" name="washing_air_filters_air_unit" id="washing_air_filters_air_unit_3" value="3"></td>
          <td>Lamparas de operación y alarma</td>
          <td><label for="alarm_lamps_air_unit_1"></label><input type="radio" name="alarm_lamps_air_unit" id="alarm_lamps_air_unit_1" value="1" checked></td>
          <td><label for="alarm_lamps_air_unit_2"></label><input type="radio" name="alarm_lamps_air_unit" id="alarm_lamps_air_unit_2" value="2"></td>
          <td><label for="alarm_lamps_air_unit_3"></label><input type="radio" name="alarm_lamps_air_unit" id="alarm_lamps_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Tensión de correas y/o cambio</td>
          <td><label for="belt_tension_air_unit_1"></label><input type="radio" name="belt_tension_air_unit" id="belt_tension_air_unit_1" value="1" checked></td>
          <td><label for="belt_tension_air_unit_2"></label><input type="radio" name="belt_tension_air_unit" id="belt_tension_air_unit_2" value="2"></td>
          <td><label for="belt_tension_air_unit_3"></label><input type="radio" name="belt_tension_air_unit" id="belt_tension_air_unit_3" value="3"></td>
          <td>Revisión consumo eléctrico</td>
          <td><label for="electrical_review_air_unit_1"></label><input type="radio" name="electrical_review_air_unit" id="electrical_review_air_unit_1" value="1" checked></td>
          <td><label for="electrical_review_air_unit_2"></label><input type="radio" name="electrical_review_air_unit" id="electrical_review_air_unit_2" value="2"></td>
          <td><label for="electrical_review_air_unit_3"></label><input type="radio" name="electrical_review_air_unit" id="electrical_review_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Revisión rodamientos motor/chumac</td>
          <td><label for="bearing_review_air_unit_1"></label><input type="radio" name="bearing_review_air_unit" id="bearing_review_air_unit_1" value="1" checked></td>
          <td><label for="bearing_review_air_unit_2"></label><input type="radio" name="bearing_review_air_unit" id="bearing_review_air_unit_2" value="2"></td>
          <td><label for="bearing_review_air_unit_3"></label><input type="radio" name="bearing_review_air_unit" id="bearing_review_air_unit_3" value="3"></td>
          <td>Revisión control remoto</td>
          <td><label for="remote_control_review_air_unit_1"></label><input type="radio" name="remote_control_review_air_unit" id="remote_control_review_air_unit_1" value="1" checked></td>
          <td><label for="remote_control_review_air_unit_2"></label><input type="radio" name="remote_control_review_air_unit" id="remote_control_review_air_unit_2" value="2"></td>
          <td><label for="remote_control_review_air_unit_3"></label><input type="radio" name="remote_control_review_air_unit" id="remote_control_review_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Limpieza de desagües</td>
          <td><label for="drain_cleaning_air_unit_1"></label><input type="radio" name="drain_cleaning_air_unit" id="drain_cleaning_air_unit_1" value="1" checked></td>
          <td><label for="drain_cleaning_air_unit_2"></label><input type="radio" name="drain_cleaning_air_unit" id="drain_cleaning_air_unit_2" value="2"></td>
          <td><label for="drain_cleaning_air_unit_3"></label><input type="radio" name="drain_cleaning_air_unit" id="drain_cleaning_air_unit_3" value="3"></td>
          <td>Revisión bomba de condensado</td>
          <td><label for="pump_air_unit_1"></label><input type="radio" name="pump_air_unit" id="pump_air_unit_1" value="1" checked></td>
          <td><label for="pump_air_unit_2"></label><input type="radio" name="pump_air_unit" id="pump_air_unit_2" value="2"></td>
          <td><label for="pump_air_unit_3"></label><input type="radio" name="pump_air_unit" id="pump_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Revisión aislamiento interior</td>
          <td><label for="insulation_review_air_unit_1"></label><input type="radio" name="insulation_review_air_unit" id="insulation_review_air_unit_1" value="1" checked></td>
          <td><label for="insulation_review_air_unit_2"></label><input type="radio" name="insulation_review_air_unit" id="insulation_review_air_unit_2" value="2"></td>
          <td><label for="insulation_review_air_unit_3"></label><input type="radio" name="insulation_review_air_unit" id="insulation_review_air_unit_3" value="3"></td>
          <td>Revisión termostato</td>
          <td><label for="thermostat_check_air_unit_1"></label><input type="radio" name="thermostat_check_air_unit" id="thermostat_check_air_unit_1" value="1" checked></td>
          <td><label for="thermostat_check_air_unit_2"></label><input type="radio" name="thermostat_check_air_unit" id="thermostat_check_air_unit_2" value="2"></td>
          <td><label for="thermostat_check_air_unit_3"></label><input type="radio" name="thermostat_check_air_unit" id="thermostat_check_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>limpieza cuarto de máquinas</td>
          <td><label for="machine_room_cleaning_air_unit_1"></label><input type="radio" name="machine_room_cleaning_air_unit" id="machine_room_cleaning_air_unit_1" value="1" checked></td>
          <td><label for="machine_room_cleaning_air_unit_2"></label><input type="radio" name="machine_room_cleaning_air_unit" id="machine_room_cleaning_air_unit_2" value="2"></td>
          <td><label for="machine_room_cleaning_air_unit_3"></label><input type="radio" name="machine_room_cleaning_air_unit" id="machine_room_cleaning_air_unit_3" value="3"></td>
          <td>Inspección motor</td>
          <td><label for="engine_inspection_air_unit_1"></label><input type="radio" name="engine_inspection_air_unit" id="engine_inspection_air_unit_1" value="1" checked></td>
          <td><label for="engine_inspection_air_unit_2"></label><input type="radio" name="engine_inspection_air_unit" id="engine_inspection_air_unit_2" value="2"></td>
          <td><label for="engine_inspection_air_unit_3"></label><input type="radio" name="engine_inspection_air_unit" id="engine_inspection_air_unit_3" value="3"></td>
        </tr>
      </table>
    </div>

    <div class="report_air_conditioning_sections">
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="2">UNIDAD CONDENSADORA</th>
        <tr>
          <td><b>COMPRESOR</b></td>
          <td>1</td>
        </tr>
        <tr>
          <td rowspan="4">DATOS DE PLACA</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="hp_air_condensing_unit">HP</label><input type="text" name="hp_air_condensing_unit" id="hp_air_condensing_unit" placeholder="HP"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_air_condensing_unit">VOL</label><input type="text" name="vol_air_condensing_unit" id="vol_air_condensing_unit" placeholder="VOL"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_air_condensing_unit">AMP</label><input type="text" name="amp_air_condensing_unit" id="amp_air_condensing_unit" placeholder="AMP"></td>
        </tr>

        <tr>
          <td rowspan="4">MEDICIONES (Voltaje)</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_1_air_condensing_unit">V11-12</label><input type="text" name="vol_1_air_condensing_unit" id="vol_1_air_condensing_unit" placeholder="V11-12"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_2_air_condensing_unit">V12-13</label><input type="text" name="vol_2_air_condensing_unit" id="vol_2_air_condensing_unit" placeholder="V12-13"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_3_air_condensing_unit">V13-14</label><input type="text" name="vol_3_air_condensing_unit" id="vol_3_air_condensing_unit" placeholder="V13-14"></td>
        </tr>

        <tr>
          <td rowspan="4">AMPERAJE</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_1_air_condensing_unit">I <small>1</small></label> <input type="text" name="amp_1_air_condensing_unit" id="amp_1_air_condensing_unit" placeholder="I1"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_2_air_condensing_unit">I <small>2</small></label> <input type="text" name="amp_2_air_condensing_unit" id="amp_2_air_condensing_unit" placeholder="I2"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_3_air_condensing_unit">I <small>3</small></label> <input type="text" name="amp_3_air_condensing_unit" id="amp_3_air_condensing_unit" placeholder="I3"></td>
        </tr>

        <tr>
          <td rowspan="4">PRESIONES (Estado)</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="pressure_1_air_condensing_unit">Alta</label> <input type="text" name="pressure_1_air_condensing_unit" id="pressure_1_air_condensing_unit" placeholder="Alta"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="pressure_2_air_condensing_unit">Baja</label> <input type="text" name="pressure_2_air_condensing_unit" id="pressure_2_air_condensing_unit" placeholder="Baja"></td>
        </tr>
      </table>
    </div>
    <div class="report_air_conditioning_sections">
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="8">UNIDAD CONDENSADORA Y COMPRESOR</th>
        <tr>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
        </tr>
        <tr>
          <td>Funcionamiento general</td>
          <td><label for="functioning_conditioning_air_unit_1"></label><input type="radio" name="functioning_conditioning_air_unit" id="functioning_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="functioning_conditioning_air_unit_2"></label><input type="radio" name="functioning_conditioning_air_unit" id="functioning_conditioning_air_unit_2" value="2"></td>
          <td><label for="functioning_conditioning_air_unit_3"></label><input type="radio" name="functioning_conditioning_air_unit" id="functioning_conditioning_air_unit_3" value="3"></td>
          <td>Ajuste general de tornillos</td>
          <td><label for="screw_adjustment_conditioning_air_unit_1"></label><input type="radio" name="screw_adjustment_conditioning_air_unit" id="screw_adjustment_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="screw_adjustment_conditioning_air_unit_2"></label><input type="radio" name="screw_adjustment_conditioning_air_unit" id="screw_adjustment_conditioning_air_unit_2" value="2"></td>
          <td><label for="screw_adjustment_conditioning_air_unit_3"></label><input type="radio" name="screw_adjustment_conditioning_air_unit" id="screw_adjustment_conditioning_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Limpieza interior - exterior</td>
          <td><label for="clean_conditioning_air_unit_1"></label><input type="radio" name="clean_conditioning_air_unit" id="clean_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="clean_conditioning_air_unit_2"></label><input type="radio" name="clean_conditioning_air_unit" id="clean_conditioning_air_unit_2" value="2"></td>
          <td><label for="clean_conditioning_air_unit_3"></label><input type="radio" name="clean_conditioning_air_unit" id="clean_conditioning_air_unit_3" value="3"></td>
          <td>Revisión accesorios eléctricos</td>
          <td><label for="accessories_review_conditioning_air_unit_1"></label><input type="radio" name="accessories_review_conditioning_air_unit" id="accessories_review_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="accessories_review_conditioning_air_unit_2"></label><input type="radio" name="accessories_review_conditioning_air_unit" id="accessories_review_conditioning_air_unit_2" value="2"></td>
          <td><label for="accessories_review_conditioning_air_unit_3"></label><input type="radio" name="accessories_review_conditioning_air_unit" id="accessories_review_conditioning_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Lavado de serpientes</td>
          <td><label for="snake_wash_conditioning_air_unit_1"></label><input type="radio" name="snake_wash_conditioning_air_unit" id="snake_wash_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="snake_wash_conditioning_air_unit_2"></label><input type="radio" name="snake_wash_conditioning_air_unit" id="snake_wash_conditioning_air_unit_2" value="2"></td>
          <td><label for="snake_wash_conditioning_air_unit_3"></label><input type="radio" name="snake_wash_conditioning_air_unit" id="snake_wash_conditioning_air_unit_3" value="3"></td>
          <td>Ajuste de tornilleria tab. de control</td>
          <td><label for="screw_adjustment_tab_control_conditioning_air_unit_1"></label><input type="radio" name="screw_adjustment_tab_control_conditioning_air_unit" id="screw_adjustment_tab_control_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="screw_adjustment_tab_control_conditioning_air_unit_2"></label><input type="radio" name="screw_adjustment_tab_control_conditioning_air_unit" id="screw_adjustment_tab_control_conditioning_air_unit_2" value="2"></td>
          <td><label for="screw_adjustment_tab_control_conditioning_air_unit_3"></label><input type="radio" name="screw_adjustment_tab_control_conditioning_air_unit" id="screw_adjustment_tab_control_conditioning_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Ajustes rotores o ventiladores</td>
          <td><label for="adjusting_rotors_conditioning_air_unit_1"></label><input type="radio" name="adjusting_rotors_conditioning_air_unit" id="adjusting_rotors_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="adjusting_rotors_conditioning_air_unit_2"></label><input type="radio" name="adjusting_rotors_conditioning_air_unit" id="adjusting_rotors_conditioning_air_unit_2" value="2"></td>
          <td><label for="adjusting_rotors_conditioning_air_unit_3"></label><input type="radio" name="adjusting_rotors_conditioning_air_unit" id="adjusting_rotors_conditioning_air_unit_3" value="3"></td>
          <td>Ruidos</td>
          <td><label for="noise_conditioning_air_unit_1"></label><input type="radio" name="noise_conditioning_air_unit" id="noise_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="noise_conditioning_air_unit_2"></label><input type="radio" name="noise_conditioning_air_unit" id="noise_conditioning_air_unit_2" value="2"></td>
          <td><label for="noise_conditioning_air_unit_3"></label><input type="radio" name="noise_conditioning_air_unit" id="noise_conditioning_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Estado soportes</td>
          <td><label for="supports_status_conditioning_air_unit_1"></label><input type="radio" name="supports_status_conditioning_air_unit" id="supports_status_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="supports_status_conditioning_air_unit_2"></label><input type="radio" name="supports_status_conditioning_air_unit" id="supports_status_conditioning_air_unit_2" value="2"></td>
          <td><label for="supports_status_conditioning_air_unit_3"></label><input type="radio" name="supports_status_conditioning_air_unit" id="supports_status_conditioning_air_unit_3" value="3"></td>
          <td>Temperatura ventilador forzada</td>
          <td><label for="fan_temperature_conditioning_air_unit_1"></label><input type="radio" name="fan_temperature_conditioning_air_unit" id="fan_temperature_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="fan_temperature_conditioning_air_unit_2"></label><input type="radio" name="fan_temperature_conditioning_air_unit" id="fan_temperature_conditioning_air_unit_2" value="2"></td>
          <td><label for="fan_temperature_conditioning_air_unit_3"></label><input type="radio" name="fan_temperature_conditioning_air_unit" id="fan_temperature_conditioning_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Escapes</td>
          <td><label for="scapes_conditioning_air_unit_1"></label><input type="radio" name="scapes_conditioning_air_unit" id="scapes_conditioning_air_unit_1" value="1" checked></td>
          <td><label for="scapes_conditioning_air_unit_2"></label><input type="radio" name="scapes_conditioning_air_unit" id="scapes_conditioning_air_unit_2" value="2"></td>
          <td><label for="scapes_conditioning_air_unit_3"></label><input type="radio" name="scapes_conditioning_air_unit" id="scapes_conditioning_air_unit_3" value="3"></td>
        </tr>
      </table>
    </div>

    <div class="report_air_conditioning_sections">
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="8">INTERCONECCIÓN SISTEMA DE REFRIGERACIÓN</th>
        <tr>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
          <td></td>
          <td>NF</td>
          <td>C</td>
          <td>C/R</td>
        </tr>
        <tr>
          <td>Aislamiento - chaqueta aluminio</td>
          <td><label for="isolation_refrigeration_air_unit_1"></label><input type="radio" name="isolation_refrigeration_air_unit" id="isolation_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="isolation_refrigeration_air_unit_2"></label><input type="radio" name="isolation_refrigeration_air_unit" id="isolation_refrigeration_air_unit_2" value="2"></td>
          <td><label for="isolation_refrigeration_air_unit_3"></label><input type="radio" name="isolation_refrigeration_air_unit" id="isolation_refrigeration_air_unit_3" value="3"></td>
          <td>Soporteria</td>
          <td><label for="support_refrigeration_air_unit_1"></label><input type="radio" name="support_refrigeration_air_unit" id="support_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="support_refrigeration_air_unit_2"></label><input type="radio" name="support_refrigeration_air_unit" id="support_refrigeration_air_unit_2" value="2"></td>
          <td><label for="support_refrigeration_air_unit_3"></label><input type="radio" name="support_refrigeration_air_unit" id="support_refrigeration_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Filtro secador</td>
          <td><label for="filter_refrigeration_air_unit_1"></label><input type="radio" name="filter_refrigeration_air_unit" id="filter_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="filter_refrigeration_air_unit_2"></label><input type="radio" name="filter_refrigeration_air_unit" id="filter_refrigeration_air_unit_2" value="2"></td>
          <td><label for="filter_refrigeration_air_unit_3"></label><input type="radio" name="filter_refrigeration_air_unit" id="filter_refrigeration_air_unit_3" value="3"></td>
          <td>Mirilla</td>
          <td><label for="peephole_refrigeration_air_unit_1"></label><input type="radio" name="peephole_refrigeration_air_unit" id="peephole_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="peephole_refrigeration_air_unit_2"></label><input type="radio" name="peephole_refrigeration_air_unit" id="peephole_refrigeration_air_unit_2" value="2"></td>
          <td><label for="peephole_refrigeration_air_unit_3"></label><input type="radio" name="peephole_refrigeration_air_unit" id="peephole_refrigeration_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Válvulas de corte</td>
          <td><label for="valve_cut_refrigeration_air_unit_1"></label><input type="radio" name="valve_cut_refrigeration_air_unit" id="valve_cut_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="valve_cut_refrigeration_air_unit_2"></label><input type="radio" name="valve_cut_refrigeration_air_unit" id="valve_cut_refrigeration_air_unit_2" value="2"></td>
          <td><label for="valve_cut_refrigeration_air_unit_3"></label><input type="radio" name="valve_cut_refrigeration_air_unit" id="valve_cut_refrigeration_air_unit_3" value="3"></td>
          <td>Válvulas selonoide</td>
          <td><label for="valve_solenoid_refrigeration_air_unit_1"></label><input type="radio" name="valve_solenoid_refrigeration_air_unit" id="valve_solenoid_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="valve_solenoid_refrigeration_air_unit_2"></label><input type="radio" name="valve_solenoid_refrigeration_air_unit" id="valve_solenoid_refrigeration_air_unit_2" value="2"></td>
          <td><label for="valve_solenoid_refrigeration_air_unit_3"></label><input type="radio" name="valve_solenoid_refrigeration_air_unit" id="valve_solenoid_refrigeration_air_unit_3" value="3"></td>
        </tr>
        <tr>
          <td>Escape tuberia y accesorios</td>
          <td><label for="scape_pipeline_refrigeration_air_unit_1"></label><input type="radio" name="scape_pipeline_refrigeration_air_unit" id="scape_pipeline_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="scape_pipeline_refrigeration_air_unit_2"></label><input type="radio" name="scape_pipeline_refrigeration_air_unit" id="scape_pipeline_refrigeration_air_unit_2" value="2"></td>
          <td><label for="scape_pipeline_refrigeration_air_unit_3"></label><input type="radio" name="scape_pipeline_refrigeration_air_unit" id="scape_pipeline_refrigeration_air_unit_3" value="3"></td>
          <td>Temp. linea succión y liquido</td>
          <td><label for="liquid_suction_refrigeration_air_unit_1"></label><input type="radio" name="liquid_suction_refrigeration_air_unit" id="liquid_suction_refrigeration_air_unit_1" value="1" checked></td>
          <td><label for="liquid_suction_refrigeration_air_unit_2"></label><input type="radio" name="liquid_suction_refrigeration_air_unit" id="liquid_suction_refrigeration_air_unit_2" value="2"></td>
          <td><label for="liquid_suction_refrigeration_air_unit_3"></label><input type="radio" name="liquid_suction_refrigeration_air_unit" id="liquid_suction_refrigeration_air_unit_3" value="3"></td>
        </tr>
      </table>
    </div>
    <div class="report_air_conditioning_sections">
      <br>
      <table class="report_air_conditioning_content_table">
        <th colspan="2">MOTOR VENTILADOR</th>
        <tr>
          <td></td>
          <td>1</td>
        </tr>
        <tr>
          <td rowspan="5">DATOS DE PLACA</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="rpm_fan_motor_unit">RPM</label><input type="text" name="rpm_fan_motor_unit" id="rpm_fan_motor_unit" placeholder="RPM"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="vol_fan_motor_unit">VOL</label><input type="text" name="vol_fan_motor_unit" id="vol_fan_motor_unit" placeholder="VOL"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_fan_motor_unit">AMP</label><input type="text" name="amp_fan_motor_unit" id="amp_fan_motor_unit" placeholder="AMP"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="hp_fan_motor_unit">HP</label><input type="text" name="hp_fan_motor_unit" id="hp_fan_motor_unit" placeholder="HP"></td>
        </tr>

        <tr>
          <td rowspan="4">AMPERAJE</td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_1_fan_unit">I <small>1</small></label> <input type="text" name="amp_1_fan_unit" id="amp_1_fan_unit" placeholder="I1"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_2_fan_unit">I <small>2</small></label> <input type="text" name="amp_2_fan_unit" id="amp_2_fan_unit" placeholder="I2"></td>
        </tr>
        <tr>
          <td class="right_alingment"><label for="amp_3_fan_unit">I <small>3</small></label> <input type="text" name="amp_3_fan_unit" id="amp_3_fan_unit" placeholder="I3"></td>
        </tr>
      </table>
    </div>

    <div class="report_air_conditioning_sections">
      <table class="report_air_conditioning_content_table">
        <th>OBSERVACIONES</th>
        <tr>
          <td>
            <textarea name="observations_report_air_conditioning" id="observations_report_air_conditioning" rows="8" cols="80" placeholder="Observaciones"></textarea>
          </td>
        </tr>
      </table>
    </div>
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
      <a class="btn_reports" id="save_form_air_conditioning" href="#">Guardar</a>
      <a class="btn_reports" id="send_form_air_conditioning" href="#">Enviar</a>
    </div>
    <br>
  </form>
</div>
