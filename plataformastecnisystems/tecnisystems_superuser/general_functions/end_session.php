<?php

function end_session()
{
  session_start();
  session_destroy();
}
