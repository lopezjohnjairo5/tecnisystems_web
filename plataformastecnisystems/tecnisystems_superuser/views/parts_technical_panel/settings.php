<section id="settings" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_informe.png" alt="">
    <h1>CONFIGURACIÓN</h1>
    <hr>
    <br>
    <form id="form_settings_technical_panel" method="post">
      <input class="general_inputs" type="email" name="setting_email" id="setting_email" placeholder="Email" required>
      <input class="general_inputs" type="password" name="setting_pass" id="setting_pass" placeholder="Password actual" autocomplete="off" required>
      <input class="general_inputs" type="password" name="setting_new_pass" id="setting_new_pass" placeholder="Password nuevo" autocomplete="off" required>
      <input class="general_inputs" type="password" name="setting_conf_new_pass" id="setting_conf_new_pass" placeholder="Confirmar nuevo password" autocomplete="off" required>
      <br>
      <a class="general_input_button" name="setting_update_btn" id="setting_update_btn">Actualizar</a>
    </form>
  </div>
</section>
