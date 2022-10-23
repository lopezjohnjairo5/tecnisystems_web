<?php
	include CORE."conection.php";

  function search_id_department_by_token($token_department)
	{
		$conn = Conect_bd("location");
    $id_department = 0;

		try
		{
			$query = "SELECT `idDepartment` FROM departments WHERE `tokenDepartment` = '".$token_department."';";
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


	function search_cities_by_id($id_department)
	{
		$conn = Conect_bd("location");
    $n_array = array();

		try
		{
			$query = "SELECT `City`,`Token` FROM cities WHERE `idDepartment` = ".$id_department.";";
			$result = $conn->query($query);

      foreach ($result as $item)
			{
				array_push($n_array,
          [$item["City"],
          $item["Token"]]);
			}

			Disconect_bd($result,$conn);
			return $n_array;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
