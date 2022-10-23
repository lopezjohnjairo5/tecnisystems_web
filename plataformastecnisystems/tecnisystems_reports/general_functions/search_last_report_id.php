<?php
  function search_last_report_id($type)
  {
    $conn = Conect_bd("reports");
    $id_last_report = "";

    try
    {
      switch ($type)
      {
        case 1:
          $query = "SELECT MAX(idElectricalReport) AS id FROM electrical_reports;";
          break;

        case 2:
          $query = "SELECT MAX(idAirReport) AS id FROM air_report;";
          break;

        case 3:
          $query = "SELECT MAX(idPumpReport) AS id FROM pump_report;";
          break;
      }

      $result = $conn->query($query);
      foreach ($result as $item)
      {
        $id_last_report = !is_null($item['id']) ? $item['id'] : 0;
      }

      Disconect_bd($results,$conn);
      return $id_last_report;
    }
    catch (Exception $e)
    {
      return false;
    }
  }
