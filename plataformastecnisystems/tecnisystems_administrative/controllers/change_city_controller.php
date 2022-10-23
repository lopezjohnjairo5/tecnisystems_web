<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."change_city_model.php";

    $department = $_POST["data"][0]["department"];
    $id_dept = search_id_department_by_token($department);
    $values = search_cities_by_id($id_dept);

    echo json_encode($values);
