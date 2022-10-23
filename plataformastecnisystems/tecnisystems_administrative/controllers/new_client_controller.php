<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."new_client_model.php";
include GENERALFUNC."insert_address_client.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."search_by_location.php";
include GENERALFUNC."end_session.php";

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

$tokenClient = password_hash($document.$name, PASSWORD_DEFAULT);
$path_firm = "./../documents/firms/firm_";

session_start();

if (search_state_user($_SESSION["administrative_user"][0],$_SESSION["administrative_user"][2],$_SESSION["administrative_user"][4]))
{

  $isset_elements = isset($document) && isset($name) && isset($email) && isset($phone) && isset($peopleInCharge);
  $not_empty_elements = !empty($document) && !empty($name) && !empty($email) && !empty($phone) && !empty($peopleInCharge);

  if ($isset_elements && $not_empty_elements)
  {
      $array_address = [];
      $arrayAddressValuesLength = count($arrayAddressValues);
      for ($i=0; $i < $arrayAddressValuesLength; $i++)
      {
        //separamos los datos
        $idAddress = $arrayAddressValues[$i][0];
        $idDep = search_id_department_by_name($arrayAddressValues[$i][1]);
        $idCity = search_id_city_by_name($arrayAddressValues[$i][2]);
        $idGeneralCostumerInfo = insert_new_general_customer_information ([$idDep[0]["idDepartment"], $idCity[0]["idCity"], $idAddress]);
        array_push($array_address,$idGeneralCostumerInfo);
      }
      $idClient = insert_new_clients_info ([$tokenClient, $document, $name, $email, $phone, $alternativePhone, $path_firm.$document.".png", $peopleInCharge]);
      if (!empty($array_address) && $idClient)
      {
        $array_address_length = count($array_address);
        for ($i=0; $i < $array_address_length; $i++)
        {
          $idClientsCostumersInfo = insert_new_clients_costumers_info ([$idClient,$array_address[$i]]);
        }

        $arrayMachinesLength = count($arrayMachines);
        for ($i=0; $i < $arrayMachinesLength; $i++)
        {
          if ($arrayMachines[$i] != 0)
          {
            $result = insert_new_client_machine([$idClient, $arrayMachines[$i]]);
          }
        }

        if ($result)
        {
          echo "Correct";
        }
        else
        {
          echo "Error";
        }
      }
      else
      {
        echo "Error";
      }
  }

}
else
{
  end_session();
  echo "Redirigir";
}
