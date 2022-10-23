<?php
  require QR."qrlib.php";

  function create_qr($contentQR,$name_qr)
  {
    $path_qr_temp = QRIMGS;

    if(!file_exists($path_qr_temp))
    {
      mkdir($path_qr_temp);
    }
    try
    {
      $filenameQR = $path_qr_temp.$name_qr;
      $sizeQR = '10';
      $levelQR = 'M';
      $framesizeQR = 3;

      QRcode::png($contentQR,$filenameQR,$levelQR,$sizeQR,$framesizeQR);

      return true;
    }
    catch (\Exception $e) 
    {
      return false;
    }
  }
