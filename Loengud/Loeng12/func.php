<?php

function baasi_yhendus(){
	global $link;
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$host="localhost";

	$link=mysqli_connect($host,$user,$pass,$db) or die
	("ei saanud ühendust - " );
	mysqli_query($link,"SET CHARACTER SET UTF8") or die ($sql. " - " . 
	mysqli_error($link));
}

function fake_login(){
	if (!empty($_GET["roll"])) {
		if ($_GET["roll"]=="admin"){
			$_SESSION["user"]="Boss";
			$_SESSION["roll"]="admin";
			$_SESSION["user_id"]=1;
		} else {
			$_SESSION["user"]="Treener1";
			$_SESSION["roll"]="kasutaja";
			$_SESSION["user_id"]=2;
		}
		header("Location: ?mode=loomad");
	}
	include_once("vaated/login.html");
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_loomad(){
	global $link;
	$loomad=array();
	$sql="SELECT id, nimi, pilt, treener_id FROM 0tsirkus";
	$result=mysqli_query($link,$sql);
	while($rida=mysqli_fetch_assoc($result)) {
		$loomad[]=$rida;
	}
	include_once("vaated/loomad.html");
}



function kuva_loom(){
	global $link;
	if (empty($_SESSION["roll"])){ // info logitud kasutajatele
		header("Location: ?mode=loomad");
	}
	if (!empty($_GET["id"])) {
	$sql="SELECT * FROM 0tsirkus WHERE id=".mysqli_real_escape_string($_GET["id"]);
	$result=mysqli_query($link,$sql) or die("sellist looma pole");
	$loom=mysqli_fetch_assoc($result);
	
	include_once("vaated/loom.html");
	} else {
		header("Location: ?mode=loomad");
	}
}



function lisa(){
	global $link;
	if (!empty($_SESSION["roll"]) && $_SESSION["roll"]!="admin"){ // ainult admin
		header("Location: ?mode=loomad");
	}
	$errors=array();
	if (!empty($_POST)){
		if (empty($_POST["nimi"])) {
			$errors[]="nimi kohustuslik";
		}
		if (empty($_POST["oskused"])) {
			$errors[]="oskused kohustuslikud";
		}
		if (empty($_POST["treener_id"])) {
			$errors[]="treener kohustuslik";
		}
		if (empty($_POST["pilt"])) {
			$errors[]="liik kohustuslik";
		}
		if (empty($errors)){
			
		}

	}
	include_once("vaated/lisa.html");

}

?>
