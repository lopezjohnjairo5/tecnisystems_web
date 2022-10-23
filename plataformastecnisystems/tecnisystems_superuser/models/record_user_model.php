<?php
include CORE."conection.php";

function search_record_user($id_user,$id_type)
{
  $conn = Conect_bd("records");
  $n_array = array();
  $today = date("Y-m-d");

  try
  {
    $query = "SELECT l.`Latitude`, l.`Longitude`, r.`Record`, r.`dateRecord`, r.`timeRecord` FROM location_records l, records r WHERE r.idUser = '".$id_user."' AND r.idTypeUser = '".$id_type."' AND r.dateRecord = '".$today."' AND l.idLocationRecord = r.idLocationRecord ORDER BY r.`dateRecord`,r.`timeRecord` DESC;";
    $result = $conn->query($query);

    foreach ($result as $item)
    {
      array_push($n_array,
        [$item['Latitude'],
        $item['Longitude'],
        $item['Record'],
        $item['dateRecord'],
        $item['timeRecord']]);
    }

    Disconect_bd($result,$conn);
    return $n_array;

  }
  catch (Exception $e)
  {
    return "false";
  }
}
