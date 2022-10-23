<?php
function search_state_user($token_user, $email_user, $id_user)
{
  $conn = Conect_bd("superuser");
  $id_state_user;

  try
  {
    $query = "SELECT `idStateSuperuser` FROM superuser_users WHERE superUserToken = '".$token_user."' AND SuperuserEmail = '".$email_user."' AND idSuperuser = '".$id_user."';";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      $id_state_user = $item["idStateSuperuser"];
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
