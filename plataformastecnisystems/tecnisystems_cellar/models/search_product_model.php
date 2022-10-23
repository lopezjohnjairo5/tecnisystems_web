<?php
include CORE."conection.php";

function search_info_products($serialP)
{
  $conn = Conect_bd("cellar");
  $n_array = array();

  try
  {
    $query = "SELECT DISTINCTROW cgip.idCellarGeneralInfoProduct, cgip.serialProduct, cgip.Product, cgip.Brand, cgip.pathDatasheet, cgip.pathQR, cgip.idTypeProduct, tp.Type, sp.Supplier, ps.productStatus FROM cellar_general_info_products cgip, type_products tp, suppliers sp, product_status ps WHERE tp.idTypeProduct = cgip.idTypeProduct AND ps.idProductStatus = cgip.idProductStatus AND sp.idSupplier = cgip.idSupplier AND cgip.serialProduct = '$serialP' ;";


    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($n_array,[
        "idCellarGeneralInfoProduct" => $item['idCellarGeneralInfoProduct'],
        "serialProduct" => $item['serialProduct'],
        "Product" => $item['Product'],
        "Brand" => $item['Brand'],
        "pathDatasheet" => $item['pathDatasheet'],
        "pathQR" => $item['pathQR'],
        "idTypeProduct" => $item['idTypeProduct'],
        "Type" => $item['Type'],
        "Supplier" => $item['Supplier'],
        "productStatus" => $item['productStatus']]);
    }
    Disconect_bd($result,$conn);
    return $n_array;

  }
  catch (Exception $e)
  {
    return false;
  }
}


function search_info_alls_products()
{
  $conn = Conect_bd("cellar");
  $n_array = array();

  try
  {
    $query = "SELECT cgip.idCellarGeneralInfoProduct, cgip.serialProduct, cgip.Product, cgip.Brand, cgip.pathDatasheet, cgip.pathQR, cgip.idTypeProduct, tp.Type, sp.Supplier, ps.productStatus FROM cellar_general_info_products cgip, type_products tp, suppliers sp, product_status ps WHERE tp.idTypeProduct = cgip.idTypeProduct AND ps.idProductStatus = cgip.idProductStatus AND sp.idSupplier = cgip.idSupplier ORDER BY cgip.idCellarGeneralInfoProduct ASC;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($n_array,[
        "idCellarGeneralInfoProduct" => $item['idCellarGeneralInfoProduct'],
        "serialProduct" => $item['serialProduct'],
        "Product" => $item['Product'],
        "Brand" => $item['Brand'],
        "pathDatasheet" => $item['pathDatasheet'],
        "pathQR" => $item['pathQR'],
        "idTypeProduct" => $item['idTypeProduct'],
        "Type" => $item['Type'],
        "Supplier" => $item['Supplier'],
        "productStatus" => $item['productStatus']]);
    }
    Disconect_bd($result,$conn);
    return $n_array;

  }
  catch (Exception $e)
  {
    return false;
  }
}
