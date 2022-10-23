<section id="clients" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <br>
  </div>

  <div class="tabs">
    <button id="reports_tab_new_client" type="button" name="button">NUEVO CLIENTE</button>
    <button id="reports_tab_search_client" type="button" name="button">BUSCAR CLIENTE</button>
  </div>
  <br>
  <br>

  <?php
    include CONTROLLERS."load_departments_controller.php";
    $departments_token = return_array_departments();
    include TP."new_client.php";
    include TP."search_client.php";
  ?>





</section>
