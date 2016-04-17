<?php
$pildid=array(
					array("nimi"=>"pildid/nameless1.jpg", "alt"=>"nimetu 1","for"=>"p1", "value"=>"1", "id"=>"p1"),
					array("nimi"=>"pildid/nameless2.jpg", "alt"=>"nimetu 2","for"=>"p2", "value"=>"2", "id"=>"p2"),
					array("nimi"=>"pildid/nameless3.jpg", "alt"=>"nimetu 3","for"=>"p3", "value"=>"3", "id"=>"p3"),
					array("nimi"=>"pildid/nameless4.jpg", "alt"=>"nimetu 4","for"=>"p4", "value"=>"4", "id"=>"p4"),
					array("nimi"=>"pildid/nameless5.jpg", "alt"=>"nimetu 5","for"=>"p5", "value"=>"5", "id"=>"p5"),
					array("nimi"=>"pildid/nameless6.jpg", "alt"=>"nimetu 6","for"=>"p6", "value"=>"6", "id"=>"p6")
				);

?> 
<?php require_once('head.html'); ?>
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="GET">
		<?php foreach($pildid as $pilt):?>
		<p>
			<label for="<?php echo $pilt['for'];?>">
				<img src="<?php echo $pilt['nimi'];?>" alt="<?php echo $pilt['alt'];?>" height="100" />
			</label>
			<input type="radio" value="<?php echo $pilt['value'];?>" id="<?php echo $pilt['id'];?>" name="pilt"/>
		</p>
		<?php endforeach; ?>
		<br/>
		<input type="submit" value="Valin!"/>
	</form>
<?php require_once('foot.html'); ?>

