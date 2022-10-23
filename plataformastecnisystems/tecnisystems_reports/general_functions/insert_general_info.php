<?php

function insert_general_information($array_elements)
{
  $id_prpa = "";
  $conn = Conect_bd("reports");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `general_information` (`date_general`,`startTime`,`endTime`,`department`,`city`,`address`,`idClient`,`qrPath`,`idTypeMaintenance`,`observations`) VALUES (:date_general, :startTime, :endTime, :department, :city, :address, :idClient, :qrPath, :idTypeMaintenance, :observations)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':date_general',$array_elements[0],PDO::PARAM_STR);
    $sql->bindParam(':startTime',$array_elements[1],PDO::PARAM_STR);
    $sql->bindParam(':endTime',$array_elements[2],PDO::PARAM_STR);
    $sql->bindParam(':department',$array_elements[3],PDO::PARAM_INT);
    $sql->bindParam(':city',$array_elements[4],PDO::PARAM_INT);
    $sql->bindParam(':address',$array_elements[5],PDO::PARAM_STR);
    $sql->bindParam(':idClient',$array_elements[6],PDO::PARAM_INT);
    $sql->bindParam(':qrPath',$array_elements[7],PDO::PARAM_STR);
    $sql->bindParam(':idTypeMaintenance',$array_elements[8],PDO::PARAM_INT);
    $sql->bindParam(':observations',$array_elements[9],PDO::PARAM_STR);

    $sql->execute();

    $id_prpa = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id_prpa;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}
