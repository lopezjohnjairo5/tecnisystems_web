<?php

function insert_new_general_customer_information ($content)
{
  $conn = Conect_bd("clients");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `general_customer_information` (`idDepartment`, `idCity`,`Address`) VALUES (:idDepartment, :idCity, :Address)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':idDepartment',$content[0],PDO::PARAM_INT);
    $sql->bindParam(':idCity',$content[1],PDO::PARAM_INT);
    $sql->bindParam(':Address',$content[2],PDO::PARAM_STR);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;

  }
  catch(Exception $e)
  {
    //echo $e->getMessage();
    $conn->rollBack();
    return false;
  }
}

function insert_new_clients_costumers_info ($content)
{
  $conn = Conect_bd("clients");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `clients_costumers_info` (`idClientInfo`, `idGeneralCostumerInfo`) VALUES ( :idClientInfo, :idGeneralCostumerInfo)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':idClientInfo',$content[0],PDO::PARAM_INT);
    $sql->bindParam(':idGeneralCostumerInfo',$content[1],PDO::PARAM_INT);

    $sql->execute();

    $id = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id;

  }
  catch(Exception $e)
  {
    $conn->rollBack();
    return false;
  }
}

function insert_new_client_machine ($content)
{
  $conn = Conect_bd("clients");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `client_machine` (`idClient`, `idTypeMachine`) VALUES ( :idClient, :idTypeMachine)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':idClient',$content[0],PDO::PARAM_INT);
    $sql->bindParam(':idTypeMachine',$content[1],PDO::PARAM_INT);

    $sql->execute();
    $conn->commit();
    Disconect_bd($result,$conn);

    return true;

  }
  catch(Exception $e)
  {
    $conn->rollBack();
    return false;
  }
}
