<?php

// võtsin aluseks õppejõu eelneva lahenduse

function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}


function kuva_puurid(){
	// siia on vaja funktsionaalsust
	global $connection;
	if (!isset($_SESSION['user'])){
		header("Location: ?page=login");
		exit(0);
	} 
	$puurid=array();
	$query ="SELECT DISTINCT(puur) as puur from 12128242_loomaaed";
	$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
	while($p=mysqli_fetch_assoc($result)){
		$query2 ="SELECT * from 12128242_loomaaed where puur={$p['puur']}";
		$result2 = mysqli_query($connection, $query2) or die("$query - ".mysqli_error($connection));
		while($l=mysqli_fetch_assoc($result2)){

			$puurid[$p['puur']][]=$l;
		}
	}
	include_once('views/puurid.html');
	
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
		global $connection;
	if (isset($_SESSION['user'])){
		header("Location: ?page=loomaaed");
		exit(0);
	} 
	$errors=array();
	if ($_SERVER['REQUEST_METHOD']=="POST"){ // sisse logimine
			 
		if (!empty($_POST['user']) && !empty($_POST['pass'])){
			if ($_POST['user']==""){
				$errors[]="Lisa kasutajanimi";
			}
			if ($_POST['pass']==""){
				$errors[]="Lisa parool";
			}
			if (empty($errors)) {
				$u=mysqli_real_escape_string($connection, $_POST['user']);
				$p=mysqli_real_escape_string($connection, $_POST['pass']);
				$query ="SELECT * from 12128242_kylastajad where username='$u' and passw=SHA1('$p')";
				$result = mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
				if (mysqli_num_rows($result)==1) {
					$_SESSION['user']=$_POST['user'];
					header("Location: ?page=loomaaed");
					exit(0);
				} else {
					$errors[]="vigane kasutajanimi või parool";
				}
			}
		} else {
			$errors[]="puudub kasutajanimi või parool";
		}
	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	global $connection;
	if (empty($_SESSION['user'])){
		header("Location: ?page=login");
		exit(0);
	} 
	
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		$loom=array();
		$errors=array();
		if (!empty($_POST['nimi']) && $_POST['nimi']!=""){
			$loom['nimi']=mysqli_real_escape_string($connection,$_POST["nimi"]);
		} else {
			$errors[]="anna loomale nimi";
		}
		if (!empty($_POST['puur']) && is_numeric($_POST['puur'])){
			$loom['puur']=mysqli_real_escape_string($connection,$_POST["puur"]);
		} else {
			$errors[]="anna puurile number";
		}
		if ($pilt=upload('liik')){
			$loom['liik']=mysqli_real_escape_string($connection, $pilt);
		} else {
			$errors[]="igale loomale peab vastama pilt";
		}

		if (empty($errors)){

			$query = "insert into 12128242_loomaaed (nimi, puur, liik) values ('{$loom['nimi']}', {$loom['puur']},'{$loom['liik']}' )";
			mysqli_query($connection, $query) or die("$query - ".mysqli_error($connection));
			if (mysqli_insert_id($connection)>0) {
				header("Location: ?page=loomaaed");
				exit(0);
			} else {
				$errors[]="Uus katse";
			}
		}

	}
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>