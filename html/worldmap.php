<?php
    include("config.php");
	include("commonfunctions.php");
    $irpg_page_title = "World Map";
    include("header.php");
?>
 
<h1>World Map</h1>
<p>[offline users are red, online users are blue]</p>
 
<style type="text/css">
</style>
 
<div style="background:url('newmap.png');width:500px;height:500px;position:relative;">
<?php
    $file = fopen($irpg_db,"r");
    fgets($file);
    while($location=fgets($file)) {
       list($user,,,$level,$class,$secs,,,$online,,$x,$y) = explode("\t",trim($location));
		$online = $online ? 'Yes' : 'No';
		$secs = duration($secs);
       print '<a href="playerview.php?player='.htmlentities($user).'" class="mapDot '.$online.'" style="left:'.$x.'px;top:'.$y.'px;"><div><h1>'.htmlentities($user).'</h1>'.htmlentities($class).'<br>Level '.$level.'<br>Next level in<br>'.$secs.'</div></a>';
    }
    fclose($file);
?>
</div>
<?php include("footer.php");?>
