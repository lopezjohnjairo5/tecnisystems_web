<?php

function search_id_cellar_general_product($serialProduct,$idTypeProduct)
{
    $conn = Conect_bd("cellar");
    $id_cellar_product = "";

    try
    {
      $query = "SELECT idCellarGeneralInfoProduct FROM cellar_general_info_products WHERE serialProduct = '".$serialProduct."' AND idTypeProduct = ".$idTypeProduct.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        $id_cellar_product = $item['idCellarGeneralInfoProduct'];
      }

      Disconect_bd($results,$conn);
      return $id_cellar_product;

    }
    catch (Exception $e)
    {
      return false;
    }
  }
