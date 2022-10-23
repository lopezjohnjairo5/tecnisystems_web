<?php
  include CORE."conection.php";

  function search_id_technical_users_by_token_rol($role,$token)
  {
    $conn = Conect_bd("reports");
    $id_technical = "";

    try
    {
      $query = "SELECT idTechnicalUser FROM technical_users WHERE userToken = :token AND idRole = :role;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':token',$token,PDO::PARAM_STR);
      $sql->bindParam(':role',$role,PDO::PARAM_INT);

      $sql->execute();

      foreach ($sql as $item)
      {
        $id_technical = $item["idTechnicalUser"];
      }

      Disconect_bd($result,$conn);
      return $id_technical;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_id_administrative_users_by_token_rol($token)
  {
    $conn = Conect_bd("administrative");
    $id_administrative = "";
    try
    {
      $query = "SELECT idAdministrativeUser FROM administrative_users WHERE AdministrativeToken = :token ;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':token',$token,PDO::PARAM_STR);
      $sql->execute();

      foreach ($sql as $item)
      {
        $id_administrative = $item["idAdministrativeUser"];
      }

      Disconect_bd($result,$conn);
      return $id_administrative;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_id_cellar_users_by_token_rol($token)
  {
    $conn = Conect_bd("cellar");
    $id_cellar = "";
    try
    {
      $query = "SELECT idCellarUser FROM cellar_users WHERE UserToken = :token ;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':token',$token,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $id_cellar = $item["idCellarUser"];
      }

      Disconect_bd($result,$conn);
      return $id_cellar;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_record_users_by_id($id,$type)
  {
    $conn = Conect_bd("records");
    $array_info_technical = array();

    try
    {
      $query = "SELECT r.Record,r.dateRecord,r.timeRecord,lr.Latitude,lr.longitude FROM records r,location_records lr WHERE r.idLocationRecord = lr.idLocationRecord AND r.idUser = :id AND idTypeUser = :type ORDER BY r.dateRecord DESC ,r.timeRecord DESC;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':id',$id,PDO::PARAM_INT);
      $sql->bindParam(':type',$type,PDO::PARAM_INT);

      $sql->execute();

      foreach ($sql as $item)
      {
        array_push($array_info_technical, [
          "Record" => !empty($item["Record"]) ? $item["Record"] : "N/A",
          "dateRecord" => !empty($item["dateRecord"]) ? $item["dateRecord"] : "N/A",
          "timeRecord" => !empty($item["timeRecord"]) ? $item["timeRecord"] : "N/A",
          "Latitude" => !empty($item["Latitude"]) ? $item["Latitude"] : "N/A",
          "longitude" => !empty($item["longitude"]) ? $item["longitude"] : "N/A"
        ]);
      }

      Disconect_bd($result,$conn);
      return $array_info_technical;

    }
    catch (Exception $e)
    {
      return false;
    }
  }
