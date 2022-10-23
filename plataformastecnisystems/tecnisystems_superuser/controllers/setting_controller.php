<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."setting_model.php";
  include GENERALFUNC."delete_special_chars.php";
  include GENERALFUNC."send_mail_user.php";

  session_start();

  $sett_email = htmlspecialchars( delete_special_chars($_POST["setting_email"]));
  $sett_pass = htmlspecialchars( delete_special_chars($_POST["setting_pass"]));
  $sett_new_pass = htmlspecialchars( delete_special_chars($_POST["setting_new_pass"]));
  $sett_conf_passs = htmlspecialchars( delete_special_chars($_POST["setting_conf_new_pass"]));

  $valid_sett_email = filter_var($sett_email,FILTER_SANITIZE_EMAIL);
  $valid_sett_pass = filter_var($sett_pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $valid_sett_new_pass = filter_var($sett_new_pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $valid_sett_conf_pass = filter_var($sett_conf_passs, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

	if (isset($valid_sett_email) && isset($valid_sett_pass) && !empty($valid_sett_new_pass) && !empty($valid_sett_conf_pass))
  {
    if ($valid_sett_new_pass == $valid_sett_conf_pass && strlen($valid_sett_new_pass) >= 8)
    {
      $encripted_new_pass = password_hash($valid_sett_new_pass, PASSWORD_DEFAULT);
      $user_exist_in_bd = search_user($valid_sett_email,$valid_sett_pass);

      if ($user_exist_in_bd)
      {
        $result_update = update_pass_superuser($valid_sett_email,$encripted_new_pass,$_SESSION["superUser"][0]);
        if ($result_update == true)
        {
          echo "Contraseña actualizada correctamente.";
          $message = "<p>Se ha realizado el cambio de la contraseña para el usuario: ".$valid_sett_email." en la plataforma superusuario.</p><br><span>Si usted no solicito este cambio por favor comuniquese con nosotros.</span>";
          $subject = "Actualizaciòn contraseña";
          send_mail_info_user($valid_sett_email,$message,$subject);
        }
        else
        {
          echo "Problema al actualizar. \nVerifique los valores e intente nuevamente.\nSi el problema persiste contacte con el administrador";
        }
      }
      else
      {
        echo "Email o password actual incorrectos. Verifique e intente nuevamente.";
      }
    }
    else
    {
      echo "el password nuevo y su confirmación son diferentes ó la longitud de la nueva contraseña es inferior a 8 caracteres alfanumericos (debe incluir: mayúsculas, minúsculas, numeros enteros y algún caracter especial como: _, # ó $). Verifique e intente nuevamente.";
    }
  }
  else
  {
    echo "Todos los campos son obligatorios. Verifique e intente nuevamente.";
  }
