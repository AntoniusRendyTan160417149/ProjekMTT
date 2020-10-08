<?php
session_start();
$iditem = $_GET['iditem'];
$iduser = $_GET['iduser_owner'];
$sold = 'SOLD';
$mysqli = new mysqli("localhost", "root", "", "mybidding");
$stmt = $mysqli->query("UPDATE items SET status = '".$sold."' WHERE iditem = '".$iditem."'");

echo $iditem. $iduser'';

if($stmt == TRUE)
{
	header("location:detail.php?iduser_owner=".$iduser."&iditem=".$iditem."");
}
else
{
	echo "Gagal Update";
}

?>