<?php
include CORE."conection.php";

function search_product_by_serial($serial)
{
  $conn = Conect_bd("cellar");
  $product = "";

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `Product` FROM cellar_general_info_products WHERE `serialProduct` =  :serialProduct;";

    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':serialProduct',$serial,PDO::PARAM_STR);
    $sql->execute();

    foreach ($sql as $item)
    {
      $product = $item["Product"];
    }

    Disconect_bd($result,$conn);

    if(!empty($product) && $product != "")
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  catch(Exception $e)
  {
      return false;
  }
}

function search_id_general_product_by_serial($serial)
{
  $conn = Conect_bd("cellar");
  $id_cellar_product = "";

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idCellarGeneralInfoProduct` FROM cellar_general_info_products WHERE `serialProduct` =  :serialProduct;";

    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':serialProduct',$serial,PDO::PARAM_STR);
    $sql->execute();

    foreach ($sql as $item)
    {
      $id_cellar_product = $item["idCellarGeneralInfoProduct"];
    }

    Disconect_bd($result,$conn);
    return $id_cellar_product;
  }

  catch(Exception $e)
  {
      return false;
  }
}

function search_id_cellar_electric_product_by_id_general($id_general)
{
  $conn = Conect_bd("cellar");
  $idAmountR = "";

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idAmountReferenceElectricProducts` FROM cellar_electric_products WHERE `idCellarGeneralInfoProduct` =  :idCellarGeneralInfoProduct;";

    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':idCellarGeneralInfoProduct',$id_general,PDO::PARAM_STR);
    $sql->execute();

    foreach ($sql as $item)
    {
      $idAmountR = $item["idAmountReferenceElectricProducts"];
    }

    Disconect_bd($result,$conn);
    return $idAmountR;
  }

  catch(Exception $e)
  {
      return false;
  }
}

function insert_amount_electric_new_product($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `amount_reference_electric_products` (`oilAmount`, `oilReference`, `fuelAmount`, `fuelReference`, `airAmount`, `airReference`, `separatorAmount`, `separatorReference`, `refrigerantAmount`, `refrigerantReference`, `engineOilAmount`, `engineOilReference`, `otherAmount`, `otherReference`) VALUES (:oilAmount, :oilReference, :fuelAmount, :fuelReference, :airAmount, :airReference, :separatorAmount, :separatorReference, :refrigerantAmount, :refrigerantReference, :engineOilAmount, :engineOilReference, :otherAmount, :otherReference)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':oilAmount',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':oilReference',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':fuelAmount',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':fuelReference',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':airAmount',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':airReference',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':separatorAmount',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':separatorReference',$content[7],PDO::PARAM_STR);
    $sql->bindParam(':refrigerantAmount',$content[8],PDO::PARAM_STR);
    $sql->bindParam(':refrigerantReference',$content[9],PDO::PARAM_STR);
    $sql->bindParam(':engineOilAmount',$content[10],PDO::PARAM_STR);
    $sql->bindParam(':engineOilReference',$content[11],PDO::PARAM_STR);
    $sql->bindParam(':otherAmount',$content[12],PDO::PARAM_STR);
    $sql->bindParam(':otherReference',$content[13],PDO::PARAM_STR);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;
  }

  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function insert_cellar_electric_new_product($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `cellar_electric_products` (`powerPlant`, `powerPlantModel`, `powerPlantSerie`, `motor`, `motorModel`, `motorSerie`, `generator`, `generatorSerie`, `generatorKw`, `generatorKwa`, `generatorPhases`, `generatorVolt`, `idAmountReferenceElectricProducts`, `idCellarGeneralInfoProduct`) VALUES (:powerPlant, :powerPlantModel, :powerPlantSerie, :motor, :motorModel, :motorSerie, :generator, :generatorSerie, :generatorKw, :generatorKwa, :generatorPhases, :generatorVolt, :idAmountReferenceElectricProducts, :idCellarGeneralInfoProduct)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':powerPlant',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':powerPlantModel',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':powerPlantSerie',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':motor',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':motorModel',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':motorSerie',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':generator',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':generatorSerie',$content[7],PDO::PARAM_STR);
    $sql->bindParam(':generatorKw',$content[8],PDO::PARAM_INT);
    $sql->bindParam(':generatorKwa',$content[9],PDO::PARAM_INT);
    $sql->bindParam(':generatorPhases',$content[10],PDO::PARAM_INT);
    $sql->bindParam(':generatorVolt',$content[11],PDO::PARAM_INT);
    $sql->bindParam(':idAmountReferenceElectricProducts',$content[12],PDO::PARAM_INT);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[13],PDO::PARAM_INT);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function insert_cellar_general_info_product($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `cellar_general_info_products` (`serialProduct`, `Product`, `Brand`, `pathDatasheet`, `pathQR`, `idTypeProduct`, `idSupplier`, `idProductStatus`) VALUES (:serialProduct, :Product, :Brand, :pathDatasheet, :pathQR, :idTypeProduct, :idSupplier, :idProductStatus)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':serialProduct',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':Product',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':Brand',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':pathDatasheet',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':pathQR',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':idSupplier',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':idProductStatus',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':idTypeProduct',$content[7],PDO::PARAM_STR);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function insert_cellar_air_conditioning_new_product($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `cellar_air_conditioning_products` (`capacity`, `idAirConditioningTypes`, `idCellarGeneralInfoProduct`) VALUES (:capacity, :idAirConditioningTypes, :idCellarGeneralInfoProduct)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':capacity',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':idAirConditioningTypes',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[2],PDO::PARAM_STR);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function insert_cellar_pumps_new_product($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `cellar_pumps_products` (`voltage`,`hp`,`amps`, `capacity`, `idPumpType`, `idCellarGeneralInfoProduct`) VALUES (:voltage, :hp, :amps, :capacity, :idPumpType, :idCellarGeneralInfoProduct)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':voltage',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':hp',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':amps',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':capacity',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':idPumpType',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[5],PDO::PARAM_STR);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;
  }

  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}


function update_cellar_electric_products($content)
{
  $conn = Conect_bd("cellar");
  $result_query = false;

  try
  {
    $conn->beginTransaction();
    $insertSql = "UPDATE cellar_electric_products SET
    `powerPlant` = :powerPlant,
    `powerPlantModel` = :powerPlantModel,
    `powerPlantSerie` = :powerPlantSerie,
    `motor` = :motor,
    `motorModel` = :motorModel,
    `motorSerie` = :motorSerie,
    `generator` = :generator,
    `generatorSerie` = :generatorSerie,
    `generatorKw` = :generatorKw,
    `generatorKwa` = :generatorKwa,
    `generatorPhases` = :generatorPhases,
    `generatorVolt` = :generatorVolt
    WHERE `idCellarGeneralInfoProduct` = :idCellarGeneralInfoProduct ;";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':powerPlant',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':powerPlantModel',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':powerPlantSerie',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':motor',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':motorModel',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':motorSerie',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':generator',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':generatorSerie',$content[7],PDO::PARAM_STR);
    $sql->bindParam(':generatorKw',$content[8],PDO::PARAM_INT);
    $sql->bindParam(':generatorKwa',$content[9],PDO::PARAM_INT);
    $sql->bindParam(':generatorPhases',$content[10],PDO::PARAM_INT);
    $sql->bindParam(':generatorVolt',$content[11],PDO::PARAM_INT);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[12],PDO::PARAM_INT);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      $result_query = true;
    }
    else
    {
      $result_query = false;
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $result_query;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function update_amount_reference_electric_products($content)
{
  $conn = Conect_bd("cellar");
  $result_query = false;

  try
  {
    $conn->beginTransaction();
    $insertSql = "UPDATE amount_reference_electric_products SET
    `oilAmount` = :oilAmount,
    `oilReference` = :oilReference,
    `fuelAmount` = :fuelAmount,
    `fuelReference` = :fuelReference,
    `airAmount` = :airAmount,
    `airReference` = :airReference,
    `separatorAmount` = :separatorAmount,
    `separatorReference` = :separatorReference,
    `refrigerantAmount` = :refrigerantAmount,
    `refrigerantReference` = :refrigerantReference,
    `engineOilAmount` = :engineOilAmount,
    `engineOilReference` = :engineOilReference,
    `otherAmount` = :otherAmount,
    `otherReference` = :otherReference
    WHERE `idAmountReferenceElectricProducts` = :idAmountReferenceElectricProducts;";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':oilAmount',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':oilReference',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':fuelAmount',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':fuelReference',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':airAmount',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':airReference',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':separatorAmount',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':separatorReference',$content[7],PDO::PARAM_STR);
    $sql->bindParam(':refrigerantAmount',$content[8],PDO::PARAM_STR);
    $sql->bindParam(':refrigerantReference',$content[9],PDO::PARAM_STR);
    $sql->bindParam(':engineOilAmount',$content[10],PDO::PARAM_STR);
    $sql->bindParam(':engineOilReference',$content[11],PDO::PARAM_STR);
    $sql->bindParam(':otherAmount',$content[12],PDO::PARAM_STR);
    $sql->bindParam(':otherReference',$content[13],PDO::PARAM_STR);
    $sql->bindParam(':idAmountReferenceElectricProducts',$content[14],PDO::PARAM_STR);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      $result_query = true;
    }
    else
    {
      $result_query = false;
    }
    $conn->commit();
    Disconect_bd($result,$conn);
    return $result_query;
  }

  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function update_cellar_general_info_products($content)
{
  $conn = Conect_bd("cellar");
  $result_query = false;

  try
  {
    $conn->beginTransaction();
    $insertSql = "UPDATE cellar_general_info_products SET
    `Product` = :Product,
    `Brand` = :Brand,
    `pathDatasheet` = :pathDatasheet,
    `pathQR` = :pathQR,
    `idTypeProduct` = :idTypeProduct,
    `idSupplier` = :idSupplier,
    `idProductStatus` = :idProductStatus
    WHERE `serialProduct` = :serialProduct;";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':serialProduct',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':Product',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':Brand',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':pathDatasheet',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':pathQR',$content[4],PDO::PARAM_STR);
    $sql->bindParam(':idSupplier',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':idProductStatus',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':idTypeProduct',$content[7],PDO::PARAM_STR);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      $result_query = true;
    }
    else
    {
      $result_query = false;
    }

    $conn->commit();

    Disconect_bd($result,$conn);
    return $result_query;
  }

  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function update_air_conditioning_products($content)
{
  $conn = Conect_bd("cellar");
  $result_query = false;

  try
  {
    $conn->beginTransaction();
    $insertSql = "UPDATE cellar_air_conditioning_products SET
    `capacity` = :capacity,
    `idAirConditioningTypes` = :idAirConditioningTypes
    WHERE `idCellarGeneralInfoProduct` = :idCellarGeneralInfoProduct;";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':capacity',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':idAirConditioningTypes',$content[1],PDO::PARAM_INT);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[2],PDO::PARAM_INT);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      $result_query = true;
    }
    else
    {
      $result_query = false;
    }

    $conn->commit();

    Disconect_bd($result,$conn);
    return $result_query;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}

function update_cellar_pumps_products($content)
{
  $conn = Conect_bd("cellar");
  $result_query = false;

  try
  {
    $conn->beginTransaction();
    $insertSql = "UPDATE cellar_pumps_products SET
    `voltage` = :voltage,
    `hp` = :hp,
    `amps` = :amps,
    `capacity` = :capacity,
    `idPumpType` = :idPumpType
    WHERE `idCellarGeneralInfoProduct` = :idCellarGeneralInfoProduct;";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':voltage',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':hp',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':amps',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':capacity',$content[3],PDO::PARAM_STR);
    $sql->bindParam(':idPumpType',$content[4],PDO::PARAM_INT);
    $sql->bindParam(':idCellarGeneralInfoProduct',$content[5],PDO::PARAM_INT);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      $result_query = true;
    }
    else
    {
      $result_query = false;
    }

    $conn->commit();

    Disconect_bd($result,$conn);
    return $result_query;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}
