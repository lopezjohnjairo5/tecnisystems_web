<?php
  include CORE."conection.php";

  function update_state_technical_user($role,$state_user,$user_token)
  {
    $conn = Conect_bd("reports");
    $query = "UPDATE technical_users SET `idStateUser`= :state_user WHERE `userToken` = :user_token AND `idRole` = :role";
    $sql = $conn->prepare($query);

    $sql->bindParam(':state_user',$state_user,PDO::PARAM_INT);
    $sql->bindParam(':user_token',$user_token,PDO::PARAM_STR,25);
    $sql->bindParam(':role',$role,PDO::PARAM_INT);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      Disconect_bd($result,$conn);
      return true;
    }
    else
    {
      return false;
    }
  }

  function update_state_administrative_user($state_user,$user_token)
  {
    $conn = Conect_bd("administrative");
    $query = "UPDATE administrative_users SET `idAdministrativeStateUsers`= :state_user WHERE `AdministrativeToken` = :user_token ;";
    $sql = $conn->prepare($query);

    $sql->bindParam(':state_user',$state_user,PDO::PARAM_INT);
    $sql->bindParam(':user_token',$user_token,PDO::PARAM_STR,25);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      Disconect_bd($result,$conn);
      return true;
    }
    else
    {
      return false;
    }
  }

  function update_state_cellar_user($state_user,$user_token)
  {
    $conn = Conect_bd("cellar");
    $query = "UPDATE cellar_users SET `idStateCellarUser`= :state_user WHERE `UserToken` = :user_token ;";
    $sql = $conn->prepare($query);

    $sql->bindParam(':state_user',$state_user,PDO::PARAM_INT);
    $sql->bindParam(':user_token',$user_token,PDO::PARAM_STR,25);

    $sql->execute();

    if($sql->rowCount() > 0)
    {
      Disconect_bd($result,$conn);
      return true;
    }
    else
    {
      return false;
    }
  }
