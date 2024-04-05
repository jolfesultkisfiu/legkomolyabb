<?php

    require_once "eventclass.php";

    $event1 = new Event("fishing", "lots of fishing", "2024/05/13", "14:00", "fish.png", "at the river");
    $eventarr[] = $event1;
    print_r($eventarr);
    
?>