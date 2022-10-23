<?php

function search_state_user($token_user, $email_user, $id_user)
{
  $conn = Conect_bd("administrative");
  $id_state_user;

  try
  {
    $query = "SELECT `idAdministrativeStateUsers` FROM administrative_users WHERE AdministrativeToken = '".$token_user."' AND AdministrativeEmail = '".$email_user."' AND idAdministrativeUser = '".$id_user."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_state_user = $item["idAdministrativeStateUsers"];
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
