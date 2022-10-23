<?php
	include CORE."conection.php";

	function search_cellar_user($email)
	{
		$conn = Conect_bd();
		$n_array = array();

		try
		{
			$query = "SELECT `idCellarUser`,`documentCellarUser`,`CellarUser`,`Email`,`Password`,`UserToken`,`idStateCellarUser` FROM cellar_users WHERE Email = '".$email."';";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($n_array,
					$item['idCellarUser'],
					$item['documentCellarUser'],
					$item['CellarUser'],
					$item['Email'],
					$item['Password'],
					$item['UserToken'],
					$item['idStateCellarUser']);
			}

			Disconect_bd($result,$conn);
			return $n_array;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
