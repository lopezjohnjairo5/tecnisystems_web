<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."record_user_model.php";

  session_start();
  $array_record_user = search_record_user($_SESSION["superUser"][4],4);

  if($array_record_user)
  {
    echo json_encode($array_record_user);
  }
