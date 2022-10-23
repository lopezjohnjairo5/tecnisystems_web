<?php
include CORE."conection.php";

function search_electrical_id_product_by_id_general($idProduct)
{
  $conn = Conect_bd("cellar");
  $id_amount = "";

  try
  {
    $query = "SELECT `idAmountReferenceElectricProducts` FROM cellar_electric_products WHERE idCellarGeneralInfoProduct = $idProduct;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_amount = $item['idAmountReferenceElectricProducts'];
    }
    Disconect_bd($result,$conn);
    return $id_amount;
  }
  catch (Exception $e)
  {
    return false;
  }
}


function delete_product_by_id($idToDelete,$tableToDel)
{
  $conn = Conect_bd("cellar");

  try
  {
    $query = "DELETE FROM $tableToDel WHERE idCellarGeneralInfoProduct = :idToDelete;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idToDelete',$idToDelete,PDO::PARAM_INT);
    $sql->execute();

    Disconect_bd($result,$conn);
    return true;

  }
  catch (Exception $e)
  {
    return false;
  }
}


function delete_amount_product_by_id($idAmountElement)
{
  $conn = Conect_bd("cellar");

  try
  {
    $query = "DELETE FROM `amount_reference_electric_products` WHERE idAmountReferenceElectricProducts  = $idAmountElement;";
    $result = $conn->query($query);
    Disconect_bd($result,$conn);
    return true;
  }
  catch (Exception $e)
  {
    return false;
  }
}


function delete_general_info_product_by_id($idProduct)
{
  $conn = Conect_bd("cellar");

  try
  {
    $query = "DELETE FROM `cellar_general_info_products` WHERE idCellarGeneralInfoProduct = $idProduct;";
    $result = $conn->query($query);

    Disconect_bd($result,$conn);
    return true;

  }
  catch (Exception $e)
  {
    return false;
  }
}
