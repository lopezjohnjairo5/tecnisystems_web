<?php
	include "../config/paths.php";
	include "../config/generals.php";
	include MODELS."login_models.php";
	include GENERALFUNC."delete_special_chars.php";
	include GENERALFUNC."end_session.php";

	$user_mail = htmlspecialchars( delete_special_chars($_POST['email']) );
	$user_pass = htmlspecialchars( delete_special_chars($_POST['password']) );

	$valid_mail = filter_var($user_mail,FILTER_SANITIZE_EMAIL);
	$valid_pass = filter_var($user_pass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

	if (isset($valid_mail) && isset($valid_pass) && !empty($valid_mail) && !empty($valid_pass))
	{
		$result_search_user = search_administrative_user($valid_mail);
		if ($result_search_user != false)
		{
			if (password_verify($valid_pass, $result_search_user[3]) && $result_search_user[6] == 1)
			{
				session_start();
				$_SESSION["administrative_user"] = [$result_search_user[0],$result_search_user[1],$result_search_user[2],$result_search_user[4],$result_search_user[5]];

				header('Location: '.PATH_WEB);
				die();
			}
			else
			{
				print_r("datos incorrectos");
				session_start();
				session_destroy();
				header('Location: '.PATH_WEB."?error=access_denied");
				die();
			}

		}
		else
		{
			print_r("usuario no encontrado");
  		end_session();
			header('Location: '.PATH_WEB."?error=access_denied");
			die();
		}
	}
	else
	{
		echo "Se requiere un correo y un password validos, para continuar. Por favor, verifique e intente nuevamente.";
	}
