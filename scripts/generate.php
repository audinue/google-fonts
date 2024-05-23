<?php

$json = json_decode(file_get_contents('google-fonts.json'), true);

foreach ($json as $key1 => $value1) {
  $name = strtolower(str_replace(' ', '-', $key1));
  $css = '';
  foreach ($value1['variants'] as $key2 => $value2) {
    foreach ($value2 as $key3 => $value3) {
      $css .= '@font-face{';
      $css .= 'font-family:"' . $key1 . '";';
      $css .= 'font-style:' . $key2 . ';';
      $css .= 'font-weight:' . $key3 . ';';
      $css .= 'font-display:swap;';
      $css .= 'src:url(' . $value3['url']['woff2'] . ')format("woff2");';
      $css .= '}';
    }
  }
  $css .= '.font-' . $name . '{';
  $css .= 'font-family:"' . $key1 . '";';
  $css .= '}';
  file_put_contents("$name.css", $css);
}
