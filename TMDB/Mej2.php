<?php
    include_once("./tp3-helpers.php");
    $urlcomponent = "movie/550";
    $content = tmdbget($urlcomponent, null);
    $tab = json_decode($content, true);
    print_r($tab);
?>