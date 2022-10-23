<?php

function search_state_user($token_user, $email_user, $id_user, $id_role)
{
  $conn = Conect_bd("reports");
  $id_state_user;

  try
  {
    $query = "SELECT `idStateUser` FROM technical_users WHERE userToken = '".$token_user."' AND Email = '".$email_user."' AND idTechnicalUser = '".$id_user."' AND idRole = ".$id_role.";";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_state_user = $item["idStateUser"];
    }

    Disconect_bd($result,$conn);

    if ($id_state_user == 1)
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
