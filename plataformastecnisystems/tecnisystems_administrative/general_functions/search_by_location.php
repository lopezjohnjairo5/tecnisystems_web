<?php

function search_id_dept_by_tk($token_dep)
{
  $conn = Conect_bd("location");
  $id_department;

  try
  {
    $query = "SELECT `idDepartment` FROM departments WHERE tokenDepartment = '".$token_dep."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_department = $item["idDepartment"];
    }

    Disconect_bd($result,$conn);
    return $id_department;


  }
  catch (Exception $e)
  {
    return false;
  }

}

function search_id_city_by_tk($token_city)
{
  $conn = Conect_bd("location");
  $id_city;

  try
  {
    $query = "SELECT `idCity` FROM cities WHERE token = '".$token_city."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_city = $item["idCity"];
    }

    Disconect_bd($result,$conn);
    return $id_city;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_id_department_by_name($name)
{
  $conn = Conect_bd("location");
  $array_result = array();

  try
  {
    $query = "SELECT idDepartment FROM departments WHERE Department LIKE '%".$name."%';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_result,["idDepartment" => $item["idDepartment"]]);
    }

    Disconect_bd($result,$conn);
    return $array_result;
  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_id_city_by_name($name)
{
  $conn = Conect_bd("location");
  $array_result = array();

  try
  {
    $query = "SELECT idCity FROM cities WHERE City LIKE '%".$name."%';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_result,["idCity" => $item["idCity"]]);
    }

    Disconect_bd($result,$conn);
    return $array_result;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_ids_city_and_department_by_name($name)
{
  $conn = Conect_bd("location");
  $array_result = array();

  try
  {
    $query = "SELECT c.idCity, d.idDepartment FROM cities c, departments d WHERE c.idDepartment = d.idDepartment AND c.City LIKE '%".$name."%' OR c.idDepartment = d.idDepartment AND d.Department LIKE '%".$name."%';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_result,[
        "idCity" => $item["idCity"],
        "idDepartment" => $item["idDepartment"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_result;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_city_and_department_by_id($idCity,$idDepartment)
{
  $conn = Conect_bd("location");
  $array_result = array();

  try
  {
    $query = " SELECT DISTINCTROW c.City, d.Department FROM cities c, departments d WHERE c.idCity = ".$idCity." AND c.idDepartment = ".$idDepartment." AND c.idDepartment = d.idDepartment;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_result,[
        "City" => $item["City"],
        "Department" => $item["Department"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_result;

  }
  catch (Exception $e)
  {
    echo "error: ".$e ;
    return false;
  }
}

function search_tk_dept_by_id($id_dep)
{
  $conn = Conect_bd("location");
  $tk_department;

  try
  {
    $query = "SELECT `tokenDepartment` FROM departments WHERE idDepartment = '".$id_dep."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $tk_department = $item["tokenDepartment"];
    }

    Disconect_bd($result,$conn);
    return $tk_department;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_tk_city_by_id($id_city)
{
  $conn = Conect_bd("location");
  $tk_city;

  try
  {
    $query = "SELECT `token` FROM cities WHERE idCity = '".$id_city."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $tk_city = $item["token"];
    }

    Disconect_bd($result,$conn);
    return $tk_city;

  }
  catch (Exception $e)
  {
    return false;
  }
}
