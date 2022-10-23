<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."search_user_model.php";
include GENERALFUNC."search_state_user.php";
include GENERALFUNC."delete_special_chars.php";
include GENERALFUNC."end_session.php";
$typeSearch = $_POST["typeElementToSearch"];
$searchInput = delete_special_chars($_POST["input_search_technical"]);

session_start();

if (search_state_user($_SESSION["superUser"][0],$_SESSION["superUser"][2],$_SESSION["superUser"][4]))
{
  if (isset($typeSearch) && !empty($typeSearch) && isset($searchInput) && !empty($searchInput))
  {
    $result_search = array();

    if ($typeSearch == 1)
    {
      if ($searchInput == "te")
      {
        $result_technical_user = search_technicals_user(1);
      }
      else if ($searchInput == "ta")
      {
        $result_technical_user = search_technicals_user(2);
      }
      else if ($searchInput == "tm")
      {
        $result_technical_user = search_technicals_user(3);
      }
      else
      {
        $result_technical_user = search_technicals_user_by_name_or_email($searchInput);
        if (!$result_technical_user)
        {
          $result_technical_user = search_technicals_user_by_nit($searchInput);
        }
      }

      if (!$result_technical_user)
      {
        echo "not_found";
      }
      else
      {
        echo json_encode($result_technical_user);
      }
    }
    else if ($typeSearch == 2)
    {
      if ($searchInput == "t")
      {
        $result_administrative_user = search_administrative_user();
      }
      else
      {
        $result_administrative_user = search_administrative_user_by_name_or_email($searchInput);
        if (!$result_administrative_user)
        {
          $result_administrative_user = search_administrative_user_by_nit($searchInput);
        }
      }

      if (!$result_administrative_user)
      {
        echo "not_found";
      }
      else
      {
        echo json_encode($result_administrative_user);
      }

    }
    else if ($typeSearch == 3)
    {
      if ($searchInput == "t")
      {
        $result_cellar_user = search_cellar_user();
      }
      else
      {
        $result_cellar_user = search_cellar_user_by_name_or_email($searchInput);
        if (!$result_cellar_user)
        {
          $result_cellar_user = search_cellar_user_by_nit($searchInput);
        }
      }

      if (!$result_cellar_user)
      {
        echo "not_found";
      }
      else
      {
        echo json_encode($result_cellar_user);
      }
    }
    else
    {
      echo "content_error";
    }

  }
  else
  {
    echo "content_error";
  }
}
else
{
  end_session();
  echo "Redirigir";
}
