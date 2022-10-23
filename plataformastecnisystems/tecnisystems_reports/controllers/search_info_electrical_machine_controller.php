<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."search_info_electrical_machine_model.php";
  include GENERALFUNC."delete_special_chars.php";

  session_start();
  $serial = delete_special_chars($_POST["data"][0]["serial"]);
  $result = search_info_electrical_machine_by_serial($serial);

  echo json_encode($result);
