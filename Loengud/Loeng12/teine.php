<?php
$user="test";
$pass="t3st3r123";
$db="test";
$host="localhost";

$link=mysqli_connect($host,$user,$pass,$db) or die
("ei saanud ühendust - " );

// mysqli_query($link,"SET CHARACTER SET UTF8") or die ($sql. " - " . mysqli_error($link));

$v2ljad="nimi, puur";

$sql="SELECT $v2ljad FROM 10132492_loomaaed";
$result=mysqli_query($link, $sql) or die ($sql. " - " . mysqli_error($link));

while ($rida=mysqli_fetch_assoc($result)) {
	echo "looma nimi on: {$rida['nimi']}, ta asub puuris number {$rida['puur']}.<br/>";
}
mysqli_free_result($result);
?>