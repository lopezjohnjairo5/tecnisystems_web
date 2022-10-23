<?php

  function limit_size_words($string,$begin,$final)
  {
    $result = substr($string,$begin,$final);
    return $result;
  }
