<?php
    include_once("./tp3-helpers.php");
    $urlcomponent = "movie/".$_GET["id"];
    $content = tmdbget($urlcomponent, null);
    $tab = json_decode($content, true);
    $title = $tab["title"];
    $original_title = $tab["original_title"];
    if($tab["tagline"] != null){
        $tagline = $tab["tagline"];
    }
    $overview = $tab["overview"];
    $homepage = $tab["homepage"];
    echo 'titre = '. $title . '<br/>';
    echo 'titre original = '. $original_title . '<br/>';
    echo '<I>tagline</I> = '. $tagline . '<br/>';
    echo 'description : '.$overview.'<br/>';
    echo '<a href =' . $homepage . '>lien vers la page publique</a>'
?>