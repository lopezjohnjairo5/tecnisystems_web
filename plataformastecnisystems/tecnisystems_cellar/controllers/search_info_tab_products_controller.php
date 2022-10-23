<?php
include "../config/paths.php";
include "../config/generals.php";
include MODELS."search_info_tab_products_model.php";

$providersArray = search_info_providers();
$stateProductArray = search_info_state_product();
$typeProductArray = search_info_type_product();

$typePumpsProductArray = search_info_type_pumps_product();
$typeAirProductArray = search_info_type_air_product();

echo json_encode([$providersArray,$stateProductArray,$typeProductArray,$typePumpsProductArray,$typeAirProductArray]);
