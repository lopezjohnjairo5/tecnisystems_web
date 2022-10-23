<section id="technical_panel">
  <div id="location_coords">
    <span id="latitude"></span>
    <span id="longitude"></span>
  </div>
  <?php

    if(!isset($_SESSION["administrative_user"])){
        session_destroy();
        header('Location: '.PATH_WEB."?error=access_denied");
        die();
    }else{
        include TP."screen_charge.php";
        include TP."aside_nav.php";
        include TP."hamburguer.php";
        include TP."reports.php";
        include TP."clients.php";
        include TP."record.php";
        include TP."settings.php";
        include TP."sign_off.php";
        include TP."scripts.php";
    }

  ?>
</section>
