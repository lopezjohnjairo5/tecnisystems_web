<?php
  include CORE."conection.php";

  function search_info_electrical_machine_by_serial($serial)
  {
    $conn = Conect_bd("cellar");
    $n_array = array();

    try
    {
      $query = "SELECT cip.`idCellarGeneralInfoProduct`,cep.`powerPlant`,cep.`powerPlantModel`,cep.`powerPlantSerie`,cep.`motor`,cep.`motorModel`,cep.`motorSerie`,cep.`generator`,cep.`generatorSerie`,cep.`generatorKw`,cep.`generatorKwa`,cep.`generatorPhases`,cep.`generatorVolt`,cep.`idAmountReferenceElectricProducts`,arep.`oilAmount`,arep.`oilReference`, arep.`fuelAmount`,arep.`fuelReference`,arep.`airAmount`,arep.`airReference`,arep.`separatorAmount`,arep.`separatorReference`,arep.`refrigerantAmount`,arep.`refrigerantReference`,arep.`engineOilAmount`,arep.`engineOilReference`,arep.`otherAmount`,arep.`otherReference` FROM cellar_general_info_products cip, cellar_electric_products cep, amount_reference_electric_products arep WHERE cip.serialProduct= '".$serial."' AND cep.idCellarGeneralInfoProduct = cip.idCellarGeneralInfoProduct AND cep.idAmountReferenceElectricProducts = arep.idAmountReferenceElectricProducts;";

      $result = $conn->query($query);

      foreach ($result as $item)
      {
        array_push($n_array,[
          'powerPlant' => $item['powerPlant'],
          'powerPlantModel' => $item['powerPlantModel'],
          'powerPlantSerie' => $item['powerPlantSerie'],
          'motor' => $item['motor'],
          'motorModel' => $item['motorModel'],
          'motorSerie' => $item['motorSerie'],
          'generator' => $item['generator'],
          'generatorSerie' => $item['generatorSerie'],
          'generatorKw' => $item['generatorKw'],
          'generatorKwa' => $item['generatorKwa'],
          'generatorPhases' => $item['generatorPhases'],
          'generatorVolt' => $item['generatorVolt'],
          'oilAmount' => $item['oilAmount'],
          'oilReference' => $item['oilReference'],
          'fuelAmount' => $item['fuelAmount'],
          'fuelReference' => $item['fuelReference'],
          'airAmount' => $item['airAmount'],
          'airReference' => $item['airReference'],
          'separatorAmount' => $item['separatorAmount'],
          'separatorReference' => $item['separatorReference'],
          'refrigerantAmount' => $item['refrigerantAmount'],
          'refrigerantReference' => $item['refrigerantReference'],
          'engineOilAmount' => $item['engineOilAmount'],
          'engineOilReference' => $item['engineOilReference'],
          'otherAmount' => $item['otherAmount'],
          'otherReference' => $item['otherReference']]);
      }


    }
    catch (Exception $e)
    {
      array_push($n_array,[
        'powerPlant' => "N/A",
        'powerPlantModel' => "N/A",
        'powerPlantSerie' => "N/A",
        'motor' => "N/A",
        'motorModel' => "N/A",
        'motorSerie' => "N/A",
        'generator' => "N/A",
        'generatorSerie' => "N/A",
        'generatorKw' => "N/A",
        'generatorKwa' => "N/A",
        'generatorPhases' => "N/A",
        'generatorVolt' => "N/A"]);
    }
    Disconect_bd($result,$conn);
    return $n_array;
  }
