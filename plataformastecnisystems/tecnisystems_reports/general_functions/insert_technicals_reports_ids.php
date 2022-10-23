<?php

function insert_technicals_reports($array_elements)
{
  $id_TR = "";
  $conn = Conect_bd("reports");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `technicals_reports` (`idTechnicalUser1`, `idTechnicalUser2`, `idTechnicalUser3`) VALUES (:idTechnicalUser1, :idTechnicalUser2, :idTechnicalUser3)";
    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':idTechnicalUser1',$array_elements[0],PDO::PARAM_INT);
    $sql->bindParam(':idTechnicalUser2',$array_elements[1],PDO::PARAM_INT);
    $sql->bindParam(':idTechnicalUser3',$array_elements[2],PDO::PARAM_INT);

    $sql->execute();

    $id_TR = $conn->lastInsertId();
    $conn->commit();

    Disconect_bd($result,$conn);
    return $id_TR;
  }

  catch(Exception $e)
  {
    echo $e->getMessage();
    $conn->rollBack();
    return false;
  }
}
