<?php
include CORE."conection.php";

function delete_provider_by_token($tokenProv)
{
  $conn = Conect_bd("cellar");
  try
  {
    $query = "DELETE FROM `suppliers` WHERE tokenSupplier = :tokenProv;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':tokenProv',$tokenProv,PDO::PARAM_STR, 25);
    $sql->execute();

    Disconect_bd($result,$conn);
    return true;

  }
  catch (Exception $e)
  {
    return false;
  }
}
