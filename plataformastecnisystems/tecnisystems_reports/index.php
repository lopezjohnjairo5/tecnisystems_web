<?php
  include "./config/generals.php";
  include "./config/paths.php";
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <?php
    include VIEWS."head.php";
  ?>
  <body>
    <?php
    session_start();

    if(isset($_SESSION["technical_user"])){
      include VIEWS."technical_panel.php";
    }else if(isset($_GET["error"]) && $_GET["error"] == "access_denied"){
      include POPS."pop_error.php";
      include VIEWS."login.php";
    }else{
      include VIEWS."login.php";
    }
    ?>
  </body>
  <?php
    include VIEWS."js.php";
    include POPS."alert.php";
  ?>
</html>
