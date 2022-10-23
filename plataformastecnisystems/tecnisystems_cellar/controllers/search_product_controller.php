<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."search_product_model.php";

$serial = $_POST["data"][0]["serial"];

if (!empty($serial))
{
  if ($serial == "t")
  {
    $result = search_info_alls_products();
  }
  else
  {
    $result = search_info_products($serial);
  }
  echo json_encode($result);
}
else
{
  echo "Error";
}
