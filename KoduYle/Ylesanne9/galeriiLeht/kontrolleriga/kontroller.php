<?php
$pildid=array(
					array("nimi"=>"pildid/nameless1.jpg", "alt"=>"nimetu 1"),
					array("nimi"=>"pildid/nameless2.jpg", "alt"=>"nimetu 2"),
					array("nimi"=>"pildid/nameless3.jpg", "alt"=>"nimetu 3"),
					array("nimi"=>"pildid/nameless4.jpg", "alt"=>"nimetu 4"),
					array("nimi"=>"pildid/nameless5.jpg", "alt"=>"nimetu 5"),
					array("nimi"=>"pildid/nameless6.jpg", "alt"=>"nimetu 6")
				);
require_once('head.html');
$mode="pealeht";	// vaikimisi							
if (isset($_GET['mode']) && $_GET['mode']!=""){
	$mode=$_GET['mode'];
	}
switch($mode){	
case "pealeht":
	require_once('pealeht.html');
break;
case "galerii":
	require_once('galerii.html');
break;
case "haaletamine":
	require_once('vote.html');
break;
case "tulemus":
	require_once('tulemus.html');
break;					
				
require_once('foot.html');				
				
?>