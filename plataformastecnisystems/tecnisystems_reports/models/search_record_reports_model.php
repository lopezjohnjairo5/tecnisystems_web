<?php
	include CORE."conection.php";

  function search_electrical_reports($id_user)
	{
    $conn = Conect_bd("reports");
    $array_electrical_rep = array();

    try
		{
      $query = "SELECT er.serialNumberER, gi.startTime, gi.endTime, gi.date_general, gi.department, gi.city, gi.idClient, gi.address, gi.observations
      FROM electrical_reports er, technicals_reports tr, general_information gi
      WHERE tr.idTechnicalUser1 = ".$id_user." AND
      tr.idTechnicalsReports = er.idTechnicalsReportsER AND
      er.idGeneralInformationER = gi.idGeneralInformation ORDER BY er.serialNumberER DESC LIMIT 20;"; // gi.date_general DESC, gi.startTime DESC

      $result = $conn->query($query);

      foreach ($result as $item)
			{
        array_push($array_electrical_rep,
          [$item["serialNumberER"],
          $item["startTime"],
          $item["endTime"],
          $item["date_general"],
          $item["department"],
          $item["city"],
          $item["idClient"],
          $item["address"],
          $item["observations"]]);
      }

      Disconect_bd($result,$conn);
      return $array_electrical_rep;

    }
		catch (Exception $e)
		{
      return false;
    }
  }


  function search_pump_reports($id_user)
	{
    $conn = Conect_bd("reports");
    $array_pump_rep = array();

    try
		{
      $query = "SELECT pr.serialNumberReportPR, gi.startTime, gi.endTime, gi.date_general, gi.department, gi.city, gi.idClient, gi.address, gi.observations
      FROM pump_report pr, technicals_reports tr, general_information gi
      WHERE tr.idTechnicalUser1 = ".$id_user." AND
      tr.idTechnicalsReports = pr.idTechnicalsReportsPR AND
      pr.idGeneralInformationPR = gi.idGeneralInformation ORDER BY gi.date_general DESC, gi.startTime DESC LIMIT 20;";

      $result = $conn->query($query);

      foreach ($result as $item)
			{
        array_push($array_pump_rep,
          [$item["serialNumberReportPR"],
          $item["startTime"],
          $item["endTime"],
          $item["date_general"],
          $item["department"],
          $item["city"],
          $item["idClient"],
          $item["address"],
          $item["observations"]]);
      }

      Disconect_bd($result,$conn);
      return $array_pump_rep;

    }
		catch (Exception $e)
		{
      return false;
    }
  }


  function search_air_reports($id_user)
	{
    $conn = Conect_bd("reports");
    $array_air_rep = array();

    try
		{
      $query = "SELECT ar.serialNumberReport, gi.startTime, gi.endTime, gi.date_general, gi.department, gi.city, gi.idClient, gi.address, gi.observations
      FROM air_report ar, technicals_reports tr, general_information gi
      WHERE tr.idTechnicalUser1 = ".$id_user." AND
      tr.idTechnicalsReports = ar.idTechnicalsReports AND
      ar.idGeneralInformation = gi.idGeneralInformation ORDER BY gi.date_general DESC, gi.startTime DESC LIMIT 20;";

      $result = $conn->query($query);

      foreach ($result as $item)
			{
        array_push($array_air_rep,
          [$item["serialNumberReport"],
          $item["startTime"],
          $item["endTime"],
          $item["date_general"],
          $item["department"],
          $item["city"],
          $item["idClient"],
          $item["address"],
          $item["observations"]]);
      }

      Disconect_bd($result,$conn);
      return $array_air_rep;

    }
		catch (Exception $e)
		{
      return false;
    }
  }
