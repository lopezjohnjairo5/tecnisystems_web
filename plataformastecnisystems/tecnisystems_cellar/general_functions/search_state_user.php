<?php

function search_state_user($token_user, $email_user, $id_user)
{
  $conn = Conect_bd("cellar");
  $id_state_user;

  try
  {
    $query = "SELECT `idStateCellarUser` FROM cellar_users WHERE UserToken = '".$token_user."' AND Email = '".$email_user."' AND idCellarUser = '".$id_user."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_state_user = $item["idStateCellarUser"];
    }

    Disconect_bd($result,$conn);

    if($id_state_user == 1)
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
