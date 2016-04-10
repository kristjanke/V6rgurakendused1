<?php
		$kommentaar=" ";
		$bg_color="#fff";
		$txt_color="#000";
		$brd_size="0px";
		$brd_type="solid";
		$brd_color="black";
		$brd_radius="0px";
		 if (empty($_POST["kommentaar"])) {
			$kommentaar = "";
		} else {
			$kommentaar = $_POST["kommentaar"];
		}
		
		if (isset($_POST['taustavarv']) && $_POST['taustavarv']!="") {
			$bg_color=htmlspecialchars($_POST['taustavarv']);
		} 		
		if (isset($_POST['tekstivarv']) && $_POST['tekstivarv']!="") {
			$txt_color=htmlspecialchars($_POST['tekstivarv']);
		}
		/*if (intval($_POST['piirjoone_laius'])>20) {
			echo "Piirjoone laius 0-20px";
			exit;
		}*/
		if (isset($_POST['piirjoone_laius']) && $_POST['piirjoone_laius']!="") {
			$brd_size=htmlspecialchars($_POST['piirjoone_laius']);
		} 
		if (isset($_POST['piirjoone_tyyp']) && $_POST['piirjoone_tyyp']!="") {
			$brd_type=htmlspecialchars($_POST['piirjoone_tyyp']);
		} 
		if (isset($_POST['piirjoonevarv']) && $_POST['piirjoonevarv']!="") {
			$brd_color=htmlspecialchars($_POST['piirjoonevarv']);
		}
		if (isset($_POST['piirjoone_raadius']) && $_POST['piirjoone_raadius']!="") {
			$brd_radius=htmlspecialchars($_POST['piirjoone_raadius']);
		} 		
	
	?>
<!doctype html>
<html>
	
	<head>
		<title> Kommentaar </title>
		<meta charset="utf-8">
		<style>
			#kuvatav_tekst {
				border-style: <?php echo $brd_type; ?>;
				border-width: <?php echo $brd_size; ?>px;
				border-color: <?php echo $brd_color; ?>;
				border-radius: <?php echo $brd_radius; ?>px;
				height: 200px;
				width: 400px;
				background-color: <?php echo $bg_color; ?>;
				color: <?php echo $txt_color; ?>;
				padding: 10px;
			}
			p {
				display: inline;
				font-size: 1.2em;
			}
			.varv {
				border-radius: 5px;
				
			}
			#piirjoon {
				border: 3px solid gray;
				padding: 20px;
			
			}
		</style>
		
	</head>
	
	<body>
	
		<div id="kuvatav_tekst">
			<?php echo $kommentaar;?>
		
		</div> 
		<hr>
		
		<form id="muuda" action="kommentaar.php" method="POST">
			<textarea name="kommentaar" rows="3" cols="40"><?php echo $kommentaar;?></textarea><br/>
			<input type="color" name="taustavarv" class="varv" value="<?php echo $bg_color; ?>" ></input><p> Taustavärvus</p> </br>
			<input type="color" name="tekstivarv" class="varv" value="<?php echo $txt_color; ?>" ></input><p> Tekstivärvus</p> </br>
			<br>
			<div id="piirjoon">
			<input type="number" name="piirjoone_laius" min="0" max="20" value="<?php echo $brd_size;?>"></input><p> Piirjoone suurus (0-20px)</p> </br>
			
			<select name="piirjoone_tyyp">
				<option <?php if ($brd_type=="solid") {echo "selected";} ?> >solid</option>
				<option <?php if ($brd_type=="double") {echo "selected";} ?> >double</option>
			</select> </br>
			<input type="color" name="piirjoonevarv" class="varv" value="<?php echo $brd_color; ?>"></input><p> Piirjoone värvus</p> </br>
			<input type="number" name="piirjoone_raadius" min="0" max="100" value="<?php echo $brd_radius; ?>"></input><p> Piirjoone nurga raadius (0-100px)</p> </br>
			</div>
			<input type="submit" name="nupp" value="Saada!"/>
		</form>
	</body>
	
</html>