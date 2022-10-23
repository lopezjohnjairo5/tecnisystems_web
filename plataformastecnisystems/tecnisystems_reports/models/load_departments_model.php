<?php
	include "./core/conection.php";

  function search_all_deparments()
	{
    $conn = Conect_bd("location");
    $array_dep = array();

    try
		{
      $query = "SELECT `Department`,`tokenDepartment` FROM departments ;";
      $result = $conn->query($query);

      foreach ($result as $item)
			{
        array_push($array_dep,
          [$item["Department"],
          $item["tokenDepartment"]]);
      }

      Disconect_bd($result,$conn);
      return $array_dep;
    }
		catch (Exception $e)
		{
      return false;
    }
  }
