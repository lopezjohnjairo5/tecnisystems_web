<section id="reports" class="content_technical_panel_sections">
  <?php
    include TP."help_btn.php";
  ?>
  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_informe.png" alt="">
    <h1>INFORMES</h1>
    <hr>
    <br>
  </div>
  <div class="reports_search_content">
    <br>
      <div class="search_bar_report">
        <input type="search" id="search_report_input" name="search_report_input" placeholder="N°serial reporte, ciudad, departamento, fecha(aa-mm-dd), hoy, te(todos los reportes elect), ta(todos los reportes aires), tm(todos los reportes motob) ">
        <button type="button" id="btn_search_report" name="btn_search_report"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
      </div>
      <br>
      <br>
      <div class="max_size_table">
        <table id="table_reports_content" class="table_responsive_format">
          <thead>
            <th class="sort_elements_table_search_reports" id="tbsr_report_serial" ><u>S</u>erial Informe <img src="./imgs/cont_exp.png"></th>
            <th>Técnicos</th>
            <th>T. informe </th>
            <th class="sort_elements_table_search_reports" id="tbsr_department" ><u>D</u>epartamento <img src="./imgs/cont_exp.png"></th>
            <th class="sort_elements_table_search_reports" id="tbsr_city" ><u>C</u>iudad <img src="./imgs/cont_exp.png"></th>
            <th>Dirección </th>
            <th class="sort_elements_table_search_reports" id="tbsr_date" ><u>F</u>echa <img src="./imgs/cont_exp.png"></th>
            <th class="sort_elements_table_search_reports" id="tbsr_client" >Cliente <img src="./imgs/cont_exp.png"></th>
            <th class="sort_elements_table_search_reports" id="tbsr_person_in_charge" >Responsable <img src="./imgs/cont_exp.png"></th>
            <th>Acciones </th>
          </thead>
          <tbody id="tbody_reports_content">

          </tbody>

        </table>
      </div>
  </div>
  <br>
  <br>

  <?php
  include TP."pagination.php";
  ?>
</section>
