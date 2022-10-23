<?php
	function Conect_bd($db_name = 'cellar')
	{
		$user = 'root';
		$passw = '';
		/*
		switch ($db_name) {
			case 'administrative':
				$user = 'plataf99_admin';
				$passw = 'Tecn15y57em5Adm1n_';
				break;

			case 'cellar':
				$user = 'plataf99_cellar';
				$passw = 'tecn15y57em5Ce11ar*';
				break;

			case 'reports':
				$user = 'plataf99_reports';
				$passw = 'T*cn15y57*m5_R*por75';
				break;

			case 'superuser':
				$user = 'plataf99_super';
				$passw = 'tecn15y57em5_$uper+';
				break;
			
			default:
				$user = 'plataf99_john';
				$passw = 'Qboz_130$Mil';
				break;
		}*/
		$db = 'mysql:dbname=plataf99_tecnisystems_'.$db_name.';host=localhost';
		
		try
		{
			$conn = new PDO($db,$user,$passw);
			return $conn;
		}
		catch(PDOException $e)
		{
			echo "coneccion fallida: ".$e->getMessage();
		}
	}

	function Disconect_bd($queryR,$Con)
	{
		$queryR = null;
		$Con = null;
	}
