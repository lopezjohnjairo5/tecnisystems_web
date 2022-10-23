<?php

  function create_serial_report($type)
  {
    switch ($type)
    {
      case 1:
        $pref = "TRE";
        break;

      case 2:
        $pref = "TRA";
        break;

      case 3:
        $pref = "TRM";
        break;
    }

    $id_new_report = search_last_report_id($type)+1;

    if ($id_new_report != false)
    {
      while (strlen(strval($id_new_report)) < 6)
      {
        $id_new_report = "0".$id_new_report;
      }
      $current_date = date('ymdHs');
      $serial_report = $pref.$current_date.$id_new_report;
      return $serial_report;
    }
  }
