<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."new_products_model.php";
include GENERALFUNC."delete_special_chars.php";

$serial_product = htmlspecialchars(delete_special_chars($_POST["serial_product"]));

$exists = search_product_by_serial($serial_product);
if ($exists)
{
  print_r("exist");
}
