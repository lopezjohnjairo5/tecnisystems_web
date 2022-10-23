<?php
function upload_datasheet($name_file,$tmp_name_file)
{
  $directorio = FILES;
  $uploadFile = $directorio.basename($name_file);
  print_r($uploadFile);
  if (move_uploaded_file($tmp_name_file, $uploadFile))
  {
    return true;
  }
  else
  {
    return false;
  }
}
