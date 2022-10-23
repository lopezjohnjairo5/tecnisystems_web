<?php
	include CORE."conection.php";

	function search_amount_reference_electric_products($serial_electric_product)
	{
		$conn = Conect_bd("cellar");
		$id_amount = "";

		try
		{
			$query = "SELECT cep.`idAmountReferenceElectricProducts`,cgi.`idCellarGeneralInfoProduct`, cep.`idCellarGeneralInfoProduct` FROM cellar_electric_products cep, cellar_general_info_products cgi WHERE cgi.`serialProduct` = '".$serial_electric_product."' AND cgi.`idCellarGeneralInfoProduct` = cep.`idCellarGeneralInfoProduct`;";
			$result = $conn->query($query);

			foreach ($result as $item)
			{
				$id_amount = $item['idAmountReferenceElectricProducts'];
			}

			Disconect_bd($result,$conn);
			return $id_amount;

		}
		catch (Exception $e)
		{
			return false;
		}
	}

	function update_amount_reference_electric_products($id_amount,$content)
	{
		$conn = Conect_bd("cellar");

		try
		{
			$query = "UPDATE amount_reference_electric_products SET `oilAmount`= :f_oil_amount, `oilReference` = :f_oil_reference, `fuelAmount` = :f_fuel_amount, `fuelReference` = :f_fuel_reference, `airAmount` = :f_air_amount,
			`airReference` = :f_air_reference, `separatorAmount` = :f_separator_amount, `separatorReference` = :f_separator_reference, `refrigerantAmount` = :t_cooling_amount, `refrigerantReference` = :t_cooling_reference, `engineOilAmount` = :t_oil_engine_amount, `engineOilReference` = :t_oil_engine_reference, `otherAmount` = :t_others_amount, `otherReference` = :t_others_reference WHERE `idAmountReferenceElectricProducts` = ".$id_amount.";";
			$sql = $conn->prepare($query);

			$sql->bindParam(':f_oil_amount',$content[0][0],PDO::PARAM_STR);
			$sql->bindParam(':f_oil_reference',$content[0][1],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_amount',$content[1][0],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_reference',$content[1][1],PDO::PARAM_STR);
			$sql->bindParam(':f_air_amount',$content[2][0],PDO::PARAM_STR);
			$sql->bindParam(':f_air_reference',$content[2][1],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_amount',$content[3][0],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_reference',$content[3][1],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_amount',$content[4][0],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_reference',$content[4][1],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_amount',$content[5][0],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_reference',$content[5][1],PDO::PARAM_STR);
			$sql->bindParam(':t_others_amount',$content[6][0],PDO::PARAM_STR);
			$sql->bindParam(':t_others_reference',$content[6][1],PDO::PARAM_STR);
			$sql->execute();

			if($sql->rowCount() > 0)
			{
				return true;
				Disconect_bd($result,$conn);
			}
			else
			{
				Disconect_bd($result,$conn);
				return false;
			}
			return true;
		}
		catch (Exception $e)
		{
			return false;
		}
	}


	function insert_amount_reference_electric_products($content)
	{
		$conn = Conect_bd("cellar");

		try
		{
	    $conn->beginTransaction();
	    $insertSql = "INSERT INTO `amount_reference_electric_products` (`oilAmount`, `oilReference`, `fuelAmount`, `fuelReference`, `airAmount`, `airReference`, `separatorAmount`, `separatorReference`, `refrigerantAmount`, `refrigerantReference`, `engineOilAmount`, `engineOilReference`, `otherAmount`, `otherReference`) VALUES (:f_oil_amount, :f_oil_reference, :f_fuel_amount, :f_fuel_reference, :f_air_amount, :f_air_reference, :f_separator_amount, :f_separator_reference, :t_cooling_amount, :t_cooling_reference, :t_oil_engine_amount, :t_oil_engine_reference, :t_others_amount, :t_others_reference)";

	    $sql = $conn->prepare($insertSql);

			$sql->bindParam(':f_oil_amount',$content[0][0],PDO::PARAM_STR);
			$sql->bindParam(':f_oil_reference',$content[0][1],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_amount',$content[1][0],PDO::PARAM_STR);
			$sql->bindParam(':f_fuel_reference',$content[1][1],PDO::PARAM_STR);
			$sql->bindParam(':f_air_amount',$content[2][0],PDO::PARAM_STR);
			$sql->bindParam(':f_air_reference',$content[2][1],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_amount',$content[3][0],PDO::PARAM_STR);
			$sql->bindParam(':f_separator_reference',$content[3][1],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_amount',$content[4][0],PDO::PARAM_STR);
			$sql->bindParam(':t_cooling_reference',$content[4][1],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_amount',$content[5][0],PDO::PARAM_STR);
			$sql->bindParam(':t_oil_engine_reference',$content[5][1],PDO::PARAM_STR);
			$sql->bindParam(':t_others_amount',$content[6][0],PDO::PARAM_STR);
			$sql->bindParam(':t_others_reference',$content[6][1],PDO::PARAM_STR);

	    $sql->execute();

	    $id = $conn->lastInsertId();
	    $conn->commit();

			Disconect_bd($result,$conn);
			return $id;
		}
		catch(Exception $e)
		{
		    echo $e->getMessage();
		    $conn->rollBack();
				return false;
		}
	}
