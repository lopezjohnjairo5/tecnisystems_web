<section id="machine" class="content_technical_panel_sections">

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
    <table id="table_search_machine" class="table_responsive_format">

    </table>
  </div>
</section>
<?php include TP."search_qr_machine.php";?>
