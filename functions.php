<?php

function debug ($obj) {
  echo "<pre>";
  print_r($obj);
  echo "</pre>";
}

function clear_input ($string) {
  return trim(htmlspecialchars($string));
}
