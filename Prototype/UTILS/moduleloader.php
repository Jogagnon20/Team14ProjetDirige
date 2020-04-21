<?php

function load_modules($moduleList){
  foreach($moduleList as $module => $moduleViewRef)
  {
    $path = __DIR__ . "/../HTML/$moduleViewRef";
    include $path;
  }
}

?>
