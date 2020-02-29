<?php
    header('Content-Type: text/html; charset = utf-8');
    if(!ini_get('date.timezone')){
        date_default_timezone_set('Europe/Paris');
    }
    require_once 'vendor/dg/rss-php/src/Feed.php';
    $rss = Feed::loadRss("http://radiofrance-podcast.net/podcast09/rss_14312.xml");
    $week_prec = "00";
    $day_prec = ""
?>
<table border="1">
<tr><th>Fri</th><th>Thu</th><th>Wed</th><th>Tue</th><th>Mon</th></tr>
<?php foreach ($rss->item as $item): ?>
<?php
//Format du site: Fri, 28 Feb 2020 16:58:45 +0100
$url = (string)$item->enclosure['url'];
$week = date("W", strtotime($item->pubDate));
$day = date("D", strtotime($item->pubDate));
$cellule = $item->pubDate.'<a href = "'.$url.'">'.htmlspecialchars($item->title).'</a><audio controls><source src = "'.$url.'" type="audio/mp3"></audio><br/>';
$ligne = '';
?>
<?php
  
    if($week != $week_prec){   
        if($week_prec != "00"){
            echo '</tr>';
        }
        echo '<tr>';
    }

    if($day != $day_prec){
        if($day_prec != ''){
            echo '</td>';
        }
        echo '<td>'.$cellule;
    }
    else{
        echo $cellule;
    }
    $week_prec = $week;
    $day_prec = $day;
?>
<?php
    endforeach
?>
</table>