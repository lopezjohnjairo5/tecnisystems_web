<?php
	include CORE."conection.php";

	function search_administrative_user($email)
	{
		$conn = Conect_bd();
		$n_array = array();

		try
		{
			$query = "SELECT au.`idAdministrativeUser`,au.`AdministrativeDocument`,au.`AdministrativeUser`,au.`AdministrativeEmail`,au.`AdministrativePass`,au.`AdministrativeToken`,au.`idAdministrativeStateUsers`,asu.`AdministrativeStateUsers` FROM administrative_users au, administrative_state_users asu WHERE au.AdministrativeEmail = '".$email."' AND asu.idAdministrativeStateUsers = au.idAdministrativeStateUsers ;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				array_push($n_array,
					$item['AdministrativeToken'],
					$item['AdministrativeUser'],
					$item['AdministrativeEmail'],
					$item['AdministrativePass'],
					"Administrativo",
					$item['idAdministrativeUser'],
					$item['idAdministrativeStateUsers']);
			}

			Disconect_bd($result,$conn);
			return $n_array;

		}
		catch (Exception $e)
		{
			return false;
		}
	}
