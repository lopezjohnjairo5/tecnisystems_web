<?php
  include CORE."conection.php";

  function search_email_technical_user_by_token($userToken,$idRole)
  {
    $conn = Conect_bd("reports");
    $email_technical = "";

    try
    {
      $query = "SELECT Email
      FROM technical_users
      WHERE userToken = :userToken AND
      idRole = :idRole;";

      $sql = $conn->prepare($query);
      $sql->bindParam(':userToken',$userToken,PDO::PARAM_STR);
      $sql->bindParam(':idRole',$idRole,PDO::PARAM_INT);

      $sql->execute();

      foreach ($sql as $item)
      {
        $email_technical = $item["Email"];
      }

      Disconect_bd($result,$conn);
      return $email_technical;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_email_administrative_user_by_token($userToken)
  {
    $conn = Conect_bd("administrative");
    $email_administrative = "";

    try
    {
      $query = "SELECT AdministrativeEmail
      FROM administrative_users
      WHERE AdministrativeToken = :userToken;";

      $sql = $conn->prepare($query);
      $sql->bindParam(':userToken',$userToken,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $email_administrative = $item["AdministrativeEmail"];
      }

      Disconect_bd($result,$conn);
      return $email_administrative;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_email_cellar_user_by_token($userToken)
  {
    $conn = Conect_bd("cellar");
    $email_cellar = "";

    try
    {

      $query = "SELECT Email
      FROM cellar_users
      WHERE UserToken = :userToken;";

      $sql = $conn->prepare($query);
      $sql->bindParam(':userToken',$userToken,PDO::PARAM_STR);

      $sql->execute();

      foreach ($sql as $item)
      {
        $email_cellar = $item["Email"];
      }

      Disconect_bd($result,$conn);
      return $email_cellar;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function update_pass_technical_user($userToken,$newPassUser,$idRol)
  {
    $conn = Conect_bd("reports");
    $valIdStateUser = 1;
    try
    {
      $query = "UPDATE technical_users
      SET
      `Passw`= :newPassUser,
      `idStateUser`= :idStateUser
      WHERE `userToken` = :userToken
      AND `idRole` = :idRol";

      $sql = $conn->prepare($query);

      $sql->bindParam(":newPassUser",$newPassUser,PDO::PARAM_STR);
      $sql->bindParam(":userToken",$userToken,PDO::PARAM_STR);
      $sql->bindParam(":idRol",$idRol,PDO::PARAM_INT);
      $sql->bindParam(":idStateUser",$valIdStateUser,PDO::PARAM_INT);

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

  function update_pass_administrative_user($userToken,$newPassUser)
  {
    $conn = Conect_bd("administrative");
    $valIdStateUser = 1;
    try
    {
      $query = "UPDATE administrative_users
      SET
      `AdministrativePass`= :newPassUser,
      `idAdministrativeStateUsers`= :valIdStateUser
      WHERE `AdministrativeToken` = :userToken";


      $sql = $conn->prepare($query);

      $sql->bindParam(":newPassUser",$newPassUser,PDO::PARAM_STR);
      $sql->bindParam(":userToken",$userToken,PDO::PARAM_STR);
      $sql->bindParam(":valIdStateUser",$valIdStateUser,PDO::PARAM_INT);

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

  function update_pass_cellar_user($userToken,$newPassUser)
  {
    $conn = Conect_bd("cellar");
    $valIdStateUser = 1;
    try
    {
      $query = "UPDATE cellar_users
      SET
      `Password`= :newPassUser,
      `idStateCellarUser`= :valIdStateUser
      WHERE `userToken` = :userToken";

      $sql = $conn->prepare($query);

      $sql->bindParam(":newPassUser",$newPassUser,PDO::PARAM_STR);
      $sql->bindParam(":userToken",$userToken,PDO::PARAM_STR);
      $sql->bindParam(":valIdStateUser",$valIdStateUser,PDO::PARAM_INT);

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
