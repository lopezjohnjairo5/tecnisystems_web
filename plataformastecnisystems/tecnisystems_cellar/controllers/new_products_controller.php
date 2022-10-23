<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include GENERALFUNC."create_qr.php";
  include GENERALFUNC."upload_files.php";
  include MODELS."new_products_model.php";
  include GENERALFUNC."delete_special_chars.php";
  include GENERALFUNC."search_state_user.php";
  include GENERALFUNC."end_session.php";

  session_start();

if (search_state_user($_SESSION["Cellar_user"][4],$_SESSION["Cellar_user"][3],$_SESSION["Cellar_user"][0]))
{
    $update_info = htmlspecialchars(delete_special_chars($_POST["update_info"]));
    $serial_product = htmlspecialchars(delete_special_chars($_POST["serial_product"]));
    $product = htmlspecialchars(delete_special_chars($_POST["product"]));
    $brand_product = htmlspecialchars(delete_special_chars($_POST["brand_product"]));

    if (isset($_FILES["datasheet_product"]) && !empty($_FILES["datasheet_product"]))
    {
      if (upload_datasheet($_FILES["datasheet_product"]['name'],$_FILES["datasheet_product"]['tmp_name']))
      {
        $datasheet_product = PATH_WEB_DOCUMENTS."files/".$_FILES["datasheet_product"]['name'];
      }
      else
      {
        $datasheet_product = "NA";
      }
    }
    else
    {
      $datasheet_product = "NA";
    }

    $resultPQR = create_qr($serial_product,$serial_product."_".$product.".png");
    if ($resultPQR)
    {
      $pathQR = PATH_WEB_DOCUMENTS."qr_imgs/".$serial_product."_".$product.".png";
    }

    $supplier_product = htmlspecialchars(delete_special_chars($_POST["supplier_product"]));
    $state_product = htmlspecialchars(delete_special_chars($_POST["state_product"]));
    $type_product = htmlspecialchars(delete_special_chars($_POST["type_product"]));

    $power_plant_product = (!empty(htmlspecialchars(delete_special_chars($_POST["power_plant_product"])))) ? htmlspecialchars(delete_special_chars($_POST["power_plant_product"])) : "NA" ;
    $power_plant_model = (!empty(htmlspecialchars(delete_special_chars($_POST["power_plant_model"])))) ? htmlspecialchars(delete_special_chars($_POST["power_plant_model"])) : "NA" ;
    $power_plant_serie = (!empty(htmlspecialchars(delete_special_chars($_POST["power_plant_serie"])))) ? htmlspecialchars(delete_special_chars($_POST["power_plant_serie"])) : "NA" ;
    $motor_product = (!empty(htmlspecialchars(delete_special_chars($_POST["motor_product"])))) ? htmlspecialchars(delete_special_chars($_POST["motor_product"])) : "NA" ;
    $motor_model = (!empty(htmlspecialchars(delete_special_chars($_POST["motor_model"])))) ? htmlspecialchars(delete_special_chars($_POST["motor_model"])) : "NA" ;
    $motor_serie = (!empty(htmlspecialchars(delete_special_chars($_POST["motor_serie"])))) ? htmlspecialchars(delete_special_chars($_POST["motor_serie"])) : "NA" ;
    $generator_product = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_product"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_product"])) : "NA" ;
    $generator_serie = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_serie"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_serie"])) : "NA" ;
    $generator_kw = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_kw"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_kw"])) : 0 ;
    $generator_kwa = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_kwa"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_kwa"])) : 0 ;
    $generator_phases = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_phases"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_phases"])) : 0 ;
    $generator_volt = (!empty(htmlspecialchars(delete_special_chars($_POST["generator_volt"])))) ? htmlspecialchars(delete_special_chars($_POST["generator_volt"])) : 0 ;

    $f_oil_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["f_oil_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["f_oil_amount_cellar"])) : "NA";
    $f_oil_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["f_oil_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["f_oil_reference_cellar"])) : "NA";
    $fuel_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["fuel_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["fuel_amount_cellar"])) : "NA";
    $fuel_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["fuel_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["fuel_reference_cellar"])) : "NA";
    $air_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["air_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["air_amount_cellar"])) : "NA";
    $air_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["air_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["air_reference_cellar"])) : "NA";
    $separator_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["separator_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["separator_amount_cellar"])) : "NA";
    $separator_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["separator_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["separator_reference_cellar"])) : "NA";
    $cooling_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["cooling_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["cooling_amount_cellar"])) : "NA";
    $cooling_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["cooling_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["cooling_reference_cellar"])) : "NA";
    $motor_oil_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["motor_oil_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["motor_oil_amount_cellar"])) : "NA";
    $motor_oil_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["motor_oil_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["motor_oil_reference_cellar"])) : "NA";
    $other_amount_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["other_amount_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["other_amount_cellar"])) : "NA";
    $other_reference_cellar = (!empty(htmlspecialchars(delete_special_chars($_POST["other_reference_cellar"])))) ? htmlspecialchars(delete_special_chars($_POST["other_reference_cellar"])) : "NA";

    $capacity_air = (!empty(htmlspecialchars(delete_special_chars($_POST["capacity_air"])))) ? htmlspecialchars(delete_special_chars($_POST["capacity_air"])) : "NA";
    $type_air_aconditioning = (!empty(htmlspecialchars(delete_special_chars($_POST["type_air_aconditioning"])))) ? htmlspecialchars(delete_special_chars($_POST["type_air_aconditioning"])) : "NA";

    $voltaje_pump = (!empty(htmlspecialchars(delete_special_chars($_POST["voltaje_pump"])))) ? htmlspecialchars(delete_special_chars($_POST["voltaje_pump"])) : 0;
    $hp_pump = (!empty(htmlspecialchars(delete_special_chars($_POST["hp_pump"])))) ? htmlspecialchars(delete_special_chars($_POST["hp_pump"])) : "NA";
    $amp_pump = (!empty(htmlspecialchars(delete_special_chars($_POST["amp_pump"])))) ? htmlspecialchars(delete_special_chars($_POST["amp_pump"])) : "NA";

    $capacity_pump = (!empty(htmlspecialchars(delete_special_chars($_POST["capacity_pump"])))) ? htmlspecialchars(delete_special_chars($_POST["capacity_pump"])) : "NA";
    $type_pump = (!empty(htmlspecialchars(delete_special_chars($_POST["type_pump"])))) ? htmlspecialchars(delete_special_chars($_POST["type_pump"])) : "NA";

    $array_ICGIP = [
      $serial_product,
      $product,
      $brand_product,
      $datasheet_product,
      $pathQR,
      $supplier_product,
      $state_product,
      $type_product
    ];

    $array_IAENP = [
      $f_oil_amount_cellar,
      $f_oil_reference_cellar,
      $fuel_amount_cellar,
      $fuel_reference_cellar,
      $air_amount_cellar,
      $air_reference_cellar,
      $separator_amount_cellar,
      $separator_reference_cellar,
      $cooling_amount_cellar,
      $cooling_reference_cellar,
      $motor_oil_amount_cellar,
      $motor_oil_reference_cellar,
      $other_amount_cellar,
      $other_reference_cellar
    ];

    $array_ICENP = [
      $power_plant_product,
      $power_plant_model,
      $power_plant_serie,
      $motor_product,
      $motor_model,
      $motor_serie,
      $generator_product,
      $generator_serie,
      $generator_kw,
      $generator_kwa,
      $generator_phases,
      $generator_volt
    ];

    $array_CACP = [$capacity_air, $type_air_aconditioning];

    $array_CPP = [$voltaje_pump,$hp_pump,$amp_pump,$capacity_pump,$type_pump];

    if ($update_info == 1)
    {
      print_r("\nInsertando datos...");
      $id_IAENP = insert_amount_electric_new_product($array_IAENP);
      $id_ICGIP = insert_cellar_general_info_product($array_ICGIP);

      array_push($array_ICENP,$id_IAENP);
      array_push($array_ICENP,$id_ICGIP);

      $id_ICENP = insert_cellar_electric_new_product($array_ICENP);

      array_push($array_CACP,$id_ICGIP);
      $id_ICACNP = insert_cellar_air_conditioning_new_product($array_CACP);

      array_push($array_CPP,$id_ICGIP);
      $id_ICPNP = insert_cellar_pumps_new_product($array_CPP);

    }
    else if($update_info == 2)
    {
      if ($type_product == 1)
      {
        $array_CACP = ["NA", $type_air_aconditioning];
        $array_CPP = [0,"NA","NA","NA",$type_pump];

      }
      else if ($type_product == 2)
      {
        $array_IAENP = ["NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA"];
        $array_ICENP = ["NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", 0, 0, 0, 0];
        $array_CPP = [0,"NA","NA","NA",$type_pump];

      }
      else
      {
        $array_IAENP = ["NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA"];
        $array_ICENP = ["NA", "NA", "NA", "NA", "NA", "NA", "NA", "NA", 0, 0, 0, 0];
        $array_CACP = ["NA", $type_air_aconditioning];
      }

      print_r("\nActualizando...");
      $id_SIGPBS = search_id_general_product_by_serial($serial_product);
      $id_SICEPBI = search_id_cellar_electric_product_by_id_general($id_SIGPBS);

      array_push($array_IAENP,$id_SICEPBI);
      array_push($array_ICENP,$id_SIGPBS);

      $result_UCGIP = update_cellar_general_info_products($array_ICGIP);
      $result_UAREP = update_amount_reference_electric_products($array_IAENP);
      $result_UCEP = update_cellar_electric_products($array_ICENP);

      array_push($array_CACP,$id_SIGPBS);
      $result_UACP = update_air_conditioning_products($array_CACP);

      array_push($array_CPP,$id_SIGPBS);
      $result_UCPP = update_cellar_pumps_products($array_CPP);
  }

}
else
{
    end_session();
    echo "Redirigir";
}
