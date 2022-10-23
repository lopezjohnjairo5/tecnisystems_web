<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."update_client_model.php";
include GENERALFUNC."insert_address_client.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."search_by_location.php";
include GENERALFUNC."end_session.php";

session_start();

if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
{
  $token = $_POST["data"][0]["client_token"];
  $document = $_POST["data"][0]["client_document"];
  $name = $_POST["data"][0]["client_name"];
  $peopleInCharge = $_POST["data"][0]["client_charge"];
  $email = $_POST["data"][0]["client_email"];
  $phone = $_POST["data"][0]["client_phone"];
  $alternativePhone = $_POST["data"][0]["client_alternative_phone"];
  $electricalMachine = $_POST["data"][0]["electrical_machine"] == "true" ? 1 : 0;
  $airMachine = $_POST["data"][0]["air_machine"] == "true" ? 2 : 0;
  $pumpMachine = $_POST["data"][0]["pump_machine"] == "true" ? 3 : 0;
  $arrayAddressValues = $_POST["data"][0]["array_address_values"];
  $arrayMachines = [
    $electricalMachine,
    $airMachine,
    $pumpMachine
  ];


  $path_firm = "./../documents/firms/firm_".$document;

  $resultSearchToken = search_token_db($token);
  if ($resultSearchToken)
  {
    $arrayIdsAddress = search_ids_asociate_address($resultSearchToken);
    $resultDeleteAddressPass = delete_asociate_address_client_pass_table($resultSearchToken);

    if ($arrayIdsAddress)
    {
      $arrayIdsAddressLength = count($arrayIdsAddress);
      for ($i=0; $i < $arrayIdsAddressLength; $i++)
      {
        $resultDeleteAddress = delete_asociate_address_client($arrayIdsAddress[$i]);
      }
     }

     $resultDeleteMachinePass = delete_asociate_machine_client_pass_table($resultSearchToken);

     if ($resultDeleteAddress && $resultDeleteAddressPass && $resultDeleteMachinePass)
     {
       $arrayAddressValuesLength = count($arrayAddressValues);
        for ($j=0; $j < $arrayAddressValuesLength; $j++)
        {
          $idDep = search_id_department_by_name($arrayAddressValues[$j][1]);
          $idCity = search_id_city_by_name($arrayAddressValues[$j][2]);
          $pass_array = [$idDep[0]["idDepartment"], $idCity[0]["idCity"], $arrayAddressValues[$j][0]];
          $idInsertNewAddress = insert_new_general_customer_information($pass_array);

          if ($idInsertNewAddress)
          {
            $idInsertNewAddressPassTable = insert_new_clients_costumers_info([$resultSearchToken, $idInsertNewAddress]);
          }
        }
        $arrayMachinesLength = count($arrayMachines);
        for ($k=0; $k < $arrayMachinesLength; $k++)
        {
          if ($arrayMachines[$k] != 0 && !empty($arrayMachines[$k]))
          {
            $idInsertNewMachinePassTable = insert_new_client_machine([$resultSearchToken, $arrayMachines[$k]]);
          }
        }

       $arrayUpdateClientInfo = [
         $resultSearchToken,
         $document,
         $name,
         $email,
         $phone,
         $alternativePhone,
         $peopleInCharge,
         $path_firm
       ];

       $returnUpdateInfoClient = update_clients_info($arrayUpdateClientInfo);
       if ($returnUpdateInfoClient || $idInsertNewMachinePassTable || $idInsertNewAddressPassTable)
       {
          echo "Correct";
        }
        else
        {
          echo "Error";
        }
     }

  }
  else
  {
    echo "Error";
  }

}
else
{
  end_session();
  echo "Redirigir";
}
