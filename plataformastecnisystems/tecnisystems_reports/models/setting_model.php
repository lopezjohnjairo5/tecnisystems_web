<?php
  include CORE."conection.php";

  function search_user($valid_sett_email,$valid_sett_pass)
  {
    $conn = Conect_bd();
    $n_array = array();

    try
    {
      $query = "SELECT `Passw` FROM technical_users WHERE Email = '".$valid_sett_email."' ;";

      $result = $conn->query($query);
      foreach ($result as $item)
      {
        if(password_verify($valid_sett_pass, $item['Passw']))
        {
          Disconect_bd($result,$conn);
          return true;
        }
        else
        {
          return false;
        }
      }

    }
    catch (Exception $e)
    {
      return false;
    }
  }


  function update_pass_technical_user($email_user,$new_pass_user,$user_token)
  {
    $conn = Conect_bd();
    $query = "UPDATE technical_users SET `Passw`= :new_pass_user WHERE `Email` = :email_user AND `userToken` = :user_token";
    $sql = $conn->prepare($query);
    $sql->bindParam(':new_pass_user',$new_pass_user,PDO::PARAM_STR, 25);
    $sql->bindParam(':email_user',$email_user,PDO::PARAM_STR, 25);
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
