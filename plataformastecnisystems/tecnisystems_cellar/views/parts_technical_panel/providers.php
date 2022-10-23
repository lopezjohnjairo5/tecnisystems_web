<section id="providers" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <br>
  <div class="tabs">
    <button id="button_prov_new" type="button" name="button_prov_new">NUEVO</button>
    <button id="button_prov_search" type="button" name="button_prov_search">BUSCAR</button>
  </div>
  <br>
  <br>

  <?php
  include CONTROLLERS."load_departments_controller.php";
  $departments_token = return_array_departments();
  include TP."new_provider.php";
  include TP."search_provider.php";
  include TP."scripts_providers_panel.php";
  ?>
</section>
