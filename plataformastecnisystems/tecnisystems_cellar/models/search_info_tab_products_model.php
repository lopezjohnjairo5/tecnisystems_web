<?php
include CORE."conection.php";

function search_info_providers()
{
  $conn = Conect_bd("cellar");
  $array_prov = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idSupplier`, `Supplier` FROM suppliers ORDER BY `idSupplier` ASC";

    $sql = $conn->prepare($search_sql);

    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_prov,[
        "idSupplier" => $item["idSupplier"],
        "Supplier" => $item["Supplier"]
      ]);
    }
    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_prov;
  }
  catch(Exception $e)
  {
      return false;
  }
}

function search_info_state_product()
{
  $conn = Conect_bd("cellar");
  $array_prod_status = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idProductStatus`, `productStatus` FROM product_status ORDER BY `idProductStatus` ASC";
    $sql = $conn->prepare($search_sql);

    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_prod_status,[
        "idProductStatus" => $item["idProductStatus"],
        "productStatus" => $item["productStatus"]
      ]);
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_prod_status;
  }
  catch(Exception $e)
  {
      return false;
  }
}

function search_info_type_product()
{
  $conn = Conect_bd("cellar");
  $array_type_prod = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idTypeProduct`, `Type` FROM type_products ORDER BY `idTypeProduct` ASC";
    $sql = $conn->prepare($search_sql);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_type_prod,[
        "idTypeProduct" => $item["idTypeProduct"],
        "Type" => $item["Type"]
      ]);
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_type_prod;
  }

  catch(Exception $e)
  {
      return false;
  }
}

function search_info_type_pumps_product()
{
  $conn = Conect_bd("cellar");
  $array_type_pumps_product = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idPumpType`, `pumpType` FROM pump_types ORDER BY `idPumpType` ASC";
    $sql = $conn->prepare($search_sql);

    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_type_pumps_product,[
        "idPumpType" => $item["idPumpType"],
        "pumpType" => $item["pumpType"]
      ]);
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_type_pumps_product;
  }

  catch(Exception $e)
  {
      return false;
  }
}

function search_info_type_air_product()
{
  $conn = Conect_bd("cellar");
  $array_type_air_product = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idAirConditioningTypes`, `AirConditioningTypes` FROM air_conditioning_types ORDER BY `idAirConditioningTypes` ASC";
    $sql = $conn->prepare($search_sql);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_type_air_product,[
        "idAirConditioningTypes" => $item["idAirConditioningTypes"],
        "AirConditioningTypes" => $item["AirConditioningTypes"]
      ]);
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_type_air_product;
  }
  catch(Exception $e)
  {
      return false;
  }
}
