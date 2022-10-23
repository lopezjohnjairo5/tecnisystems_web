<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."search_provider_model.php";
  include GENERALFUNC."delete_special_chars.php";

  $query_search = (filter_var($_POST["search_provider_input"],FILTER_SANITIZE_EMAIL)) ? $_POST["search_provider_input"] : htmlspecialchars($_POST["search_provider_input"]);

  if (isset($query_search) && !empty($query_search))
  {
    if (strtolower($query_search) == "t")
    {
       $array_prov = search_all_providers();
       if ($array_prov)
       {
        $new_array_providers = add_to_array($array_prov);
        echo json_encode($new_array_providers);
       }
    }
    else
    {
      $array_prov = search_providers_by_condition($query_search);
      if ($array_prov)
      {
         $new_array_providers = add_to_array($array_prov);
         echo json_encode($new_array_providers);
      }
      else
      {
        $idD = search_id_by_department(ucfirst(strtolower($query_search)));
        $idCi = search_id_by_city(ucfirst(strtolower($query_search)));
        $array_prov = search_providers_by_city_department([$idD,$idCi]);

        if ($array_prov)
        {
         $new_array_providers = add_to_array($array_prov);
         echo json_encode($new_array_providers);
        }
      }
    }
  }
  else
  {
    print_r("Error");
  }

function add_to_array($array)
{
  $arrayLength = count($array);
  for ($i=0; $i < $arrayLength; $i++)
  {
    $city_provider = search_city_by_id($array[$i]["idCity"]);
    $dep_provider = search_department_by_id($array[$i]["idDepartment"]);
    $array[$i] += ["city" => $city_provider];
    $array[$i] += ["department"  => $dep_provider];
  }
  return $array;
}
