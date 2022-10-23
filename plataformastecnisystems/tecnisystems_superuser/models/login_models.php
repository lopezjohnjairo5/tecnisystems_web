<?php
	include CORE."conection.php";

	function search_super_user($email)
	{
		$conn = Conect_bd();
		$n_array = array();

		try
		{
			$query = "SELECT idSuperuser, Superuser, SuperuserDocument, SuperuserEmail, SuperuserPass, superUserToken, idStateSuperuser FROM superuser_users WHERE SuperuserEmail = '".$email."' AND  idStateSuperuser = 1 ;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($n_array,
					$item["idSuperuser"],
					$item["Superuser"],
					$item["SuperuserDocument"],
					$item["SuperuserEmail"],
					$item["SuperuserPass"],
					$item["superUserToken"],
					$item["idStateSuperuser"]);
			}

			Disconect_bd($result,$conn);
			return $n_array;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
