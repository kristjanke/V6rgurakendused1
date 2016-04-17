
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

<?php require_once('head.html'); 
	if (!empty($_GET["pilt"])){
		echo "Tänan valiku eest!";
	} else {
		echo "Palun lisa valikud!";
	}

?>

	<h3>Valiku tulemus</h3>
	<img src="<?php echo $pildid[$_GET['pilt']-1]['nimi'];?>" alt="<?php echo $pildid[$_GET['pilt']-1]['alt'];?>" />
	<p>Siia tuleb valiku tulemus, mida saab kuvada ainult PHP abil :)</p>
<?php require_once('foot.html'); ?>
