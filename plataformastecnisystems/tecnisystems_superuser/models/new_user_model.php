<?php
  include CORE."conection.php";

  function search_technical_users_by_email_and_nit($nit,$email)
  {
    $conn = Conect_bd("reports");
    $id_technical = 0;

    try
    {
      $query = "SELECT idTechnicalUser FROM technical_users WHERE documentTechnicalUser = :nit OR Email = :email;";

      $sql = $conn->prepare($query);
      $sql->bindParam(':nit',$nit,PDO::PARAM_INT);
      $sql->bindParam(':email',$email,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $id_technical = $item["idTechnicalUser"];
      }

      Disconect_bd($result,$conn);
      if($id_technical > 0 || $id_technical != 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_administrative_users_by_email_and_nit($nit,$email)
  {
    $conn = Conect_bd("administrative");
    $id_administrative = 0;
    try
    {
      $query = "SELECT idAdministrativeUser FROM administrative_users WHERE AdministrativeDocument = :nit OR AdministrativeEmail = :email;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':nit',$nit,PDO::PARAM_INT);
      $sql->bindParam(':email',$email,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $id_administrative = $item["idAdministrativeUser"];
      }

      Disconect_bd($result,$conn);
      if($id_administrative > 0 || $id_administrative != 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_cellar_users_by_email_and_nit($nit,$email)
  {
    $conn = Conect_bd("cellar");
    $id_cellar = 0;
    try
    {
      $query = "SELECT idCellarUser FROM cellar_users WHERE documentCellarUser = :nit OR Email = :email;";
      $sql = $conn->prepare($query);
      $sql->bindParam(':nit',$nit,PDO::PARAM_INT);
      $sql->bindParam(':email',$email,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $id_cellar = $item["idCellarUser"];
      }

      Disconect_bd($result,$conn);
      if ($id_cellar > 0 || $id_cellar != 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    catch (Exception $e)
    {
      return false;
    }
  }


  function insert_technical_user($role,$array_info)
  {
    $conn = Conect_bd("reports");
    $id_technical = 0;
    try
    {
      $query = "INSERT INTO technical_users (documentTechnicalUser,TechnicalUser,Email,Passw,userToken,path_technical_firm,idRole,idStateUser) VALUES (:documentTechnicalUser,:TechnicalUser,:Email,:Passw,:userToken,:path_technical_firm,:idRole,:idStateUser);";
      $sql = $conn->prepare($query);
      $sql->bindParam(':documentTechnicalUser',$array_info[0],PDO::PARAM_INT);
      $sql->bindParam(':TechnicalUser',$array_info[1],PDO::PARAM_STR);
      $sql->bindParam(':Email',$array_info[2],PDO::PARAM_STR);
      $sql->bindParam(':Passw',$array_info[3],PDO::PARAM_STR);
      $sql->bindParam(':userToken',$array_info[4],PDO::PARAM_STR);
      $sql->bindParam(':path_technical_firm',$array_info[5],PDO::PARAM_STR);
      $sql->bindParam(':idRole',$role,PDO::PARAM_INT);
      $sql->bindParam(':idStateUser',$array_info[6],PDO::PARAM_INT);

      $sql->execute();
      Disconect_bd($result,$conn);
      return true;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function insert_administrative_user($array_info)
  {
    $conn = Conect_bd("administrative");
    $id_administrative = 0;
    try
    {
      $query = "INSERT INTO administrative_users
      (AdministrativeDocument,AdministrativeUser,AdministrativeEmail,AdministrativePass,AdministrativeToken,idAdministrativeStateUsers)
      VALUES (:AdministrativeDocument,:AdministrativeUser,:AdministrativeEmail,:AdministrativePass,:AdministrativeToken,:idAdministrativeStateUsers);";

      $sql = $conn->prepare($query);

      $sql->bindParam(":AdministrativeDocument",$array_info[0],PDO::PARAM_INT);
      $sql->bindParam(":AdministrativeUser",$array_info[1],PDO::PARAM_STR);
      $sql->bindParam(":AdministrativeEmail",$array_info[2],PDO::PARAM_STR);
      $sql->bindParam(":AdministrativePass",$array_info[3],PDO::PARAM_STR);
      $sql->bindParam(":AdministrativeToken",$array_info[4],PDO::PARAM_STR);
      $sql->bindParam(":idAdministrativeStateUsers",$array_info[5],PDO::PARAM_INT);

      $sql->execute();
      Disconect_bd($result,$conn);
      return true;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function insert_cellar_user($array_info)
  {
    $conn = Conect_bd("cellar");
    $id_cellar = 0;

    try
    {
      $query = "INSERT INTO cellar_users
      (documentCellarUser,CellarUser,Email,Password,UserToken,idStateCellarUser)
      VALUES (:documentCellarUser,:CellarUser,:Email,:Password,:UserToken,:idStateCellarUser);";

      $sql = $conn->prepare($query);
      $sql->bindParam(':documentCellarUser',$array_info[0],PDO::PARAM_INT);
      $sql->bindParam(':CellarUser',$array_info[1],PDO::PARAM_STR);
      $sql->bindParam(':Email',$array_info[2],PDO::PARAM_STR);
      $sql->bindParam(':Password',$array_info[3],PDO::PARAM_STR);
      $sql->bindParam(':UserToken',$array_info[4],PDO::PARAM_STR);
      $sql->bindParam(':idStateCellarUser',$array_info[5],PDO::PARAM_INT);

      $sql->execute();

      Disconect_bd($result,$conn);
      return true;

    }
    catch (Exception $e)
    {
      return false;
    }
  }


  function update_technical_user($info_update_array)
  {
    $conn = Conect_bd("reports");

    try
    {
      $query = "UPDATE technical_users
      SET
      `documentTechnicalUser`= :documentTechnicalUser,
      `TechnicalUser`= :TechnicalUser,
      `Email`= :Email,
      `userToken`= :userToken,
      `path_technical_firm`= :path_technical_firm,
      `idRole`= :idRole,
      `idStateUser`= :idStateUser
      WHERE `userToken` = :userToken";

      $sql = $conn->prepare($query);

      $sql->bindParam(":userToken",$info_update_array[0],PDO::PARAM_STR);
      $sql->bindParam(":documentTechnicalUser",$info_update_array[1],PDO::PARAM_INT);
      $sql->bindParam(":TechnicalUser",$info_update_array[2],PDO::PARAM_STR);
      $sql->bindParam(":Email",$info_update_array[3],PDO::PARAM_STR);
      $sql->bindParam(":path_technical_firm",$info_update_array[4],PDO::PARAM_STR);
      $sql->bindParam(":idRole",$info_update_array[5],PDO::PARAM_INT);
      $sql->bindParam(":idStateUser",$info_update_array[6],PDO::PARAM_INT);

      $sql->execute();
      if ($sql->rowCount() > 0)
      {
        Disconect_bd($result,$conn);
        return true;
      }
      else
      {
        return false;
      }

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function update_administrative_user($info_update_array)
  {
    $conn = Conect_bd("administrative");

    try
    {
      $query = "UPDATE administrative_users
      SET
      `AdministrativeDocument`= :AdministrativeDocument,
      `AdministrativeUser`= :AdministrativeUser,
      `AdministrativeEmail`= :AdministrativeEmail,
      `AdministrativeToken`= :AdministrativeToken,
      `idAdministrativeStateUsers`= :idAdministrativeStateUsers
      WHERE `AdministrativeToken` = :AdministrativeToken";

      $sql = $conn->prepare($query);

      $sql->bindParam(":AdministrativeToken",$info_update_array[0],PDO::PARAM_STR);
      $sql->bindParam(":AdministrativeDocument",$info_update_array[1],PDO::PARAM_INT);
      $sql->bindParam(":AdministrativeUser",$info_update_array[2],PDO::PARAM_STR);
      $sql->bindParam(":AdministrativeEmail",$info_update_array[3],PDO::PARAM_STR);
      $sql->bindParam(":idAdministrativeStateUsers",$info_update_array[4],PDO::PARAM_INT);

      $sql->execute();
      if ($sql->rowCount() > 0)
      {
        Disconect_bd($result,$conn);
        return true;
      }
      else
      {
        return false;
      }
    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function update_cellar_user($info_update_array)
  {
    $conn = Conect_bd("cellar");
    try
    {
      $query = "UPDATE cellar_users
      SET
      `documentCellarUser`= :documentCellarUser,
      `CellarUser`= :CellarUser,
      `Email`= :Email,
      `UserToken`= :UserToken,
      `idStateCellarUser`= :idStateCellarUser
      WHERE `UserToken` = :UserToken";

      $sql = $conn->prepare($query);

      $sql->bindParam(":UserToken",$info_update_array[0],PDO::PARAM_STR);
      $sql->bindParam(":documentCellarUser",$info_update_array[1],PDO::PARAM_INT);
      $sql->bindParam(":CellarUser",$info_update_array[2],PDO::PARAM_STR);
      $sql->bindParam(":Email",$info_update_array[3],PDO::PARAM_STR);
      $sql->bindParam(":idStateCellarUser",$info_update_array[4],PDO::PARAM_INT);

      $sql->execute();
      if ($sql->rowCount() > 0)
      {
        Disconect_bd($result,$conn);
        return true;
      }
      else
      {
        return false;
      }
    }
    catch (Exception $e)
    {
      return false;
    }
  }
