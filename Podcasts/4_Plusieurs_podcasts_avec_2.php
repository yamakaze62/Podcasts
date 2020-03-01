<?php
    header('Content-Type: text/html; charset = utf-8');
    if(!ini_get('date.timezone')){
        date_default_timezone_set('Europe/Paris');
    }
    require_once 'vendor/dg/rss-php/src/Feed.php';
    $rss1 = Feed::loadRss("https://feeds.publicradio.org/public_feeds/brains-on/itunes/rss?fbclid=IwAR1rnx0QXn9HiUKPo6qtUdqXHLjqS2EIPdKP2L5kGLbSvcjbPjJRLxPOHUs");
    $rss2 = Feed::loadRss("https://feeds.megaphone.fm/END1032105222?fbclid=IwAR1U7VdPjNLcLWUVR4hFoWPEwXHUERSsf3mBwfcNxFFVwgLVohRP_j2_fUs");
    $week_prec2 = "00";
    //$day_prec1 = "";
    $week_prec1 = "00";
?>
<table border="1">
<tr><th>Date</th><th>Titre</th><th>Lecture</th><th>Duree</th><th>Media</th></tr>
<?php foreach ($rss2->item as $item2): ?>
<?php
//Format du site: Fri, 28 Feb 2020 16:58:45 +0100
$url2 = (string)$item2->enclosure['url'];
$week2 = date("W", strtotime($item2->pubDate));
$day2 = date("d", strtotime($item2->pubDate));
$year2 = date("Y", strtotime($item2->pubDate));
?>
<?php
    if($week2 != $week_prec2){
        echo '<tr><td colspan = "5" align = "center">Numéro de la semaine '.$week2.' de l\'année '. $year2.'</td></tr>';
        $week_prec2 = $week2;
    }
?>
<tr>
<td><?php echo $item2->pubDate ?></td>
<td><?php echo htmlspecialchars($item2->title) ?></td>
<td><?php echo '<audio controls ="controls"><source src = "'.$url2.'" type="audio/mp3" /></audio>'?></td>
<td><?php echo htmlspecialchars($item2->{'itunes:duration'}) ?></td>
<td><?php echo '<a href = "'.$url2.'">'.$url2.'</a>'?></td>
</tr>

<?php
    foreach($rss1->item as $item1){
        $url1 = (string)$item1->enclosure['url'];
        $week1 = date("W", strtotime($item1->pubDate));
        //$day1 = date("d", strtotime($item1->pubDate));
        $year1 = date("Y", strtotime($item1->pubDate));       
        if($year1 == $year2 && $week1 == $week2 && $week_prec1 != $week2){
            echo '<tr>';
            echo '<td>'.$item1->pubDate.'</td>';
            echo '<td>'.htmlspecialchars($item1->title).'</td>';
            echo '<td><audio controls ="controls"><source src = "'.$url1.'" type="audio/mp3" /></audio></td>';
            echo '<td>'.htmlspecialchars($item1->{'itunes:duration'}).'</td>';
            echo '<td><a href = "'.$url1.'">'.$url1.'</a></td>';
            echo '</tr>';
            $week_prec1 = $week1;
        }
    }
?>
<?php endforeach?>

</table>
