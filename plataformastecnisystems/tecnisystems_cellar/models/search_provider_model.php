<?php
include CORE."conection.php";

function search_all_providers()
{
  $conn = Conect_bd("cellar");
  $array_ids = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `tokenSupplier`,`Supplier`, `officeAddress`, `idDepartment`, `idCity`, `Email`, `phone1`, `phone2` FROM suppliers ORDER BY `idSupplier` ASC;";
    $sql = $conn->prepare($search_sql);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_ids,[
        "tokenSupplier" => $item["tokenSupplier"],
        "Supplier" => $item["Supplier"],
        "officeAddress" => $item["officeAddress"],
        "idDepartment" => $item["idDepartment"],
        "idCity" => $item["idCity"],
        "Email" => $item["Email"],
        "phone1" => $item["phone1"],
        "phone2" => $item["phone2"]
      ]);
    }
    Disconect_bd($result,$conn);
    return $array_ids;
  }

  catch(Exception $e)
  {
      return false;
  }
}


function search_providers_by_condition($search)
{
  $conn = Conect_bd("cellar");
  $array_ids = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `tokenSupplier`,`Supplier`, `officeAddress`, `idDepartment`, `idCity`, `Email`, `phone1`, `phone2` FROM suppliers WHERE `Supplier` =  :search OR `Email` = :search OR `phone1` = :search OR `phone2` = :search ORDER BY `idSupplier` ASC;";
    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':search',$search,PDO::PARAM_STR);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($array_ids,[
        "tokenSupplier" => $item["tokenSupplier"],
        "Supplier" => $item["Supplier"],
        "officeAddress" => $item["officeAddress"],
        "idDepartment" => $item["idDepartment"],
        "idCity" => $item["idCity"],
        "Email" => $item["Email"],
        "phone1" => $item["phone1"],
        "phone2" => $item["phone2"]
      ]);
    }
    Disconect_bd($result,$conn);
    return $array_ids;
  }

  catch(Exception $e)
  {
      return false;
  }
}


function search_providers_by_city_department($arrayIDs)
{
  $conn = Conect_bd("cellar");
  $arrayP = array();

  try
  {
    $conn->beginTransaction();
    $search_sql = "SELECT `Supplier`, `officeAddress`, `idDepartment`, `idCity`, `Email`, `phone1`, `phone2` FROM suppliers WHERE `idDepartment` =  :idDepartment OR `idCity` = :idCity ORDER BY `idSupplier` ASC;";
    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':idDepartment',$arrayIDs[0],PDO::PARAM_INT);
    $sql->bindParam(':idCity',$arrayIDs[1],PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayP,[
        "Supplier" => $item["Supplier"],
        "officeAddress" => $item["officeAddress"],
        "idDepartment" => $item["idDepartment"],
        "idCity" => $item["idCity"],
        "Email" => $item["Email"],
        "phone1" => $item["phone1"],
        "phone2" => $item["phone2"]
      ]);
    }
    Disconect_bd($result,$conn);
    return $arrayP;
  }
  catch(Exception $e)
  {
      return false;
  }
}



function search_city_by_id($id_city){
  $conn = Conect_bd("location");
  $City = "";

  try{
    $conn->beginTransaction();
    $search_sql = "SELECT `City` FROM cities WHERE `idCity` = :idCity;";
    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':idCity',$id_city,PDO::PARAM_INT);

    $sql->execute();

    foreach ($sql as $item) {
        $City = $item["City"];
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $City;
  }

  catch(Exception $e){
      return false;
  }
}


function  search_department_by_id($id_dept){
  $conn = Conect_bd("location");
  $Department = "";

  try{
    $conn->beginTransaction();
    $search_sql = "SELECT `Department` FROM departments WHERE `idDepartment` = :idDepartment;";
    $sql = $conn->prepare($search_sql);
    $sql->bindParam(':idDepartment',$id_dept,PDO::PARAM_INT);

    $sql->execute();

    foreach ($sql as $item) {
        $Department = $item["Department"];
    }
    $conn->commit();
    Disconect_bd($result,$conn);
    return $Department;
  }

  catch(Exception $e){
      return false;
  }
}


function  search_id_by_department($department){
  $conn = Conect_bd("location");
  $idDepartment = "";

  try{
    $conn->beginTransaction();
    $search_sql = "SELECT `idDepartment` FROM departments WHERE `Department` LIKE ?;";
    $sql = $conn->prepare($search_sql);
    $sql->bindValue(1,"%{$department}%",PDO::PARAM_STR);

    $sql->execute();

    foreach ($sql as $item) {
        $idDepartment = $item["idDepartment"];
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $idDepartment;
  }

  catch(Exception $e){
      return false;
  }
}


function  search_id_by_city($city){
  $conn = Conect_bd("location");
  $idCity = "";

  try{
    $conn->beginTransaction();
    $search_sql = "SELECT `idCity` FROM cities WHERE `City` LIKE ?;";
    $sql = $conn->prepare($search_sql);
    $sql->bindValue(1,"%{$city}%",PDO::PARAM_STR);
    $sql->execute();

    foreach ($sql as $item) {
        $idCity = $item["idCity"];
    }

    $conn->commit();
    Disconect_bd($result,$conn);
    return $idCity;
  }

  catch(Exception $e){
      return false;
  }
}
