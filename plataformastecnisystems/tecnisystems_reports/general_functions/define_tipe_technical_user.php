<?php

function define_type_tech_user()
{
  if($_SESSION["technical_user"][3] == "técnico eléctrico")
  {
    $role = 1;
  }
  if($_SESSION["technical_user"][3] == "técnico aire acondicionado")
  {
    $role = 2;
  }
  if($_SESSION["technical_user"][3] == "técnico motobombas")
  {
    $role = 3;
  }
  return $role;
}
