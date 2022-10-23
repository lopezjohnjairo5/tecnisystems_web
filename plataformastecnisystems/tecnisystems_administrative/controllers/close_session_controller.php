<?php
	include "../config/generals.php";
	include "../config/paths.php";
	include GENERALFUNC."end_session.php";
	end_session();
	header('Location: '.PATH_WEB);
	die();
