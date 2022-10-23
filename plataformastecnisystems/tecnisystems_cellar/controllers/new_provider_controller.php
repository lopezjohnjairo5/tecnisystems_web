<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."new_provider_model.php";
  include GENERALFUNC."delete_special_chars.php";

  session_start();

  $supplier_provider = htmlspecialchars(delete_special_chars($_POST["supplier_provider"]));
  $address_provider = htmlspecialchars(delete_special_chars($_POST["address_provider"]));

  $email_provider = filter_var($_POST["email_provider"],FILTER_SANITIZE_EMAIL);

  $concat = $supplier_provider.$email_provider;
  $token_provider =  password_hash($concat, PASSWORD_DEFAULT);
  $phone1_provider = htmlspecialchars(delete_special_chars($_POST["phone1_provider"]));
  $phone2_provider = (isset($_POST["phone2_provider"]) && !empty($_POST["phone2_provider"])) ? htmlspecialchars(delete_special_chars($_POST["phone2_provider"])) : "NA";
  $department = htmlspecialchars(delete_special_chars($_POST["department"]));
  $city = htmlspecialchars(delete_special_chars($_POST["city"]));

  $exists = isset($supplier_provider) && isset($address_provider) && isset($email_provider) && isset($phone1_provider) && isset($phone2_provider) && isset($department) && isset($city);
  $not_empty = !empty($supplier_provider) && !empty($address_provider) && !empty($email_provider) && !empty($phone1_provider) && !empty($phone2_provider) && !empty($department) && !empty($city);

	if ($exists && $not_empty)
  {
    $ids_department_city = search_ids_department_and_city_by_token($city);
    if ($ids_department_city)
    {
      $result = insert_new_provider([$token_provider,$supplier_provider,$address_provider,$ids_department_city[0]["idDepartment"],$ids_department_city[0]["idCity"],$email_provider,$phone1_provider,$phone2_provider]);
      if ($result)
      {
        print_r("Nuevo proveedor insertado con éxito.");
      }
    }

  }
  else
  {
    echo "Los campos marcados con * son obligatorios. \nVerifique e intente nuevamente.";
  }
