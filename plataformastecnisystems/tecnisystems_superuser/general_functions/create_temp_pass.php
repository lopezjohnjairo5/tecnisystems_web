<?php
function temp_pass()
{
    $array_nums = array();
    $array_letters = array();
    $array_specials = array("_","$");
    $final = array();
    $result = "";

    for ($j=0; $j <= 9; $j++)
    {
      array_push($array_nums,$j);
    }

    for ($o=97; $o < 123; $o++)
    {
      array_push($array_letters,chr($o));
    }

    for ($n=0; $n < 4; $n++)
    {
      $numj = random_int(0,count($array_letters)-1);
      $numo = random_int(0,count($array_nums)-1);
      $numh = random_int(0,count($array_specials)-1);
      $numn = random_int(0,9);

      if ($numn%2==0)
      {
        $result .= strtoupper($array_letters[$numj]).$array_nums[$numo].$array_specials[$numh];
      }
      else
      {
        $result .= strtoupper($array_letters[$numj]).$array_nums[$numo].$array_specials[$numh];
      }
    }

    $pass_clear = filter_var(htmlspecialchars( delete_special_chars($result)), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $pass_hash = password_hash(filter_var(htmlspecialchars( delete_special_chars($result)), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH), PASSWORD_DEFAULT);
    array_push($final,[
      "pass_clear" => $pass_clear,
      "pass_hash" => $pass_hash,
      "verification_pass" => password_verify($pass_clear,$pass_hash)]);
    return $final;
}
