<?php

	function delete_special_chars($str)
	{
		$array = array("'","\"","<",">"," ","(",")","|","!","°","%","=","+","-","*","\\","\'","{","}","[","]",";",":","\,");
		$result = str_replace($array, '', $str);
		return $result;
	}

	function delete_special_chars_with_points($str)
	{
		$array = array("'","\"","<",">","(",")","|","!","°","%","=","+","*","\\","\'","{","}","[","]",";","\,");
		$result = str_replace($array, '', $str);
		return $result;
	}
