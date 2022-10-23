<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."new_user_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."delete_special_chars.php";
include GENERALFUNC."create_temp_pass.php";
include GENERALFUNC."send_mail_user.php";
include GENERALFUNC."end_session.php";

session_start();

if (search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
{
  $tokenUser = $_POST["data"][0]["tokenUser"];
  $action = $_POST["data"][0]["action"];
  $TypeUser = $_POST["data"][0]["TypeUser"];
  $nitTechnical = $_POST["data"][0]["nitTechnical"];
  $nameTechnical = $_POST["data"][0]["nameTechnical"];
  $emailTechnical = $_POST["data"][0]["emailTechnical"];
  $typeTechnical = $_POST["data"][0]["rolTechnical"];
  $accessPath = "http://localhost/plataformas_tecnisystems/";
  $pathTemp = "./imgs/";
  $stateU = 1;

  if ($action == 1)
  {
    $validate_content_elements_to_technicals = !empty($action) && !empty($TypeUser) && !empty($nitTechnical) && !empty($nameTechnical) && !empty($emailTechnical) && !empty($typeTechnical) && $TypeUser != 0 && $typeTechnical != 0;
    $validate_content_elements_to_admins_and_cellar = !empty($action) && !empty($TypeUser) && !empty($nitTechnical) && !empty($nameTechnical) && !empty($emailTechnical) && $TypeUser != 0;
    $technical_user_exist = search_technical_users_by_email_and_nit($nitTechnical,$emailTechnical);
    $administrative_user_exist = search_administrative_users_by_email_and_nit($nitTechnical,$emailTechnical);
    $cellar_user_exist = search_cellar_users_by_email_and_nit($nitTechnical,$emailTechnical);

    if (!$technical_user_exist && !$administrative_user_exist && !$cellar_user_exist)
    {
      $tokenUser = password_hash($nitTechnical.$nameTechnical, PASSWORD_DEFAULT);
      $tempPass = temp_pass();

      if ($TypeUser == 1)
      {
        if ($validate_content_elements_to_technicals)
        {
          $array_info_user = [
            $nitTechnical,
            $nameTechnical,
            $emailTechnical,
            $tempPass[0]["pass_hash"],
            $tokenUser,
            $pathTemp,
            $stateU
          ];

          $result_insert = insert_technical_user($typeTechnical,$array_info_user);

          if ($result_insert)
          {
            $msn = "";
            $msn .= "<h2>Datos de acceso al sistema:</h2>";
            $msn .= "<br><b>Correo:</b>".$emailTechnical;
            $msn .= "<br><br><b>contrasenna temporal:</b>".$tempPass[0]['pass_clear'];
            $msn .= "<br><br><b>Tipo de acceso:</b> Reportes";
            $msn .= "<br><br><b>Enlace de acceso:</b>".$accessPath;
            $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Nuevo usuario agregado al sistema.");

            if ($sendMailResult)
            {
              echo "correct";
            }
          }
          else
          {
            echo "error";
          }

        }
        else
        {
          echo "content_error";
        }
      }
      else if ($TypeUser == 2)
      {
        if ($validate_content_elements_to_admins_and_cellar)
        {
          $array_info_user = [
            $nitTechnical,
            $nameTechnical,
            $emailTechnical,
            $tempPass[0]["pass_hash"],
            $tokenUser,
            $stateU
          ];

          $result_insert = insert_administrative_user($array_info_user);

          if ($result_insert)
          {
            $msn = "";
            $msn .= "<h2>Datos de acceso al sistema:</h2>";
            $msn .= "<br><b>Correo:</b>".$emailTechnical;
            $msn .= "<br><br><b>contrasenna temporal:</b>".$tempPass[0]['pass_clear'];
            $msn .= "<br><br><b>Tipo de acceso:</b> Administrativo";
            $msn .= "<br><br><b>Enlace de acceso:</b>".$accessPath;
            $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Nuevo usuario agregado al sistema.");
            if ($sendMailResult)
            {
              echo "correct";
            }
          }
          else
          {
            echo "error";
          }
        }
        else
        {
          echo "content_error";
        }
      }
      else if ($TypeUser == 3)
      {
        if ($validate_content_elements_to_admins_and_cellar)
        {
          $array_info_user = [
            $nitTechnical,
            $nameTechnical,
            $emailTechnical,
            $tempPass[0]["pass_hash"],
            $tokenUser,
            $stateU
          ];

          $result_insert = insert_cellar_user($array_info_user);

          if ($result_insert)
          {
            $msn = "";
            $msn .= "<h2>Datos de acceso al sistema:</h2>";
            $msn .= "<br><b>Correo:</b>".$emailTechnical;
            $msn .= "<br><br><b>contrasenna temporal:</b>".$tempPass[0]['pass_clear'];
            $msn .= "<br><br><b>Tipo de acceso:</b> Bodega";
            $msn .= "<br><br><b>Enlace de acceso:</b>".$accessPath;
            $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Nuevo usuario agregado al sistema.");

            if ($sendMailResult)
            {
              echo "correct";
            }
          }
          else
          {
            echo "error";
          }
        }
        else
        {
          echo "content_error";
        }
      }
      else
      {
        echo "content_error";
      }
    }
    else
    {
      echo "exist";
    }

  }
  else if ($action == 2)
  {
    $validate_content_elements_to_technicals = !empty($tokenUser) && !empty($action) && !empty($TypeUser) && !empty($nitTechnical) && !empty($nameTechnical) && !empty($emailTechnical) && !empty($typeTechnical) && $TypeUser != 0 && $typeTechnical != 0;
    $validate_content_elements_to_admins_and_cellar = !empty($tokenUser) && !empty($action) && !empty($TypeUser) && !empty($nitTechnical) && !empty($nameTechnical) && !empty($emailTechnical) && $TypeUser != 0;

    if ($TypeUser == 1)
    {
      if ($validate_content_elements_to_technicals)
      {
        $array_info_user = [
          $tokenUser,
          $nitTechnical,
          $nameTechnical,
          $emailTechnical,
          $pathTemp,
          $typeTechnical,
          $stateU
        ];

        $result_update = update_technical_user($array_info_user);

        if ($result_update)
        {
          $msn = "";
          $msn .= "<h2>Datos de usuario modificados.</h2>";
          $msn .= "<h4>Nuevos datos de usuario.</h4>";
          $msn .= "<br><b>Documento:</b>".$nitTechnical;
          $msn .= "<br><b>Usuario:</b>".$nameTechnical;
          $msn .= "<br><b>Correo:</b>".$emailTechnical;
          $msn .= "<br><br><b>Tipo de acceso:</b> Reportes";

          $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Datos de usuario modificados.");
          if ($sendMailResult)
          {
            echo "correct_update";
          }
        }
        else
        {
          echo "update_error";
        }
      }
    }
    else if ($TypeUser == 2)
    {
      if ($validate_content_elements_to_admins_and_cellar)
      {
          $array_info_user = [
            $tokenUser,
            $nitTechnical,
            $nameTechnical,
            $emailTechnical,
            $stateU
          ];

          $result_update = update_administrative_user($array_info_user);

          if ($result_update)
          {
            $msn = "";
            $msn .= "<h2>Datos de usuario modificados.</h2>";
            $msn .= "<h4>Nuevos datos de usuario.</h4>";
            $msn .= "<br><b>Documento:</b>".$nitTechnical;
            $msn .= "<br><b>Usuario:</b>".$nameTechnical;
            $msn .= "<br><b>Correo:</b>".$emailTechnical;
            $msn .= "<br><br><b>Tipo de acceso:</b> Administrativo";
            $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Datos de usuario modificados.");

            if ($sendMailResult)
            {
              echo "correct_update";
            }
          }
          else
          {
            echo "update_error";
          }
        }
    }
    else if ($TypeUser == 3)
    {
      if ($validate_content_elements_to_admins_and_cellar)
      {
        $array_info_user = [
          $tokenUser,
          $nitTechnical,
          $nameTechnical,
          $emailTechnical,
          $stateU
        ];

        $result_update = update_cellar_user($array_info_user);

        if ($result_update)
        {
          $msn = "";
          $msn .= "<h2>Datos de usuario modificados.</h2>";
          $msn .= "<h4>Nuevos datos de usuario.</h4>";
          $msn .= "<br><b>Documento:</b>".$nitTechnical;
          $msn .= "<br><b>Usuario:</b>".$nameTechnical;
          $msn .= "<br><b>Correo:</b>".$emailTechnical;
          $msn .= "<br><br><b>Tipo de acceso:</b> Administrativo";
          $sendMailResult = send_mail_info_user($emailTechnical,$msn,"Tecnisystems: Datos de usuario modificados.");

          if ($sendMailResult)
          {
            echo "correct_update";
          }
        }
        else
        {
          echo "update_error";
        }
      }
    }
  }
}
else
{
  echo "No hay una session activa. Redirigiendo";
	end_session();
  header('Location: '.PATH_WEB."?error=access_denied");
  die();
}
