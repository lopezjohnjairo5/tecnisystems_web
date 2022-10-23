<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."restart_user_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."delete_special_chars.php";
include GENERALFUNC."create_temp_pass.php";
include GENERALFUNC."send_mail_user.php";
include GENERALFUNC."end_session.php";

session_start();

if(search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
{
  $tokenUser = $_POST["data"][0]["token"];
  $rolUser = $_POST["data"][0]["rol"];

  if ($rolUser == 1)
  {
    $user_email = search_email_technical_user_by_token($tokenUser,$rolUser);
    if ($user_email)
    {
      $new_pass_user = temp_pass();
      $result = update_pass_technical_user($tokenUser,$new_pass_user[0]["pass_hash"],$rolUser);

      validate_and_send_email($result,$user_email,$new_pass_user[0]["pass_clear"]);

    }
    else
    {
      echo "error_not_exist";
    }
  }

  if ($rolUser == 2)
  {
    $user_email = search_email_technical_user_by_token($tokenUser,$rolUser);
    if ($user_email)
    {
      $new_pass_user = temp_pass();
      $result = update_pass_technical_user($tokenUser,$new_pass_user[0]["pass_hash"],$rolUser);
      
      validate_and_send_email($result,$user_email,$new_pass_user[0]["pass_clear"]);
      
    }
  }

  if ($rolUser == 3)
  {
    $user_email = search_email_technical_user_by_token($tokenUser,$rolUser);
    if ($user_email)
    {
      $new_pass_user = temp_pass();
      $result = update_pass_technical_user($tokenUser,$new_pass_user[0]["pass_hash"],$rolUser);
      
      validate_and_send_email($result,$user_email,$new_pass_user[0]["pass_clear"]);

    }
  }

  if ($rolUser == 4)
  {
    $user_email = search_email_administrative_user_by_token($tokenUser);
    if ($user_email)
    {
      $new_pass_user = temp_pass();
      $result = update_pass_administrative_user($tokenUser,$new_pass_user[0]["pass_hash"]);

      validate_and_send_email($result,$user_email,$new_pass_user[0]["pass_clear"]);

    }
  }

  if ($rolUser == 5)
  {
    $user_email = search_email_cellar_user_by_token($tokenUser);
    if ($user_email)
    {
      $new_pass_user = temp_pass();
      $result = update_pass_cellar_user($tokenUser,$new_pass_user[0]["pass_hash"]);
      
      validate_and_send_email($result,$user_email,$new_pass_user[0]["pass_clear"]);
      
      
    }
  }
}
else
{
	end_session();
  echo "Redirigir";
}


function create_msn($mailUser,$passUser)
{
  $msn = "<h2>Restablecimiento de contraseña.</h2>";
  $msn .= " <br><p>Recientemente se ha solicitado el Restablecimiento de los datos de acceso a la plataforma.</p>";
  $msn .= " <br><h4>Nuevos datos de acceso</h4>";
  $msn .= " <br><span><b>Email: </b> ".$mailUser."</span>";
  $msn .= " <br><span><b>Password: </b> ".$passUser."</span> <br><small>(Validez 24 horas a partir de la recepción de este mensaje)</small>";

  //echo $msn;
  return $msn;
}

function validate_and_send_email($result,$user,$nw_pass)
{
    //echo $result." : ".$user." : ".$nw_pass." ; " ;
    if ($result)
      {
        $subject = "Restablecimiento de datos de acceso a plataforma Tecnisystems.";
        $message = create_msn($user,$nw_pass);
        $send_mail_result = send_mail_info_user($user,$message,$subject);
        if ($send_mail_result)
        {
          echo "correct";
        }
        else
        {
          echo "send_mail_error";
        }
      }
      else
      {
        echo "error";
      }
}
