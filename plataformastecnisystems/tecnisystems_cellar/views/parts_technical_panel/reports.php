<section id="reports" class="content_technical_panel_sections">
  <div class="head_content_technical_panel_sections">
    <img src="<?php echo IMGS?>ico_informe.png" alt="">
    <h1>INFORMES</h1>
    <hr>
    <br>
  </div>
    <form class="" id="search_report_form" action="index.html" method="post">
      <div class="search_bar_report">
        <input type="search" id="search_report_input" name="search_report_input" placeholder="Serie, ced técnico, fecha, tipo reporte">
        <button type="button" id="btn_search_report" name="btn_search_report"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
      </div>
    </form>
    <br>
    <table id="table_report_content" class="table_responsive_format">
      <thead>
        <th>N° serie</th>
        <th>Técnico 1</th>
        <th>Técnico 2</th>
        <th>Técnico 3</th>
        <th>Fecha</th>
        <th>Tipo reporte</th>
        <th>Acciones</th>
      </thead>
      <tbody id="tbody_report_content">
        <tr>
          <td>123456789</td>
          <td>jorge</td>
          <td>carlos</td>
          <td>----</td>
          <td>12/03/2032</td>
          <td>reporte electrico</td>
          <td class="img_previews_tables"><a href="#"> <img src="<?php echo IMGS;?>ico_descargar.png" alt=""></a> </td>
        </tr>
      </tbody>
    </table>
</section>
