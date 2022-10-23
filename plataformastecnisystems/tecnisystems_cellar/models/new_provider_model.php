<?php
include CORE."conection.php";

function search_ids_department_and_city_by_token($token)
{
  $conn = Conect_bd("location");
  $array_ids = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `idDepartment`, `idCity` FROM cities WHERE `token` = :token";
    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':token',$token,PDO::PARAM_STR);

    $sql->execute();

    foreach ($sql as $item) {
      array_push($array_ids,[
        "idDepartment" => $item["idDepartment"],
        "idCity" => $item["idCity"]
      ]);
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $array_ids;
  }
  catch(Exception $e)
  {
      return false;
  }
}

function insert_new_provider($content)
{
  $conn = Conect_bd("cellar");

  try
  {
    $conn->beginTransaction();
    $insertSql = "INSERT INTO `suppliers` (`tokenSupplier`,`Supplier`, `officeAddress`, `idDepartment`, `idCity`, `Email`, `phone1`, `phone2`) VALUES (:tokenSupplier, :Supplier, :officeAddress, :idDepartment, :idCity, :Email, :phone1, :phone2)";

    $sql = $conn->prepare($insertSql);

    $sql->bindParam(':tokenSupplier',$content[0],PDO::PARAM_STR);
    $sql->bindParam(':Supplier',$content[1],PDO::PARAM_STR);
    $sql->bindParam(':officeAddress',$content[2],PDO::PARAM_STR);
    $sql->bindParam(':idDepartment',$content[3],PDO::PARAM_INT);
    $sql->bindParam(':idCity',$content[4],PDO::PARAM_INT);
    $sql->bindParam(':Email',$content[5],PDO::PARAM_STR);
    $sql->bindParam(':phone1',$content[6],PDO::PARAM_STR);
    $sql->bindParam(':phone2',$content[7],PDO::PARAM_STR);

    $sql->execute();

    $conn->commit();
    Disconect_bd($result,$conn);
    return true;
  }
  catch(Exception $e)
  {
      echo $e->getMessage();
      $conn->rollBack();
      return false;
  }
}
