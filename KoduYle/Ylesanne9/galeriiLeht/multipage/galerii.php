<?php
$pildid=array(
					array("nimi"=>"pildid/nameless1.jpg", "alt"=>"nimetu 1"),
					array("nimi"=>"pildid/nameless2.jpg", "alt"=>"nimetu 2"),
					array("nimi"=>"pildid/nameless3.jpg", "alt"=>"nimetu 3"),
					array("nimi"=>"pildid/nameless4.jpg", "alt"=>"nimetu 4"),
					array("nimi"=>"pildid/nameless5.jpg", "alt"=>"nimetu 5"),
					array("nimi"=>"pildid/nameless6.jpg", "alt"=>"nimetu 6")
				);
?> 
<?php require_once('head.html'); ?>
	<h3>Fotod</h3>
	<div id="gallery">
		<?php foreach($pildid as $pilt):?>
		<img src="<?php echo $pilt['nimi'];?>" alt="<?php echo $pilt['alt'];?>" />
		<?php endforeach; ?>
	</div>
<?php require_once('foot.html'); ?>
<!-- 	<img src="pildid/nameless1.jpg" alt="nimetu 1" />
		<img src="pildid/nameless2.jpg" alt="nimetu 2" />
		<img src="pildid/nameless3.jpg" alt="nimetu 3" />
		<img src="pildid/nameless4.jpg" alt="nimetu 4" />
		<img src="pildid/nameless5.jpg" alt="nimetu 5" />
		<img src="pildid/nameless6.jpg" alt="nimetu 6" /> -->