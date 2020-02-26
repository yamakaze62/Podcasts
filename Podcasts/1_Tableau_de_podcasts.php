<?php
    header('Content-Type: text/html; charset = utf-8');
    if(!ini_get('date.timezone')){
        date_default_timezone_set('Europe/Paris');
    }
    require_once 'vendor/dg/rss-php/src/Feed.php';
    $rss = Feed::loadRss("http://radiofrance-podcast.net/podcast09/rss_14312.xml");
?>
<table>
<tr><th>Date</th><th>Titre</th><th>Lecture</th><th>Duree</th><th>Media</th></tr>
<?php foreach ($rss->item as $item): ?>
<?php
$url = (string)$item->enclosure['url'];
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