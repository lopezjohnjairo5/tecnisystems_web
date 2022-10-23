<?php
  include CORE."conection.php";

  function search_technicals_user($typeUser)
  {
    $conn = Conect_bd("reports");
    $info_technicals = array();
    try
    {
      $query = "SELECT tu.documentTechnicalUser,tu.TechnicalUser,tu.Email,tu.userToken,rt.Role,su.StateUser FROM technical_users tu, role_technical rt, state_users su WHERE tu.idRole = rt.idRole AND tu.idStateUser = su.idStateUser AND tu.idRole = :typeUser;";

      $sql = $conn->prepare($query);
      $sql->bindParam(':typeUser',$typeUser,PDO::PARAM_INT);

      $sql->execute();

      foreach ($sql as $item)
      {
        array_push($info_technicals,[
          "documentTechnicalUser" => !empty($item["documentTechnicalUser"]) ? $item["documentTechnicalUser"] : "N/A",
          "TechnicalUser" => !empty($item["TechnicalUser"]) ? $item["TechnicalUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["userToken"]) ? $item["userToken"] : "N/A",
          "StateUser" => !empty($item["StateUser"]) ? $item["StateUser"] : "N/A",
          "rol" => !empty($item["Role"]) ? $item["Role"] : "N/A"
        ]);
      }

      Disconect_bd($result,$conn);
      return $info_technicals;

    }
    catch (Exception $e)
    {
      return false;
    }

  }

  function search_technicals_user_by_name_or_email($element)
  {
    $conn = Conect_bd("reports");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT tu.documentTechnicalUser,tu.TechnicalUser,tu.Email,tu.userToken,rt.Role,su.StateUser FROM technical_users tu, role_technical rt, state_users su WHERE tu.idRole = rt.idRole AND tu.idStateUser = su.idStateUser AND tu.TechnicalUser  LIKE '%".$element."%' OR tu.idRole = rt.idRole AND tu.idStateUser = su.idStateUser AND tu.Email  LIKE '%".$element."%';";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["documentTechnicalUser"]) ? $item["documentTechnicalUser"] : "N/A",
          "TechnicalUser" => !empty($item["TechnicalUser"]) ? $item["TechnicalUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["userToken"]) ? $item["userToken"] : "N/A",
          "StateUser" => !empty($item["StateUser"]) ? $item["StateUser"] : "N/A",
          "rol" => !empty($item["Role"]) ? $item["Role"] : "N/A"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_technicals_user_by_nit($nit)
  {
    $conn = Conect_bd("reports");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT tu.documentTechnicalUser,tu.TechnicalUser,tu.Email,tu.userToken,rt.Role,su.StateUser FROM technical_users tu, role_technical rt, state_users su WHERE tu.idRole = rt.idRole AND tu.idStateUser = su.idStateUser AND tu.documentTechnicalUser  =".$nit.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["documentTechnicalUser"]) ? $item["documentTechnicalUser"] : "N/A",
          "TechnicalUser" => !empty($item["TechnicalUser"]) ? $item["TechnicalUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["userToken"]) ? $item["userToken"] : "N/A",
          "StateUser" => !empty($item["StateUser"]) ? $item["StateUser"] : "N/A",
          "rol" => !empty($item["Role"]) ? $item["Role"] : "N/A"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_administrative_user()
  {
    $conn = Conect_bd("administrative");
    $info_technicals = array();

    try
    {
      $query = "SELECT au.AdministrativeDocument,au.AdministrativeUser,au.AdministrativeEmail,au.AdministrativeToken,asu.AdministrativeStateUsers FROM administrative_users au,administrative_state_users asu WHERE au.idAdministrativeStateUsers = asu.idAdministrativeStateUsers ";
      $sql = $conn->prepare($query);
      $sql->execute();

      foreach ($sql as $item)
      {
        array_push($info_technicals,[
          "documentTechnicalUser" => !empty($item["AdministrativeDocument"]) ? $item["AdministrativeDocument"] : "N/A",
          "TechnicalUser" => !empty($item["AdministrativeUser"]) ? $item["AdministrativeUser"] : "N/A",
          "Email" => !empty($item["AdministrativeEmail"]) ? $item["AdministrativeEmail"] : "N/A",
          "userToken" => !empty($item["AdministrativeToken"]) ? $item["AdministrativeToken"] : "N/A",
          "StateUser" => !empty($item["AdministrativeStateUsers"]) ? $item["AdministrativeStateUsers"] : "N/A",
          "rol" => "Administrativo"
        ]);
      }

      Disconect_bd($result,$conn);
      return $info_technicals;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_administrative_user_by_name_or_email($element)
  {
    $conn = Conect_bd("administrative");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT au.AdministrativeDocument,au.AdministrativeUser,au.AdministrativeEmail,au.AdministrativeToken,asu.AdministrativeStateUsers FROM administrative_users au,administrative_state_users asu WHERE  au.idAdministrativeStateUsers = asu.idAdministrativeStateUsers AND au.AdministrativeUser  LIKE '%".$element."%' OR  au.idAdministrativeStateUsers = asu.idAdministrativeStateUsers AND au.AdministrativeEmail  LIKE '%".$element."%';";

      $result = $conn->query($query);
      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["AdministrativeDocument"]) ? $item["AdministrativeDocument"] : "N/A",
          "TechnicalUser" => !empty($item["AdministrativeUser"]) ? $item["AdministrativeUser"] : "N/A",
          "Email" => !empty($item["AdministrativeEmail"]) ? $item["AdministrativeEmail"] : "N/A",
          "userToken" => !empty($item["AdministrativeToken"]) ? $item["AdministrativeToken"] : "N/A",
          "StateUser" => !empty($item["AdministrativeStateUsers"]) ? $item["AdministrativeStateUsers"] : "N/A",
          "rol" => "Administrativo"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_administrative_user_by_nit($nit)
  {
    $conn = Conect_bd("administrative");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT au.AdministrativeDocument,au.AdministrativeUser,au.AdministrativeEmail,au.AdministrativeToken,asu.AdministrativeStateUsers FROM administrative_users au,administrative_state_users asu WHERE au.idAdministrativeStateUsers = asu.idAdministrativeStateUsers AND au.AdministrativeDocument  =".$nit.";";

      $result = $conn->query($query);
      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["AdministrativeDocument"]) ? $item["AdministrativeDocument"] : "N/A",
          "TechnicalUser" => !empty($item["AdministrativeUser"]) ? $item["AdministrativeUser"] : "N/A",
          "Email" => !empty($item["AdministrativeEmail"]) ? $item["AdministrativeEmail"] : "N/A",
          "userToken" => !empty($item["AdministrativeToken"]) ? $item["AdministrativeToken"] : "N/A",
          "StateUser" => !empty($item["AdministrativeStateUsers"]) ? $item["AdministrativeStateUsers"] : "N/A",
          "rol" => "Administrativo"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_cellar_user()
  {
    $conn = Conect_bd("cellar");
    $info_technicals = array();
    try
    {
      $query = "SELECT cu.documentCellarUser, cu.CellarUser, cu.Email, cu.UserToken, scu.StateCellarUser FROM cellar_users cu,state_cellar_users scu WHERE cu.idStateCellarUser = scu.idStateCellarUser";
      $sql = $conn->prepare($query);
      $sql->execute();

      foreach ($sql as $item)
      {
        array_push($info_technicals,[
          "documentTechnicalUser" => !empty($item["documentCellarUser"]) ? $item["documentCellarUser"] : "N/A",
          "TechnicalUser" => !empty($item["CellarUser"]) ? $item["CellarUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["UserToken"]) ? $item["UserToken"] : "N/A",
          "StateUser" => !empty($item["StateCellarUser"]) ? $item["StateCellarUser"] : "N/A",
          "rol" => "Bodega"
        ]);
      }

      Disconect_bd($result,$conn);
      return $info_technicals;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_cellar_user_by_name_or_email($element)
  {
    $conn = Conect_bd("cellar");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT cu.documentCellarUser, cu.CellarUser, cu.Email, cu.UserToken, scu.StateCellarUser FROM cellar_users cu,state_cellar_users scu WHERE  cu.idStateCellarUser = scu.idStateCellarUser AND cu.CellarUser  LIKE '%".$element."%' OR  cu.idStateCellarUser = scu.idStateCellarUser AND cu.Email  LIKE '%".$element."%';";
      $result = $conn->query($query);
      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["documentCellarUser"]) ? $item["documentCellarUser"] : "N/A",
          "TechnicalUser" => !empty($item["CellarUser"]) ? $item["CellarUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["UserToken"]) ? $item["UserToken"] : "N/A",
          "StateUser" => !empty($item["StateCellarUser"]) ? $item["StateCellarUser"] : "N/A",
          "rol" => "Bodega"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }

  function search_cellar_user_by_nit($nit)
  {
    $conn = Conect_bd("cellar");
    $n_array = array();
    $role = "";

    try
    {
      $query = "SELECT cu.documentCellarUser, cu.CellarUser, cu.Email, cu.UserToken, scu.StateCellarUser
      FROM cellar_users cu,state_cellar_users scu
      WHERE cu.idStateCellarUser = scu.idStateCellarUser
      AND cu.documentCellarUser  =".$nit.";";
      $result = $conn->query($query);

      foreach ($result as $item)
      {
        array_push($n_array,[
          "documentTechnicalUser" => !empty($item["documentCellarUser"]) ? $item["documentCellarUser"] : "N/A",
          "TechnicalUser" => !empty($item["CellarUser"]) ? $item["CellarUser"] : "N/A",
          "Email" => !empty($item["Email"]) ? $item["Email"] : "N/A",
          "userToken" => !empty($item["UserToken"]) ? $item["UserToken"] : "N/A",
          "StateUser" => !empty($item["StateCellarUser"]) ? $item["StateCellarUser"] : "N/A",
          "rol" => "Bodega"
        ]);
      }

      Disconect_bd($result,$conn);
      return $n_array;

    }
    catch (Exception $e)
    {
      return false;
    }
  }
