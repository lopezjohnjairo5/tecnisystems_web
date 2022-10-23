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


function search_tk_city_and_dept_by_id($id_city, $id_dept)
{
  $conn = Conect_bd("location");
  $array_tks = array();

  try
  {
    $query = "SELECT c.`token`,c.`City`, d.`tokenDepartment`, d.`Department` FROM cities c, departments d WHERE c.idCity = ".$id_city." AND d.idDepartment = ".$id_dept." AND c.idDepartment = d.idDepartment;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($array_tks,[
        "tokenCity" => $item["token"],
        "city" => $item["City"],
        "tokenDept" => $item["tokenDepartment"],
        "dept" => $item["Department"]
      ]);
    }

    Disconect_bd($result,$conn);
    return $array_tks;

  }
  catch (Exception $e)
  {
    return false;
  }
}

function search_names_city_and_department_by_ids($idCity,$idDepartment)
{
  $conn = Conect_bd("location");
  $names_city_dep = array();

  try
  {
    $query = "SELECT c.City, d.Department FROM cities c, departments d WHERE c.idCity = ".$idCity." AND c.idDepartment = ".$idDepartment." AND c.idDepartment = d.idDepartment;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($names_city_dep,
      [$item["City"],
      $item["Department"]]);
    }

    Disconect_bd($result,$conn);
    return $names_city_dep;

  }
  catch (Exception $e)
  {
    return false;
  }
}
