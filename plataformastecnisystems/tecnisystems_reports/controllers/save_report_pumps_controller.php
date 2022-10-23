<?php
  include "../config/paths.php";
  include "../config/generals.php";

  include "../general_functions/delete_special_chars.php";
  include "../general_functions/search_state_user.php";
  include "../general_functions/search_id_technicals.php";
  include "../general_functions/search_id_cellar_product.php";
  include "../general_functions/search_id_client.php";
  include "../general_functions/search_ids_dep_city.php";
  include "../general_functions/insert_technicals_reports_ids.php";
  include "../general_functions/moveImgTo.php";
  include "../general_functions/insert_general_info.php";
  include "../general_functions/search_last_report_id.php";
  include "../general_functions/create_serial_reports.php";
  include GENERALFUNC."end_session.php";

  include MODELS."save_report_pumps_model.php";

  session_start();

  if (search_state_user($_SESSION["technical_user"][0],$_SESSION["technical_user"][2],$_SESSION["technical_user"][4],3))
  {
    $serial_repor_number = create_serial_report(3);
    $path_firms = "./../documents/firms/";
    $path_qr_machine = "./../documents/qrs/";

    //print_r($_POST["data"][0]["client_info"]);

    $info_tech1_email = delete_special_chars($_POST["data"][0]["technical1"][0]["email"]);
    $info_tech1_document = delete_special_chars($_POST["data"][0]["technical1"][0]["document"]);
    $id_tech1 = search_id_technical_by_nit($info_tech1_document,3,$info_tech1_email);

    $info_client_document = delete_special_chars($_POST["data"][0]["client_info"]["document"]);
    $info_client_email = delete_special_chars($_POST["data"][0]["client_info"]["email"]);
    $info_client_firm = delete_special_chars($_POST["data"][0]["client_info"]["firm"]);
    $info_client_token = $_POST["data"][0]["client_info"]["token"];

    $id_client =  search_id_client_by_token($info_client_token);

    $firm = $path_firms."firm_".$info_client_document.".png";

    $info_machine_table_column_serial = delete_special_chars($_POST["data"][0]["machine_table"]["column1"][0]["serial"]);
    $id_pump1 = search_id_cellar_general_product($info_machine_table_column_serial,3);

    $not_empty = !empty($id_tech1) && !empty($id_client) && !empty($id_pump1);
    $not_zero = $id_tech1 != 0 && $id_client != 0 && $id_pump1 != 0;
    $not_false = $id_tech1 != false && $id_client != false && $id_pump1!= false;

    $qr = $path_qr_machine."QR_photo_serial_".$info_machine_table_column_serial.".png";



    if ( $not_empty && $not_zero && $not_false)
    {
      $array_ids_technicals = array();
      $array_aditional_info = array();
      $array_ids_aditional_info = array();
      $array_general_info = array();
      $array_pump_reports_info = array();

      for ($i=1; $i <= 3; $i++)
      {
        $info_tech_email = delete_special_chars($_POST["data"][0]["technical".$i][0]["email"]);
        $info_tech_document = delete_special_chars($_POST["data"][0]["technical".$i][0]["document"]);
        $id_tech = search_id_technical_by_nit($info_tech_document,3,$info_tech_email);
        array_push($array_ids_technicals,!empty($id_tech) && $id_tech != false ?$id_tech : 0); 
      }
      
      array_push($array_general_info,
        $_POST["data"][0]["general_info"]["general_info"][0]["date_service"],
        $_POST["data"][0]["general_info"]["general_info"][0]["start_hour"],
        $_POST["data"][0]["general_info"]["general_info"][0]["end_hour"],
        search_id_dept_by_tk($_POST["data"][0]["general_info"]["general_info"][0]["department"]),
        search_id_city_by_tk($_POST["data"][0]["general_info"]["general_info"][0]["city"]),
        $_POST["data"][0]["general_info"]["general_info"][0]["address_service"],
        $id_client,
        $qr,
        $_POST["data"][0]["general_info"]["general_info"][0]["type_maintenance"],
        $_POST["data"][0]["machine"]["observations"]);

      
      for ($j=1; $j <= 4; $j++)
      {
        $info_machine_table_column_serial = delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["serial"]);
        $id_pump = search_id_cellar_general_product($info_machine_table_column_serial,3);

        if(!empty($id_pump) && $id_pump != false && $id_pump != 0)
        {
          array_push($array_aditional_info,[
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["control_panel"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["protection"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["hidro_tank"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["presion_work"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["preload"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["electric_float"]),
            delete_special_chars($_POST["data"][0]["machine_table"]["column".$j][0]["hidraulic_part"]),
            $id_pump]);
          }
        }
        $result_id_it = insert_technicals_reports($array_ids_technicals);
        $array_aditional_info_length = count($array_aditional_info);
        for ($i=0; $i < $array_aditional_info_length; $i++)
        {
          $result_id_prai = insert_pumps_reports_aditional_info($array_aditional_info[$i]);
          array_push($array_ids_aditional_info,$result_id_prai);
        }
        $array_ids_aditional_info_length = count($array_ids_aditional_info);
        //print_r($array_ids_aditional_info);
        while ($array_ids_aditional_info_length < 4){
          array_push($array_ids_aditional_info,0);
          $array_ids_aditional_info_length += 1;
        }
        

        $result_id_pra = insert_pumps_reports_pumps_aditional($array_ids_aditional_info);

        $result_id_gi = insert_general_information($array_general_info);

        if ($result_id_it && $result_id_pra && $result_id_gi)
        {
          $array_pump_reports_info = [
            $serial_repor_number,
            $id_client,
            $result_id_it,
            $result_id_gi,
            $result_id_pra
          ];

          $result_id_pr = insert_pump_report($array_pump_reports_info);

          echo "Serial reporte creado: ".$serial_repor_number;

          try
          {
            $info_client_firm = $_POST["data"][0]["client_info"]["firm"];
            moveImgTo("Firma cliente",$info_client_firm,$firm);
            moveImgTo("Qr img",$_POST["data"][0]["machine"]["qr"],$qr);
          }
          catch (\Exception $e)
          {
            echo "error_move_img";
          }
        }
        else
        {
          echo "insert_error";
        }
      
    }
    else
    {
      echo "element_not_found";
    }
  
  }
  else
  {
    end_session();
    echo "Redirigir";
  }
