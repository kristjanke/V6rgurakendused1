<?php
$kassid= array( 
		array('nimi'=>'Miisu', 'vanus'=>2, 'karv'=>'pruun', 'omanik'=>'Toomas'), 
		array('nimi'=>'Tom', 'vanus'=>4, 'karv'=>'must', 'omanik'=>'Kristo'),
		array('nimi'=>'Pätu', 'vanus'=>1, 'karv'=>'valge', 'omanik'=>'Veiko'),
		array('nimi'=>'Sissy', 'vanus'=>6, 'karv'=>'kirju', 'omanik'=>'Mari')
	);
foreach ($kassid as $kass) {
    include 'omadused.html';
}	
	
	
	
?>