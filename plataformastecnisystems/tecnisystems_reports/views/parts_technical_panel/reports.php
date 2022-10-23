<section id="reports" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <br>
  </div>

  <div class="tabs">
    <button id="reports_tab_new" type="button" name="button">NUEVO</button>
    <button id="reports_tab_record" type="button" name="button">HISTORICO</button>
  </div>
  <br>
  <br>

  <?php
    include CONTROLLERS."load_departments_controller.php";
    $departments_token = return_array_departments();

    if ($_SESSION["technical_user"][3] == "técnico eléctrico") {
      include TP."report_electrical_content.php";
      include TP."scripts_electrical_panel.php";
    }else if ($_SESSION["technical_user"][3] == "técnico aire acondicionado") {
      include TP."report_air_conditioning_content.php";
      include TP."scripts_air_conditioning_panel.php";
    }else if ($_SESSION["technical_user"][3] == "técnico motobombas") {
      include TP."report_pumps_content.php";
      include TP."scripts_pumps_panel.php";
    }

    include TP."record_electrical_content.php";
    include TP."pop_client.php";
    include TP."pop_technical.php";

  ?>

</section>
