<?php
include CORE."conection.php";

function search_info_general_products_by_id($idProduct)
{
  $conn = Conect_bd("cellar");
  $arrayGIP = array();

  try
  {
    $query = "SELECT `serialProduct`,`Product`,`Brand`,`pathDatasheet`,`pathQR`,`idTypeProduct`,`idSupplier`,`idProductStatus` FROM cellar_general_info_products WHERE idCellarGeneralInfoProduct = :idProduct;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idProduct',$idProduct,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayGIP,[
        "serialProduct" => $item['serialProduct'],
        "Product" => $item['Product'],
        "Brand" => $item['Brand'],
        "pathDatasheet" => $item['pathDatasheet'],
        "pathQR" => $item['pathQR'],
        "idTypeProduct" => $item['idTypeProduct'],
        "idSupplier" => $item['idSupplier'],
        "idProductStatus" => $item['idProductStatus']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayGIP;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_info_cellar_electric_products_by_id($idProduct)
{
  $conn = Conect_bd("cellar");
  $arrayGIP = array();

  try
  {
    $query = "SELECT `powerPlant`,`powerPlantModel`,`powerPlantSerie`,`motor`,`motorModel`,`motorSerie`,`generator`,`generatorSerie`,`generatorKw`,`generatorKwa`,`generatorPhases`,`generatorVolt`,`idAmountReferenceElectricProducts` FROM cellar_electric_products WHERE idCellarGeneralInfoProduct = :idProduct;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idProduct',$idProduct,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayGIP,[
        "powerPlant" => $item['powerPlant'],
        "powerPlantModel" => $item['powerPlantModel'],
        "powerPlantSerie" => $item['powerPlantSerie'],
        "motor" => $item['motor'],
        "motorModel" => $item['motorModel'],
        "motorSerie" => $item['motorSerie'],
        "generator" => $item['generator'],
        "generatorSerie" => $item['generatorSerie'],
        "generatorKw" => $item['generatorKw'],
        "generatorKwa" => $item['generatorKwa'],
        "generatorPhases" => $item['generatorPhases'],
        "generatorVolt" => $item['generatorVolt'],
        "idAmountReferenceElectricProducts" => $item['idAmountReferenceElectricProducts']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayGIP;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_info_cellar_amount_electric_products_by_id($idAREP)
{
  $conn = Conect_bd("cellar");
  $arrayAREP = array();

  try
  {
    $query = "SELECT `oilAmount`,`oilReference`,`fuelAmount`,`fuelReference`,`airAmount`,`airReference`,`separatorAmount`,`separatorReference`,`refrigerantAmount`,`refrigerantReference`,`engineOilAmount`,`engineOilReference`,`otherAmount`,`otherReference` FROM amount_reference_electric_products WHERE idAmountReferenceElectricProducts = :idAREP;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idAREP',$idAREP,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayAREP,[
        "oilAmount" => $item['oilAmount'],
        "oilReference" => $item['oilReference'],
        "fuelAmount" => $item['fuelAmount'],
        "fuelReference" => $item['fuelReference'],
        "airAmount" => $item['airAmount'],
        "airReference" => $item['airReference'],
        "separatorAmount" => $item['separatorAmount'],
        "separatorReference" => $item['separatorReference'],
        "refrigerantAmount" => $item['refrigerantAmount'],
        "refrigerantReference" => $item['refrigerantReference'],
        "engineOilAmount" => $item['engineOilAmount'],
        "engineOilReference" => $item['engineOilReference'],
        "otherAmount" => $item['otherAmount'],
        "otherReference" => $item['otherReference']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayAREP;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_info_cellar_air_products_by_id($idProduct)
{
  $conn = Conect_bd("cellar");
  $arrayGAP = array();

  try
  {
    $query = "SELECT `capacity`,`idAirConditioningTypes` FROM cellar_air_conditioning_products WHERE idCellarGeneralInfoProduct = :idProduct;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idProduct',$idProduct,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayGAP,[
        "capacity" => $item['capacity'],
        "idAirConditioningTypes" => $item['idAirConditioningTypes']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayGAP;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_info_cellar_pumps_products_by_id($idProduct)
{
  $conn = Conect_bd("cellar");
  $arrayGPP = array();

  try
  {
    $query = "SELECT `voltage`, `hp`, `amps`, `capacity`,`idPumpType` FROM cellar_pumps_products WHERE idCellarGeneralInfoProduct = :idProduct;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idProduct',$idProduct,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayGPP,[
        "voltage" => $item['voltage'],
        "hp" => $item['hp'],
        "amps" => $item['amps'],
        "capacity" => $item['capacity'],
        "idPumpType" => $item['idPumpType']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayGPP;

  }
  catch (Exception $e)
  {
    return false;
  }
}
