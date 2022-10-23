<section id="search_product">
  <br>
    <form class="" id="search_product_form" action="index.html" method="post">
      <div class="search_bar_product">
        <input type="search" id="search_product_input" name="search_product_input" placeholder="Serial, t(todo)">
        <button type="button" id="btn_search_product" name="btn_search_product"><img src="<?php echo IMGS;?>ico_buscar.png" alt="B"></button>
      </div>
    </form>
    <br>
    <div class="max_size_table">
      <table id="table_product_content" class="table_responsive_format">
      <thead>
        <th class="sort_elements_table_search_product" id="tbsr_prod_serial" >Serial <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_product" id="tbsr_prod_name" >Producto <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_product" id="tbsr_prod_brand" >Marca <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_product" id="tbsr_prod_prov" >Proveedor <img src="./imgs/cont_exp.png"></th>
        <th class="sort_elements_table_search_product" id="tbsr_prod_type" >Tipo Prod <img src="./imgs/cont_exp.png">.</th>
        <th class="sort_elements_table_search_product" id="tbsr_prod_prod" >Estado Prod <img src="./imgs/cont_exp.png">.</th>
        <th>Qr</th>
        <th>Ficha Técnica</th>
        <th>Acciones</th>
      </thead>
      <tbody id="tbody_product_content">

      </tbody>
    </table>

    </div>
    <?php
      include TP."pagination_product.php";
    ?>
</section>
<?php include TP."search_qr_product.php";?>
