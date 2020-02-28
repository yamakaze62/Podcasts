<?php
    header('Content-Type: text/html; charset = utf-8');
    if(!ini_get('date.timezone')){
        date_default_timezone_set('Europe/Paris');
    }
    require_once 'vendor/dg/rss-php/src/Feed.php';
    $rss = Feed::loadRss("http://radiofrance-podcast.net/podcast09/rss_14312.xml");
    $date_prec = "00";
?>
<table border="1">
<tr><th>Date</th><th>Titre</th><th>Lecture</th><th>Duree</th><th>Media</th></tr>
<?php foreach ($rss->item as $item): ?>
<?php
//Format du site: Fri, 28 Feb 2020 16:58:45 +0100
$url = (string)$item->enclosure['url'];
$date = date("W", strtotime($item->pubDate));
?>
<?php
    if($date != $date_prec){
        echo '<tr><td colspan = "5" align = "center">Numéro de la semaine '.$date.'</td></tr>';
        $date_prec = $date;
    }
?>
<tr>
<td><?php echo $item->pubDate ?></td>
<td><?php echo htmlspecialchars($item->title) ?></td>
<td><?php echo '<audio controls ="controls"><source src = "'.$url.'" type="audio/mp3" /></audio>'?></td>
<td><?php echo htmlspecialchars($item->{'itunes:duration'}) ?></td>
<td><?php echo '<a href = "'.$url.'">'.$url.'</a>'?></td>
</tr>
<?php endforeach?>

</table>