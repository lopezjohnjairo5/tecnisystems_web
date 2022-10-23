<?php

include CORE."conection.php";

function update_state_clients($token,$state)
{
  $conn = Conect_bd("clients");
  try
  {
    $query = "UPDATE clients_info
    SET
    `idStateClient`= :state
    WHERE `tokenClient` = :token";

    $sql = $conn->prepare($query);

    $sql->bindParam(":token",$token,PDO::PARAM_STR);
    $sql->bindParam(":state",$state,PDO::PARAM_INT);

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
