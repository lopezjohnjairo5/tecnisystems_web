<?php
include CORE."conection.php";

function search_all_electricals_reports()
{
  $conn = Conect_bd("reports");
  $arrayGIP = array();

  try
  {
    $query = "SELECT `serialNumberER`,`idTechnicalUser1`,`idTechnicalUser2`,`idTechnicalUser3`,`date_general` FROM electrical_reports er,general_information gi, technicals_reports tr WHERE gi.idGeneralInformation = er.idGeneralInformation;";
    $sql = $conn->prepare($query);
    $sql->bindParam(':idProduct',$idProduct,PDO::PARAM_INT);
    $sql->execute();

    foreach ($sql as $item)
    {
      array_push($arrayGIP,[
        "serialProduct" => $item['serialProduct'],
        "Product" => $item['Product'],
        "Brand" => $item['Brand'],
        "pathDatasheet" => $item['pathDatasheet'],
        "pathQR" => $item['pathQR'],
        "idTypeProduct" => $item['idTypeProduct'],
        "idSupplier" => $item['idSupplier'],
        "idProductStatus" => $item['idProductStatus']
      ]);
    }

    Disconect_bd($result,$conn);
    return $arrayGIP;

  }
  catch (Exception $e)
  {
    return false;
  }
}
