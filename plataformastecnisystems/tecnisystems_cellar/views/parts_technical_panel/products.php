<section id="products" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <br>
  <div class="tabs">
    <button id="products_tab_new" type="button" name="button_products_new">NUEVO</button>
    <button id="products_tab_record" type="button" name="button_products_search">BUSCAR</button>
  </div>
  <br>
  <br>

  <?php
  include TP."new_product.php";
  include TP."search_product.php";
  include TP."pop_download_new_qr.php";
  include TP."scripts_products_panel.php";
  ?>
</section>
