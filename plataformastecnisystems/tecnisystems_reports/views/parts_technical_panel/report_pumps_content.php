<div id="report_pumps_content" class="content_tab1_reports">
	<br>
	<form id="report_pumps_form">
		<div class="report_pumps_content_sections">
			<h3>PERSONAL</h3>

			<label for="technical_pumps_1">*Técnico 1</label> <input type="text" name="name_technical_pumps_1" class="technical_pumps_section" id="name_technical_pumps_1" value="<?php echo $_SESSION["technical_user"][1];?>" placeholder="Nombre Técnico 1"> <input type="email" name="email_technical_pumps_1" class="technical_pumps_section" id="email_technical_pumps_1" value="<?php echo $_SESSION["technical_user"][2];?>" placeholder="email Técnico 1"><input type="number" min="10000000" max="99999999999" class="technical_pumps_section" id="technical_pumps_1" name="technical_pumps_1" placeholder="N° Documento Técnico 1">
      <br><label for="technical_pumps_2">Técnico 2</label> <input type="text" name="name_technical_pumps_2" class="technical_pumps_section" id="name_technical_pumps_2" placeholder="Nombre Técnico 2"> <input type="email" name="email_technical_pumps_2" class="technical_pumps_section" id="email_technical_pumps_2" placeholder="email Técnico 2"><input type="number" min="10000000" max="99999999999" class="technical_pumps_section" id="technical_pumps_2" name="technical_pumps_2" placeholder="N° Documento Técnico 2">
      <br><label for="technical_pumps_3">Técnico 3</label> <input type="text" name="name_technical_pumps_3" class="technical_pumps_section" id="name_technical_pumps_3" placeholder="Nombre Técnico 3"> <input type="email" name="email_technical_pumps_3" class="technical_pumps_section" id="email_technical_pumps_3" placeholder="email Técnico 3"><input type="number" min="10000000" max="99999999999" class="technical_pumps_section" id="technical_pumps_3" name="technical_pumps_3" placeholder="N° Documento Técnico 3">
		</div>
		<div class="report_pumps_content_sections">
			<h3>INFORMACIÓN GENERAL</h3>
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
			<br>
			<br>
			<label for="pumps_date">Fecha </label><input type="date" name="pumps_date" id="pumps_date" value="<?php echo date('Y-m-d');?>">
			<br>
			<br>
			<label for="type_maintenance">Tipo Mantenimiento</label>
			<select class="" id="type_maintenance" name="type_maintenance">
				<option value="1">Preventivo</option>
				<option value="2">Correctivo</option>
			</select>
			<br>
			<br>
			<br>
		</div>

		<div class="report_pumps_content_sections">
			<h3>Máquina</h3>
			<div class="scan_qr_electrical_machine">
		        <video></video>
		        <canvas id="img_preview_machine"></canvas>
		        <input class="elements_btns_scan_qr_machine" type="file" name="path_input_photo_machine" id="path_input_photo_machine" placeholder="seleccione un archivo">
		    </div>
		</div>
		<div class="report_pumps_content_sections">
			<table class="report_pumps_content_table">
				<th>
					<tr>
						<td></td>
						<td>BOMBA1</td>
						<td>BOMBA2</td>
						<td>BOMBA3</td>
						<td>BOMBA4</td>
					</tr>
				</th>
				<tr>
					<td>* SERIAL</td>
					<td><label></label><input type="search" class="pump_serial" id="pump_serial1" name="pump_serial1" placeholder="* Serial Machine"></td>
					<td><label></label><input type="search" class="pump_serial" id="pump_serial2" name="pump_serial2" placeholder="* Serial Machine"></td>
					<td><label></label><input type="search" class="pump_serial" id="pump_serial3" name="pump_serial3" placeholder="* Serial Machine"></td>
					<td><label></label><input type="search" class="pump_serial" id="pump_serial4" name="pump_serial4" placeholder="* Serial Machine"></td>
				</tr>
				<tr>
					<td>MARCA</td>
					<td><label></label><input type="text" name="pump_mark1" id="pump_mark1" placeholder="marca bomba1" disabled></td>
					<td><label></label><input type="text" name="pump_mark2" id="pump_mark2" placeholder="marca bomba2" disabled></td>
					<td><label></label><input type="text" name="pump_mark3" id="pump_mark3" placeholder="marca bomba3" disabled></td>
					<td><label></label><input type="text" name="pump_mark4" id="pump_mark4" placeholder="marca bomba4" disabled></td>
				</tr>
				<tr>
					<td>HP</td>
					<td><label></label><input type="text" name="pump_hp1" id="pump_hp1" placeholder="HP bomba1" disabled></td>
					<td><label></label><input type="text" name="pump_hp2" id="pump_hp2" placeholder="HP bomba2" disabled></td>
					<td><label></label><input type="text" name="pump_hp3" id="pump_hp3" placeholder="HP bomba3" disabled></td>
					<td><label></label><input type="text" name="pump_hp4" id="pump_hp4" placeholder="HP bomba4" disabled></td>
				</tr>
				<tr>
					<td>VOLTAJE</td>
					<td><label></label><input type="text" name="pump_volt1" id="pump_volt1" placeholder="Voltaje bomba1" disabled></td>
					<td><label></label><input type="text" name="pump_volt2" id="pump_volt2" placeholder="Voltaje bomba2" disabled></td>
					<td><label></label><input type="text" name="pump_volt3" id="pump_volt3" placeholder="Voltaje bomba3" disabled></td>
					<td><label></label><input type="text" name="pump_volt4" id="pump_volt4" placeholder="Voltaje bomba4" disabled></td>
				</tr>
				<tr>
					<td>AMPERAJE</td>
					<td><label></label><input type="text" name="pump_amper1" id="pump_amper1" placeholder="amperaje bomba1" disabled></td>
					<td><label></label><input type="text" name="pump_amper2" id="pump_amper2" placeholder="amperaje bomba2" disabled></td>
					<td><label></label><input type="text" name="pump_amper3" id="pump_amper3" placeholder="amperaje bomba3" disabled></td>
					<td><label></label><input type="text" name="pump_amper4" id="pump_amper4" placeholder="amperaje bomba4" disabled></td>
				</tr>
				<tr>
					<td>TABLERO DE CONTROL</td>
					<td><label></label><input type="text" name="pump_panel_control1" id="pump_panel_control1" placeholder="tablero de control bomba1"></td>
					<td><label></label><input type="text" name="pump_panel_control2" id="pump_panel_control2" placeholder="tablero de control bomba2"></td>
					<td><label></label><input type="text" name="pump_panel_control3" id="pump_panel_control3" placeholder="tablero de control bomba3"></td>
					<td><label></label><input type="text" name="pump_panel_control4" id="pump_panel_control4" placeholder="tablero de control bomba4"></td>
				</tr>
				<tr>
					<td>PROTECCIÓN</td>
					<td><label></label><input type="text" name="pump_protection1" id="pump_protection1" placeholder="protección bomba1"></td>
					<td><label></label><input type="text" name="pump_protection2" id="pump_protection2" placeholder="protección bomba2"></td>
					<td><label></label><input type="text" name="pump_protection3" id="pump_protection3" placeholder="protección bomba3"></td>
					<td><label></label><input type="text" name="pump_protection4" id="pump_protection4" placeholder="protección bomba4"></td>
				</tr>
				<tr>
					<td>TANQUE HIDRO</td>
					<td><label></label><input type="text" name="pump_hidro_tank1" id="pump_hidro_tank1" placeholder="tanque hidro bomba1"></td>
					<td><label></label><input type="text" name="pump_hidro_tank2" id="pump_hidro_tank2" placeholder="tanque hidro bomba2"></td>
					<td><label></label><input type="text" name="pump_hidro_tank3" id="pump_hidro_tank3" placeholder="tanque hidro bomba3"></td>
					<td><label></label><input type="text" name="pump_hidro_tank4" id="pump_hidro_tank4" placeholder="tanque hidro bomba4"></td>
				</tr>
				<tr>
					<td>CAPACIDAD</td>
					<td><label></label><input type="text" name="pump_capacity1" id="pump_capacity1" placeholder="capacidad bomba1" disabled></td>
					<td><label></label><input type="text" name="pump_capacity2" id="pump_capacity2" placeholder="capacidad bomba2" disabled></td>
					<td><label></label><input type="text" name="pump_capacity3" id="pump_capacity3" placeholder="capacidad bomba3" disabled></td>
					<td><label></label><input type="text" name="pump_capacity4" id="pump_capacity4" placeholder="capacidad bomba4" disabled></td>
				</tr>
				<tr>
					<td>PRESIÓN DE TRABAJO</td>
					<td><label></label><input type="text" name="pump_work_pressure1" id="pump_work_pressure1" placeholder="presión de trabajo bomba1"></td>
					<td><label></label><input type="text" name="pump_work_pressure2" id="pump_work_pressure2" placeholder="presión de trabajo bomba2"></td>
					<td><label></label><input type="text" name="pump_work_pressure3" id="pump_work_pressure3" placeholder="presión de trabajo bomba3"></td>
					<td><label></label><input type="text" name="pump_work_pressure4" id="pump_work_pressure4" placeholder="presión de trabajo bomba4"></td>
				</tr>
				<tr>
					<td>PRECARGA</td>
					<td><label></label><input type="text" name="pump_precharge1" id="pump_precharge1" placeholder="precarga bomba1"></td>
					<td><label></label><input type="text" name="pump_precharge2" id="pump_precharge2" placeholder="precarga bomba2"></td>
					<td><label></label><input type="text" name="pump_precharge3" id="pump_precharge3" placeholder="precarga bomba3"></td>
					<td><label></label><input type="text" name="pump_precharge4" id="pump_precharge4" placeholder="precarga bomba4"></td>
				</tr>
				<tr>
					<td>FLOTADOR ELECTRICO</td>
					<td><label></label><input type="text" name="pump_electric_float1" id="pump_electric_float1" placeholder="flotador electrico bomba1"></td>
					<td><label></label><input type="text" name="pump_electric_float2" id="pump_electric_float2" placeholder="flotador electrico bomba2"></td>
					<td><label></label><input type="text" name="pump_electric_float3" id="pump_electric_float3" placeholder="flotador electrico bomba3"></td>
					<td><label></label><input type="text" name="pump_electric_float4" id="pump_electric_float4" placeholder="flotador electrico bomba4"></td>
				</tr>
				<tr>
					<td>PARTE HIDRAULICA</td>
					<td><label></label><input type="text" name="pump_hydraulic1" id="pump_hydraulic1" placeholder="parte hidraulica bomba1"></td>
					<td><label></label><input type="text" name="pump_hydraulic2" id="pump_hydraulic2" placeholder="parte hidraulica bomba2"></td>
					<td><label></label><input type="text" name="pump_hydraulic3" id="pump_hydraulic3" placeholder="parte hidraulica bomba3"></td>
					<td><label></label><input type="text" name="pump_hydraulic4" id="pump_hydraulic4" placeholder="parte hidraulica bomba4"></td>
				</tr>
			</table>
		</div>
		<br>
		<div class="report_pumps_content_sections">
			<label for="pumps_observations">Observaciones: </label>
			<br>
			<textarea name="pumps_observations" id="pumps_observations" rows="8" cols="80" placeholder="Observaciones"></textarea>
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
		    <a class="btn_reports" id="save_form_pumps" href="#">Guardar</a>
		    <a class="btn_reports" id="send_form_pumps" href="#">Enviar</a>
	    </div>
	    <br>
	</form>
</div>
