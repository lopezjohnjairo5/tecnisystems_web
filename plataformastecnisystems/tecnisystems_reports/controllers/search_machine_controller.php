<?php
  include "../config/paths.php";
  include "../config/generals.php";
  include MODELS."search_machine_models.php";
  include GENERALFUNC."delete_special_chars.php";
  include GENERALFUNC."define_tipe_technical_user.php";
  include GENERALFUNC."end_session.php";
  session_start();

  $search = filter_var($_POST['search_machine'],FILTER_SANITIZE_SPECIAL_CHARS);
  $type_technical = 0;

  if (isset($_SESSION["technical_user"][3]))
  {
    $type_technical = define_type_tech_user();
    if(strtolower($search) == "todo" || strtolower($search) == "t")
    {
      $contentSearch = search_all_machines($type_technical);
      validate_return_function($contentSearch);
    }
    else
    {
      $contentSearch = search_machine_by_serial($type_technical,$search);
      validate_return_function($contentSearch);
    }
  }
  else
  {
    end_session();
    echo "Redirigir";
  }


function validate_return_function($content)
{
  if (!empty($content))
  {
    echo json_encode($content);
  }
  else
  {
    echo "Empty";
  }
}
