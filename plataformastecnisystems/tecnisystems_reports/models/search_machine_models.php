<?php
  include CORE."conection.php";

  function search_machine_by_serial($tp_technical,$serial)
  {
    $conn = Conect_bd("cellar");
    $n_array = array();

    try
    {
      $query = "SELECT `idCellarGeneralInfoProduct`, `serialProduct`,`Product`,`Brand`,`pathDatasheet` FROM `cellar_general_info_products` WHERE `serialProduct`= '".$serial."' AND `idTypeProduct` = ".$tp_technical.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        array_push($n_array,[
          "idCellarGeneralInfoProduct" => $item['idCellarGeneralInfoProduct'],
					"serialProduct" => $item['serialProduct'],
					"Product" => $item['Product'],
					"Brand" => $item['Brand'],
					"pathDatasheet" => $item['pathDatasheet']]);
      }
      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
  }

  function search_all_machines($tp_technical)
  {
    $conn = Conect_bd("cellar");
    $n_array = array();

    try
    {
			$query = "SELECT `idCellarGeneralInfoProduct`, `serialProduct`, `Product`, `Brand`, `pathDatasheet` FROM `cellar_general_info_products` WHERE `idTypeProduct` = ".$tp_technical.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
				array_push($n_array,[
					"idCellarGeneralInfoProduct" => $item['idCellarGeneralInfoProduct'],
					"serialProduct" => $item['serialProduct'],
					"Product" => $item['Product'],
					"Brand" => $item['Brand'],
					"pathDatasheet" => $item['pathDatasheet']]);
			}
      Disconect_bd($result,$conn);
			return $n_array;

    }
    catch (Exception $e)
    {
      echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
  }
