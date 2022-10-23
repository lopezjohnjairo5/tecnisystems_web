<section id="machine" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_buscar.png" alt="">
    <h1>CONSULTAR MAQUINA</h1>
    <hr>
    <br>
    <form class="" id="search_machine_form" action="index.html" method="post">
      <div class="search_bar_machine">
        <input type="search" id="search_machine" name="search_machine" placeholder="Serial">
        <button type="button" id="btn_search_machine" name="btn_search_machine"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
        <button type="button" id="btn_qr_search_machine" name="btn_qr_search_machine"><img src="<?php echo IMGS;?>ico_qr.png" alt="QR"></button>
      </div>
    </form>
    <br>
    <div class="max_size_table">
      <table id="table_search_machine" class="table_responsive_format">
        <thead>
          <th class="sort_elements_table_search_machine" id="serial_machine">Serial / Código <img src="./imgs/cont_exp.png"></th>
          <th class="sort_elements_table_search_machine" id="name_machine">Máquina <img src="./imgs/cont_exp.png"></th>
          <th class="sort_elements_table_search_machine" id="brand_machine">Marca <img src="./imgs/cont_exp.png"></th>
          <th class="sort_elements_table_search_machine" id="datasheet_machine">Ficha Técnica</th>
        </thead>
        <tbody id="tbody_search_machine_content">

        </tbody>
      </table>
    </div>
  </div>
  <?php
    include TP."pagination_machine_table.php";
  ?>
</section>
<?php include TP."search_qr_machine.php";?>
