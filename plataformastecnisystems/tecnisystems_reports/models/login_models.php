<?php
	include CORE."conection.php";

	function search_technical_user($email)
	{
		$conn = Conect_bd();
		$n_array = array();

		try
		{
			$query = "SELECT t.`idTechnicalUser`,t.`idStateUser`,t.`documentTechnicalUser`,t.`TechnicalUser`,t.`Email`,t.`Passw`,t.`userToken`,r.`Role` FROM technical_users t, role_technical r WHERE t.Email = '".$email."' AND t.idRole = r.idRole ;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($n_array,
					$item['userToken'],
					$item['TechnicalUser'],
					$item['Email'],
					$item['Passw'],
					$item['Role'],
					$item['idTechnicalUser'],
					$item['idStateUser']);
			}
			Disconect_bd($result,$conn);
			return $n_array;
		}
		catch (Exception $e)
		{
			return false;
		}
	}
