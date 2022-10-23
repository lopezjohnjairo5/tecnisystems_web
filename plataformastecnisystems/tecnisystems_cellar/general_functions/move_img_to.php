<?php

function moveImgTo($type_img,$imgData,$imgPath)
{
  if (isset($imgData))
  {
    $data = base64_decode(preg_replace('/^[^,]*,/', '', $imgData));
    file_put_contents($imgPath , $data);
    print_r("\n- Imagen ".$type_img." almacenada correctamente.");
  }
  else
  {
    print_r("\n- problema al guardar la imagen ".$type_img.". Verifique e intente nuevamente.");
  }
}
