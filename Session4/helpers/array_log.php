<?php
  function array_log($array) {
    $array = print_r($array, true);
    echo <<<EOT
      <pre>
        <code>
          $array
        </code>
      </pre>
      EOT;
  }
  
