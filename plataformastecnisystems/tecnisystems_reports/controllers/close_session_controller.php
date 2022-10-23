<?php
	include "../config/paths.php";
	include "../config/generals.php";
	include GENERALFUNC."end_session.php";
	end_session();
	header('Location: '.PATH_WEB);
	die();
