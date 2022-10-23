<?php

function search_id_technical_by_nit($nit_technical,$rol,$email)
{
    $conn = Conect_bd("reports");
    $id_technical = "";

    try
    {
      $query = "SELECT idTechnicalUser FROM technical_users WHERE Email = '".$email."' AND documentTechnicalUser = ".$nit_technical." AND idRole = ".$rol.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        $id_technical = $item['idTechnicalUser'];
      }

      Disconect_bd($results,$conn);
      return $id_technical;
    }
    catch (Exception $e)
    {
      return false;
    }
  }
