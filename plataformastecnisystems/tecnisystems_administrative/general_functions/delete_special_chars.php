<?php

	function delete_special_chars($str)
	{
		$array = array("'","\"","<",">"," ","(",")","|","!","°","%","=","+","-","*","\\","\'","{","}","[","]",";",":","\,");
		$result = str_replace($array, '', $str);
		return $result;
	}
